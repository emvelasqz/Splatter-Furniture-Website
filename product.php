<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hau_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if search query exists
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
$products = [];

if (!empty($search_query)) {
    // Prepare SQL to search for products
    $sql = "SELECT * FROM Inventory WHERE name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_term = '%' . $search_query . '%';
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Splatter</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="shop.css">
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
        <h1>Search Results</h1>
        <div class="breadcrumb">
            <a href="home.php">Home</a> > Search
        </div>
    </div>
</section>

<div class="search-container">
    <button class="filter-button" id="filter-button">
        <i class="fas fa-sliders-h"></i>
        Filter
    </button>
    <form action="search.php" method="GET" class="search-input-container" style="flex-grow: 1; display: flex;">
        <i class="fas fa-search"></i>
        <input type="text" class="search-input" placeholder="Search product" name="search" value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit" class="find-now-button">Find Now</button>
    </form>
</div>

<div class="overlay" id="overlay"></div>

<div class="filter-panel" id="filter-panel">
    <div class="filter-header">
        <h2>Refine by Category</h2>
        <button class="close-filter" id="close-filter">&times;</button>
    </div>
    <ul class="category-list">
        <li class="category-item">
            <a href="Sofas.php">Sofas</a>
            <span class="category-count">(12)</span>
        </li>
        <li class="category-item">
            <a href="Beds.php">Beds</a>
            <span class="category-count">(8)</span>
        </li>
        <li class="category-item">
            <a href="Chairs.php">Chairs</a>
            <span class="category-count">(8)</span>
        </li>
        <li class="category-item">
            <a href="Outdoor-Furniture.php">Outdoor Furniture</a>
            <span class="category-count">(12)</span>
        </li>
    </ul>
</div>

<section class="products">
    <div class="product-grid">
        <?php if (empty($products)): ?>
            <div class="no-results" style="grid-column: 1 / -1; text-align: center; padding: 50px;">
                <h3>No products found for "<?php echo htmlspecialchars($search_query); ?>"</h3>
                <p>Try a different search term or browse our <a href="shop.php">shop</a>.</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <a href="product.php?id=<?php echo $product['inventory_id']; ?>">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </a>
                    <?php if ($product['discount'] > 0): ?>
                        <div class="discount-badge">-<?php echo $product['discount']; ?>%</div>
                    <?php elseif ($product['is_new']): ?>
                        <div class="new-badge">New</div>
                    <?php endif; ?>
                    <div class="product-info">
                        <a href="product.php?id=<?php echo $product['inventory_id']; ?>">
                            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                        </a>
                        <p><?php echo htmlspecialchars($product['description'] ?? 'Furniture item'); ?></p>
                        <div class="price">
                            <?php if ($product['discount'] > 0): ?>
                                <span class="new-price">PHP <?php echo number_format($product['price'] * (1 - $product['discount'] / 100), 2); ?></span>
                                <span class="old-price">PHP <?php echo number_format($product['price'], 2); ?></span>
                            <?php else: ?>
                                <span class="new-price">PHP <?php echo number_format($product['price'], 2); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filter-button');
        const filterPanel = document.getElementById('filter-panel');
        const closeFilter = document.getElementById('close-filter');
        const overlay = document.getElementById('overlay');

        filterButton.addEventListener('click', function() {
            filterPanel.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden'; 
            filterButton.style.display = 'none';
        });

        function closeFilterPanel() {
            filterPanel.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
            filterButton.style.display = '';
        }

        closeFilter.addEventListener('click', closeFilterPanel);
        overlay.addEventListener('click', closeFilterPanel);
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
