<?php
include 'db_connect.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve inventory_id for the product name
$sql = "SELECT inventory_id FROM inventory WHERE name = 'Posey Shelf';";
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
        <a href="home.php">Home</a> > Posey Shelf
    </div>

    <section class="product-container">
        <div class="product-details">
            <div class="product-header">
                <h1><?php echo htmlspecialchars($product['name'] ?? 'No Name'); ?></h1>
                <div class="price-rating">
                    <div class="price-container">
                        <span class="original-price">PHP 19,000</span>
                        <span class="price">PHP 17,000</span>
                    </div>
                    <div class="rating">
                        <span class="stars">★★★★★<span class="half-star">★</span></span>
                        <span class="rating-text">5.0 / 5.0 (556)</span>
                    </div>
                </div>
            </div>
            <div class="stock-info">
                <p><strong>Available Stock: <?php echo isset($product['stocks']) ? $product['stocks'] : 'Out of stock'; ?></strong></p>
            </div>
            <div class="description">
                <p>Showcase your personal style with the Posey Shelf, a stunning blend of form and function. This eye-catching shelf features a unique asymmetrical design with open compartments of varying sizes, perfect for displaying books, artwork, plants, and cherished treasures. </p>
                <p>Crafted from durable engineered wood with a sleek oak veneer, the Posey Shelf adds a touch of modern sophistication to any living room, bedroom, or office. Its sturdy construction and ample storage space make it an ideal choice for both organization and showcasing your personality.</p>
            </div>
            <div class="purchase-actions">
                <form action="cart.php" method="post" style="display: flex; align-items: center;">
                    <div class="quantity-selector" style="display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px; overflow: hidden; margin-right: 10px;">
                        <button type="button" class="quantity-btn decrease" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">−</button>
                        <input type="text" class="quantity-input" name="quantity" value="1" style="width: 50px; text-align: center; border: none; outline: none;">
                        <button type="button" class="quantity-btn increase" style="border: none; padding: 5px 10px; cursor: pointer; font-size: 16px;">+</button>
                    </div>
                    <input type="hidden" name="product_id" value="6">
                    <input type="hidden" name="product_name" value="Posey Shelf">
                    <input type="hidden" name="product_price" value="17000">
                    <input type="hidden" name="product_image" value="product7.jpg">
                    <button type="submit" class="add-to-cart-btn" onclick="showFlashMessage()" style="margin-left: 10px; background-color: #5E4736; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Add to Cart</button>
                </form>
            </div>
            <p class="shipping-info">Free 3-5 day shipping • Tool-free assembly • 30-day trial</p>
        </div>
        <div class="main-product-image">
            <img src="product7.jpg" alt="Austen Counter Stool">
        </div>
    </section>
    
    <div class="divider"></div>

    <section class="additional-info">
        <h2>Additional Information</h2>
        
        <div class="info-content">
            <p>
            The Posey Shelf isn't just a storage solution; it's an opportunity to express your creativity. Arrange your favorite books and decorative objects to create a visually captivating display that reflects your unique taste.    </p>
            <p>
            Its versatile design complements a variety of interior styles, from minimalist to eclectic.  Add a touch of personality and charm to your home with the Posey Shelf.

  </p>
            
        </div>
        
        <div class="info-image">
            <img src="product-seven.jpg" alt="White Couch with Pillows">
        </div>
    </section>
    
    <section class="related-products">
        <h2>Related products</h2>
        
        <div class="product-grid">
            <div class="product-card">
                <a href="product2.php">
                    <div class="related-product-image">
                        <img src="product1.jpg" alt="Aurelie Furniture">
                    </div>
                    <h3>Austen Counter Stool</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="annasthacia.php">
                    <div class="related-product-image">
                        <img src="product2.jpg" alt="Annasthacia Furniture">
                    </div>
                    <h3>Brooke Dining Table</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="cappucine.php">
                    <div class="related-product-image">
                    <img src="product6.jpg" alt="Cappucine Furniture">
                    </div>
                    <h3>Hugg Nesting Side Table</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
            
            <div class="product-card">
                <a href="product4.php">
                    <div class="related-product-image">
                        <img src="product4.jpg" alt="Benoite Furniture">
                    </div>
                    <h3>Bradley TV Stand</h3>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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