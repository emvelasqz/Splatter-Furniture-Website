<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root'; 
$pass = '';     
$db   = 'hau_store'; 

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST["first-name"]);
    $lastname = trim($_POST["last-name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];

    if ($password !== $confirmpassword) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO signup (firstname, lastname, email, password, contactnumber) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $phone);
            if ($stmt->execute()) {
                $success = "Account created successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Error preparing the statement: " . $mysqli->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header>
    <div class="nav-bar">
        <a href="home.php" class="logo-link">
            <div class="logo windsong-logo">Splatter</div>
        </a>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="blog.php">Blog</a></li>
            </ul>
        </nav>
        <div class="icons">
            <a href="cart.php" class="icon-link">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <a href="login.php" class="icon-link">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </div>
</header>

<section class="banner">
    <div class="banner-overlay"></div> 
    <div class="banner-content">
        <h1>Account</h1>
        <div class="breadcrumb">
            <a href="home.php">Home</a> > Account
        </div>
    </div>
</section>

<div class="main-content">
    <div class="signup-container">
        <h1 class="signup-title">Sign Up</h1>
        <p class="signup-subtitle">Let’s get you all set up so you can access your personal account.</p>

        <?php if (!empty($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } elseif (!empty($success)) { ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php } ?>

        <form class="signup-form" method="POST" action="">
            <div class="form-row">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>

            <div class="form-group terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to all the <a href="#">Terms</a> and <a href="#">Privacy Policies</a></label>
            </div>

            <button type="submit" class="signup-button">Create Account</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <h2 class="windsong-logo">Splatter</h2>
            <p>Crafting comfort, one piece at a time.</p>
            <p>1st Street, Balibago, Angeles City, Pampanga, 2008, Philippines</p>
        </div>
        <div class="footer-links">
            <table>
                <thead>
                    <tr>
                        <th>Quick Links</th>
                        <th>Cart</th>
                        <th>Social</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="blog.php">Blog</a></td>
                        <td><a href="cart.php">Check Cart</a></td>
                        <td><a href="https://www.castlery.com/us">Facebook</a></td>
                    </tr>
                    <tr>
                        <td><a href="about.php">About Us</a></td>
                        <td><a href="checkout.php">Checkout</a></td>
                        <td><a href="https://www.instagram.com/castleryus/">Instagram</a></td>
                    </tr>
                    <tr>
                        <td><a href="contact.php">Contact Us</a></td>
                        <td></td>
                        <td><a href="https://www.linkedin.com/company/castlery-com/?originalSubdomain=sg">LinkedIn</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</footer>
</body>
</html>
