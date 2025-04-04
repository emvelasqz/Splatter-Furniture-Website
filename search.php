<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hau_store";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM inventory WHERE name LIKE ? OR supplier LIKE ? OR category LIKE ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }
    
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $stmt->close();
    $conn->close();
} else {
    $results = [];
}

$productLinks = [
    'kelsey counter stool' => 'product3.php',
    'brooke round dining table' => 'product2.php',
    'austen counter stool' => 'product1.php',
    'bradley tv stand' => 'product4.php',
    'dawson sofa' => 'product5.php',
    'hugg nesting side table' => 'product6.php',
    'posey shelf' => 'product7.php',
    'abbey performance bench' => 'product8.php',
    'Marlow Performance Boucle Curve Sofa' => 'sofa1.php',
    'dawson wide chaise sectional sofa' => 'sofa2.php',
    'auburn performance fabric right arm chaise' => 'sofa12.php',
    'lucia cane sofa, white wash' => 'sofa3.php',
    'fable performance fabric sofa' => 'sofa4.php',
    'mori performance fabric sofa' => 'sofa5.php',
    'marlow performance boucle armless 2 seater sofa' => 'sofa6.php',
    'marlow curve sofa' => 'sofa7.php',
    'auburn performance fabric sectional sofa' => 'sofa8.php',
    'isaac leather bumper chaise sectional sofa' => 'sofa9.php',
    'dawson pit-sectional sofa' => 'sofa10.php',
    'hamilton leather chaise sectional sofa' => 'sofa11.php',
    'joseph bed, walnut' => 'bed1.php',
    'crescent bed' => 'bed2.php',
    'dawson leather bed' => 'bed3.php', 
    'rochelle performance bouclé bed' => 'bed4.php',
    'lexi tufted bed' => 'bed5.php',
    'claude performance fabric bed' => 'bed6.php', 
    'joseph bed' => 'bed7.php',
    'dawson bed' => 'bed8.php', 
    'rio outdoor lounge chair' => 'furni1.php',
    'malta outdoor sofa' => 'furni2.php',
    'olwen coffee table' => 'furni3.php',
    'bistro round foldable table with 2 newport chairs set' => 'furni4.php',
    'rio outdoor dining bench' => 'furni5.php',
    'sierra outdoor dining table' => 'furni6.php',
    'rio outdoor teak square side table' => 'furni7.php',
    'rio outdoor teak loveseat' => 'furni8.php',
    'rio outdoor 3 seater sofa' => 'furni9.php',
    'malta outdoor round drum coffee table' => 'furni10.php',
    'duncan round coffee table' => 'furni11.php',
    'Abbey Performance Bouclé Bench' => 'chair1.php',
    'Colette Swivel Armchair' => 'chair2.php',
    'Kelsey Stool' => 'chair3.php',
    'Cassiddy Swivel Chair' => 'chair4.php',
    'Sloane Cane Chair' => 'chair5.php',
    'Thierry Chair' => 'chair6.php',
    'Mico Rattan Armchair' => 'chair7.php',
    'Desmond Rocking Armchair' => 'chair8.php',
];

function normalizeProductName($name) {
    $normalized = str_replace(
        ['é', 'ê', 'ë', 'è', 'ç', 'â', 'î', 'ô', 'û', 'ñ', ' ', '-'], 
        ['e', 'e', 'e', 'e', 'c', 'a', 'i', 'o', 'u', 'n', '_', '_'], 
        strtolower($name)
    );
    return $normalized;
}
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
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        
        .products {
            flex: 1;
            padding: 30px 0;
            background-color: #f4f1eb;
        }
        
        .no-results {
            min-height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .no-results p {
            font-size: 18px;
            color: #6f4e37;
            margin-bottom: 20px;
        }
        
        .back-to-shop {
            background-color: #6f4e37;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .back-to-shop:hover {
            background-color: #8F7358;
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
        <div class="search-input-container">
            <i class="fas fa-search"></i>
            <input type="text" class="search-input" placeholder="Search product" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>">
        </div>
        <button class="find-now-button" onclick="document.forms['searchForm'].submit()">Find Now</button>
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
        <?php if (count($results) > 0): ?>
            <div class="product-grid">
                <?php foreach ($results as $item): 
                    $productName = $item['name']; 
                    $productLink = null;

                    foreach ($productLinks as $key => $link) {
                        if (strcasecmp($key, $productName) === 0) {
                            $productLink = $link;
                            break;
                        }
                    }

                    if (!$productLink) {
                        $productLink = normalizeProductName($productName) . '.php';
                    }

                    $hasDiscount = isset($item['discount']) && $item['discount'] > 0;
                    $newPrice = $hasDiscount ? $item['price'] * (1 - ($item['discount']/100)) : $item['price'];
                ?>
                    <div class="product-item">
                        <a href="<?php echo $productLink; ?>">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        </a>
                        <?php if ($hasDiscount): ?>
                            <div class="discount-badge">-<?php echo $item['discount']; ?>%</div>
                        <?php elseif (isset($item['is_new']) && $item['is_new']): ?>
                            <div class="new-badge">New</div>
                        <?php endif; ?>
                        <div class="product-info">
                            <a href="<?php echo $productLink; ?>">
                                <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            </a>
                            <p><?php echo htmlspecialchars($item['category']); ?></p>
                            <div class="price">
                                <span class="new-price">PHP <?php echo number_format($newPrice, 2); ?></span>
                                <?php if ($hasDiscount): ?>
                                    <span class="old-price">PHP <?php echo number_format($item['price'], 2); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-results">
                <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>".</p>
                <a href="shop.php" class="back-to-shop">Back to Shop</a>
            </div>
        <?php endif; ?>
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
            });

            function closeFilterPanel() {
                filterPanel.classList.remove('active');
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            closeFilter.addEventListener('click', closeFilterPanel);
            overlay.addEventListener('click', closeFilterPanel);

            document.querySelector('.find-now-button').addEventListener('click', function() {
                const searchInput = document.querySelector('.search-input').value;
                window.location.href = 'search.php?query=' + encodeURIComponent(searchInput);
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
