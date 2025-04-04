<?php
session_start();
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

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $mysqli->prepare("SELECT signupid, firstname, lastname FROM signup WHERE email = ? AND password = ?");
    if ($stmt) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($signupid, $firstname, $lastname);
            $stmt->fetch();
            $_SESSION["signupid"] = $signupid;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            header("Location: home.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
        $stmt->close();
    } else {
        $error = "Error preparing statement: " . $mysqli->error;
    }
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
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
    <div class="login-container">
        <h1 class="login-title">Login</h1>
        <p class="login-subtitle">Login to access your Splatter account</p>

        <?php if (!empty($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>

        <form class="login-form" method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <p class="sign-up">
            Don't have an account? <a href="sign-up.php">Sign up</a>
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
