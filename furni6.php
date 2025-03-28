<?php
include 'db_connect.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve inventory_id for the product name
$sql = "SELECT inventory_id FROM inventory WHERE name = 'Sierra Outdoor Dining Table';";
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
    <title>Furniture Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="header.css">

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
    <div class="breadcrumb">
        <a href="home.php">Home</a> > <a href="Outdoor-Furniture.php">Outdoor Furniture</a> > Sierra Outdoor Dining Table
    </div>

    <section class="product-container">
        <div class="product-details">
            <div class="product-header">
            <h1><?php echo htmlspecialchars($product['name'] ?? 'No Name'); ?></h1>
                <div class="price-rating">
                    <div class="price-container">
                        <span class="price">PHP 6,000</span>             
                    </div>
                    <div class="rating">
                        <span class="stars">★★★★<span class="half-star">★</span></span>
                        <span class="rating-text">4.8 / 5.0 (412)</span>
                    </div>
                </div>
            </div>
            <div class="stock-info">
                <p><strong>Available Stock: <?php echo isset($product['stocks']) ? $product['stocks'] : 'Out of stock'; ?></strong></p>
            </div>
            <div class="description">
                <p>Dine and unwind on Sierra's breezy, slatted tabletop. The charming silhouette is fitted with an umbrella hole to keep you shaded.​​</p>
                <p>Designed to bring both functionality and style to your outdoor dining space, this large outdoor dining table offers ample room for family meals, entertaining guests, and enjoying the fresh air. With a width of 85.8 inches, depth of 39.4 inches, and height of 29.9 inches, it comfortably accommodates multiple diners while maintaining a sleek and modern aesthetic.</p>
            </div>
            <div class="purchase-actions">
                <form action="cart.php" method="post" style="display: flex; align-items: center;">
                    <div class="quantity-selector" style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px; overflow: hidden; margin-right: 10px;">
                        <button type="button" class="quantity-btn decrease" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">−</button>
                        <input type="text" class="quantity-input" name="quantity" value="1" style="width: 50px; text-align: center; border: none; outline: none;">
                        <button type="button" class="quantity-btn increase" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">+</button>
                    </div>
                    <input type="hidden" name="product_id" value="226">
                    <input type="hidden" name="product_name" value="Sierra Outdoor Dining Table">
                    <input type="hidden" name="product_price" value="6000">
                    <input type="hidden" name="product_image" value="furni6.jpg">
                    <button type="submit" class="add-to-cart-btn" onclick="showFlashMessage()" style="margin-left: 10px; background-color: #5E4736; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Add to Cart</button>
                </form>
            </div>
            <p class="shipping-info">Free 3-5 day shipping • Tool-free assembly • 30-day trial</p>
        </div>
        <div class="main-product-image">
            <img src="furni6.jpg" alt="Austen Counter Stool">
        </div>
    </section>
    
    <div class="divider"></div>

    <section class="additional-info">
        <h2>Additional Information</h2>
        
        <div class="info-content">
            <p>
            The tabletop features a sturdy frame with a thickness of 1.8 inches and slats measuring 0.6 inches, ensuring a balance of durability and elegance. Its solid construction supports up to 265 lbs, making it ideal for various outdoor dining needs.
            </p>
            
            <p>
            Designed for convenience, the table includes a 1.7-inch umbrella hole with a ring and a 2.0-inch opening without the ring, allowing you to add shade for sunny days. The leg height of 27.6 inches provides a comfortable dining experience, while the leg-to-leg distance at 17.7 inches offers enough room for chairs and leg space.
            </p>

            <p>
            Weighing 79.1 lbs, this dining table is sturdy yet easy to position in your outdoor space. It arrives in one box for simple assembly. Whether for casual meals or festive gatherings, this table is a reliable and stylish centerpiece for your outdoor dining area.
            </p>
        </div>
        
        <div class="info-image">
            <img src="furni-6.jpg" alt="White Couch with Pillows">
        </div>
    </section>
    
    <section class="related-products">
        <h2>Related products</h2>
        
        <div class="product-grid">
        <div class="product-card">
                <a href="furni10.php">
                    <div class="related-product-image">
                        <img src="furni10.jpg" alt="Aurelie Furniture">
                    </div>
                    <h3>Malta Outdoor Round Drum Coffee Table</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="furni2.php">
                    <div class="related-product-image">
                        <img src="furni2.jpg" alt="Annasthacia Furniture">
                    </div>
                    <h3>Malta Outdoor Sofa</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="furni5.php">
                    <div class="related-product-image">
                    <img src="furni5.jpg" alt="Cappucine Furniture">
                    </div>
                    <h3>Rio Outdoor Dining Bench</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="furni8.php">
                    <div class="related-product-image">
                        <img src="furni8.jpg" alt="Benoite Furniture">
                    </div>
                    <h3>Rio Outdoor Teak Loveseat</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity selector functionality
            const decreaseBtn = document.querySelector('.decrease');
            const increaseBtn = document.querySelector('.increase');
            const quantityInput = document.querySelector('.quantity-input');
            
            decreaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });
        });
    </script>
</body>

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
</html>