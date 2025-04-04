<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'hau_store';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$session_id = session_id();
$session_query = "SELECT sessionid FROM cartitems WHERE sessionid = ?";
$stmt = $mysqli->prepare($session_query);
$stmt->bind_param('s', $session_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($session_id);
    $stmt->fetch();
} else {
    $session_id = 'No active session';
}
$stmt->close();

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM billing WHERE firstname LIKE ? OR lastname LIKE ? OR contact LIKE ? OR country LIKE ? OR address LIKE ? OR town LIKE ? OR province LIKE ? OR zipCode LIKE ? OR email LIKE ?";
    $stmt = $mysqli->prepare($sql);
    $search_term = '%' . $search . '%';
    $stmt->bind_param('sssssssss', $search_term, $search_term, $search_term, $search_term, $search_term, $search_term, $search_term, $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM billing";
    $result = $mysqli->query($sql);
}

if (isset($_GET['delete'])) {
    $billingID = $_GET['delete'];
    $deleteSQL = "DELETE FROM billing WHERE BillingID = ?";
    $stmt = $mysqli->prepare($deleteSQL);
    $stmt->bind_param('i', $billingID);
    $stmt->execute();
    header("Location: Billing.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $town = $_POST['town'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $totalprice = $_POST['totalprice'];
    $productname = $_POST['productname'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO billing (firstname, lastname, contact, country, address, town, province, zipcode, email, totalprice, productname, quantity) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssssssssdssd', $firstname, $lastname, $contact, $country, $address, $town, $province, $zipcode, $email, $totalprice, $productname, $quantity);
    $stmt->execute();

    header("Location: Billing.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="header.css">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f3ed;
        margin: 0;
        padding: 0;
        color: #5a4032;
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #8F7358;
        height: 100%;
        position: fixed;
        overflow: auto;
    }

    li a {
        display: block;
        color: white;
        padding: 14px;
        text-decoration: none;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.3s ease;
    }

    li a:hover {
        background-color: #B09D89;
    }

    .RightSide {
        margin-left: 220px;
        padding: 20px;
        background-color: #f8f3ed;
        height: 100%;
    }

    .RightSide h1 {
        color: #5a4032;
        font-family: 'Poppins', sans-serif;
    }

    .button {
        background-color: #5E4736;
        border: none;
        color: white;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-family: 'Poppins', sans-serif;
        margin: 2px;
    }

    .button:hover {
        background-color: #8F7358;
    }

    .button1 {
        background-color: white;
        color: #5E4736;
        border: 2px solid #5E4736;
        font-family: 'Poppins', sans-serif;
    }

    .button1:hover {
        background-color: #f4f1eb;
        color: #5E4736;
    }

    .InfoTable {
        margin-top: 20px;
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 5px rgba(94, 71, 54, 0.1);
    }

    table, th, td {
        border: 1px solid #98724B;
        text-align: left;
        padding: 8px;
    }

    td {
        text-align: center;
        vertical-align: middle;
    }

    th {
        background-color: #5E4736;
        color: white;
        font-family: 'Poppins', sans-serif;
        text-align: center;
        padding: 12px 8px;
    }

    tr:nth-child(even) {
        background-color: #f4f1eb;
    }

    tr:hover {
        background-color: #e6dfd4;
    }

    .search-input {
        font-size: 16px;
        padding: 8px;
        margin-top: 10px;
        margin-bottom: 10px;
        width: 250px;
        border-radius: 4px;
        border: 1px solid #98724B;
        display: inline-block;
        margin-left: 10px;
        font-family: 'Poppins', sans-serif;
    }

    .action-buttons {
        white-space: nowrap;
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    @media (max-width: 768px) {
        ul {
            width: 100%;
            height: auto;
            position: static;
        }

        .RightSide {
            margin-left: 0;
            padding: 10px;
        }

        table {
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            margin-top: 10px;
        }

        .action-buttons {
            flex-direction: column;
            gap: 3px;
        }

        .button {
            padding: 6px 10px;
            font-size: 12px;
        }
    }
</style>
</head>
<body>

<ul>
    <li><a href="Billing.php">Billing</a></li>
    <li><a href="Inventory.php">Inventory/Stocks</a></li>
    <li><a href="Accounts.php">Accounts</a></li>
    <li><a href="CustomersCart.php">Customer Cart</a></li>
</ul>

<div class="RightSide">
    <h1>Admin Dashboard</h1>

    <form method="GET" action="Billing.php">
        <input class="search-input" type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
        <button class="button" type="submit">Search</button>
    </form>

    <div class="InfoTable">
        <table>
            <tr>
                <th>Billing ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Country</th>
                <th>Address</th>
                <th>Town</th>
                <th>Province</th>
                <th>Zip Code</th>
                <th>Email</th>
                <th>Total Price</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Session ID</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['BillingID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Contact']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Country']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Town']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Province']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ZipCode']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TotalPrice']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
                    echo "<td>" . htmlspecialchars($session_id) . "</td>"; 
                    echo "<td>
    <div class='action-buttons'>
        <a href='viewBilling.php?id=" . $row['BillingID'] . "' class='button button1'>View</a>
        <a href='updateBilling.php?id=" . $row['BillingID'] . "' class='button button1'>Update</a>
        <a href='Billing.php?delete=" . $row['BillingID'] . "' class='button button1' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
    </div>
</td>";
                }
            } else {
                echo "<tr><td colspan='15' style='text-align:center;'>No records found.</td></tr>";
            }
            $mysqli->close();
            ?>
        </table>
    </div>
</div>

</body>
</html>
