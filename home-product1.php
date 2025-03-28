<?php
include 'db_connect.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve inventory_id for the product name
$sql = "SELECT inventory_id FROM inventory WHERE name = 'Brooke Round Dining Table';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $product_id = $row['inventory_id'];
} else {
    die("Error: Product not found in inventory!");
}

// Prepare the statement to fetch product details
$stmt = $conn->prepare("SELECT name, price, stocks FROM inventory WHERE inventory_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> | Splatter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="cart.css">
    <style>
        .main-product-image img {
            max-width: 100%;
            height: auto;
        }
        .flash-message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            margin: 15px 0;
            border-radius: 5px;
            display: none;
        }
    </style>
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
            <?php if(isset($_SESSION["signupID"])) { ?>
                <div class="logged-in">
                    Welcome, <?php echo htmlspecialchars($_SESSION["firstName"]); ?>! 
                    <a href="logout.php">Logout</a>
                </div>
            <?php } else { ?>
                <a href="login.php" class="icon-link">
                    <i class="fas fa-user"></i>
                </a>
            <?php } ?>
        </div>
    </div>
</header>
<div class="breadcrumb">
    <a href="home.php">Home</a> > <?php echo htmlspecialchars($product['name']); ?>
</div>

<!-- Flash Message -->
<div class="flash-message" id="flashMessage">
    Product successfully added to your cart!
</div>

<section class="product-container">
    <div class="product-details">
        <div class="product-header">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <div class="price-rating">
                <div class="price-container">
                    <span class="price">PHP <?php echo number_format($product['price'], 2); ?></span>
                </div>
                <div class="rating">
                    <span class="stars">★★★★<span class="half-star">★</span></span>
                    <span class="rating-text">4.6 / 5.0 (556)</span>
                </div>
            </div>
        </div>
        <div class="stock-info">
            <p><strong>Available Stock: <?php echo $product['stocks']; ?></strong></p>
        </div>
        <div class="description">
            <p>Product description goes here. You might want to add a 'description' column to your inventory table to store this information.</p>
        </div>
        <div class="purchase-actions">
                <form action="cart.php" method="post" style="display: flex; align-items: center;">
                    <div class="quantity-selector" style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px; overflow: hidden; margin-right: 10px;">
                        <button type="button" class="quantity-btn decrease" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">−</button>
                        <input type="text" class="quantity-input" name="quantity" value="1" style="width: 50px; text-align: center; border: none; outline: none;">
                        <button type="button" class="quantity-btn increase" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">+</button>
                    </div>
                    <input type="hidden" name="product_id" value="200">
                    <input type="hidden" name="product_name" value="Austen Counter Stool">
                    <input type="hidden" name="product_price" value="8999">
                    <input type="hidden" name="product_image" value="product1.jpg">
                    <button type="submit" class="add-to-cart-btn" onclick="showFlashMessage()" style="margin-left: 10px; background-color: #5E4736; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Add to Cart</button>
                </form>
            </div>
        <p class="shipping-info">Free 3-5 day shipping • Tool-free assembly • 30-day trial</p>
    </div>
    <div class="main-product-image">
    <img src="product1.jpg" alt="Austen Counter Stool">
    </div>
</section>

<script>
    function showFlashMessage() {
        const flashMessage = document.getElementById('flashMessage');
        flashMessage.style.display = 'block';
        setTimeout(() => {
            flashMessage.style.display = 'none';
        }, 3000);
    }
    
    document.addEventListener("DOMContentLoaded", () => {
        const decreaseBtn = document.querySelector(".quantity-btn.decrease");
        const increaseBtn = document.querySelector(".quantity-btn.increase");
        const quantityInput = document.querySelector(".quantity-input");

        decreaseBtn.addEventListener("click", () => {
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener("click", () => {
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue)) {
                quantityInput.value = currentValue + 1;
            }
        });

        quantityInput.addEventListener("input", () => {
            if (isNaN(quantityInput.value) || parseInt(quantityInput.value) < 1) {
                quantityInput.value = 1;
            }
        });
    });
</script>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <h2 class="windsong-logo">Splatter</h2>
            <p>Crafting comfort, one piece at a time.</p>
            <p>1st Street, Ballbogo, Angeles City, Pampanga, 2008, Philippines</p>
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