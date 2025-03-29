<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
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
            <h1>Outdoor Furnitures</h1>
            <div class="breadcrumb">
            <a href="home.php">Home</a> > <a href="shop.php">Shop</a> > Outdoor Furnitures
            </div>
        </div>
    </section>

    <div class="search-container">
    <button class="filter-button" id="filter-button">
        <i class="fas fa-sliders-h"></i>
        Filter
    </button>
    <form action="search.php" method="GET" class="search-input-container">
        <i class="fas fa-search"></i>
        <input type="text" class="search-input" placeholder="Search product" name="query" required>
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
            <div class="product-item">
                <a href="furni1.php">
                    <img src="furni1.jpg" alt="Cassiopeia">
                </a>
                <div class="discount-badge">-30%</div>
                <div class="product-info">
                    <a href="furni1.php">
                        <h3>Rio Outdoor Lounge Chair</h3>
                    </a>
                    <p>Outdoor Lounge Chair – Elegant & Durable</p>
                    <div class="price">
                        <span class="new-price">PHP 2,999</span>
                        <span class="old-price">PHP 4,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni2.php">
                    <img src="furni2.jpg" alt="Brooke Round Dining Table">
                </a>
                <div class="discount-badge">-30%</div>
                <div class="product-info">
                    <a href="furni2.php">
                        <h3>Malta Outdoor Sofa</h3>
                    </a>
                    <p>Stylish & Weather-Resistant</p>
                    <div class="price">
                        <span class="new-price">PHP 8,500</span>
                        <span class="old-price">PHP 11,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni3.php">
                    <img src="furni3.jpg" alt="Cressida">
                </a>
                <div class="discount-badge">-50%</div>
                <div class="product-info">
                    <a href="furni3.php">
                        <h3>Olwen Coffee Table</h3>
                    </a>
                    <p>Durable & Stylish</p>
                    <div class="price">
                        <span class="new-price">PHP 3,500</span>
                        <span class="old-price">PHP 6,299</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni4.php">
                    <img src="furni4.jpg" alt="Dorothea">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="furni4.php">
                        <h3>Bistro Round Foldable Table with 2 Newport Chairs Set</h3>
                    </a>
                    <p>Stylish & Weather-Resistant</p>
                    <div class="price">
                        <span class="new-price">PHP 14,500</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni5.php">
                    <img src="furni5.jpg" alt="Eulalia">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="furni5.php">
                        <h3>Rio Outdoor Dining Bench</h3>
                    </a>
                    <p>Timeless Comfort & Durability</p>
                    <div class="price">
                        <span class="new-price">PHP 1,999</span>
                        <span class="old-price">PHP 3,500</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni6.php">
                    <img src="furni6.jpg" alt="Felicite">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="furni6.php">
                        <h3>Sierra Outdoor Dining Table</h3>
                    </a>
                    <p>Perfect for Gatherings</p>
                    <div class="price">
                        <span class="new-price">Php 6,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni7.php">
                    <img src="furni7.jpg" alt="Isadora">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="furni7.php">
                        <h3>Rio Outdoor Teak Square Side Table</h3>
                    </a>
                    <p>A Versatile Accent Piece</p>
                    <div class="price">
                        <span class="new-price">Php 2,500</span>
                        <span class="old-price">Php 3,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni8.php">
                    <img src="furni8.jpg" alt="Jaliyah">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="furni8.php">
                        <h3>Rio Outdoor Teak Loveseat</h3>
                    </a>
                    <p>A Cozy and Stylish Retreat</p>
                    <div class="price">
                        <span class="new-price">Php 13,999</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni9.php">
                    <img src="furni9.jpg" alt="Eulalia">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="furni9.php">
                        <h3>Rio Outdoor 3 Seater Sofa</h3>
                    </a>
                    <p>Spacious Comfort for Outdoor Living</p>
                    <div class="price">
                        <span class="new-price">PHP 9,000</span>
                        <span class="old-price">PHP 10,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni10.php">
                    <img src="furni10.jpg" alt="Felicite">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="furni10.php">
                        <h3>Malta Outdoor Round Drum Coffee Table</h3>
                    </a>
                    <p>A Stylish and Durable Centerpiece</p>
                    <div class="price">
                        <span class="new-price">Php 6,500</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni11.php">
                    <img src="furni11.jpg" alt="Isadora">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="furni11.php">
                        <h3>Duncan Round Coffee Table</h3>
                    </a>
                    <p>Sleek & Durable for Outdoor Spaces</p>
                    <div class="price">
                        <span class="new-price">Php 2,500</span>
                        <span class="old-price">Php 4,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="furni12.php">
                    <img src="furni12.jpg" alt="Jaliyah">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="furni12.php">
                        <h3>Rio Outdoor Teak Bar Stool Set</h3>
                    </a>
                    <p>A Blend of Comfort and Durability</p>
                    <div class="price">
                        <span class="new-price">Php 4,000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <h2>Splatter</h2>
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
                            <td><a href="#">Blog</a></td>
                            <td><a href="#">Check Cart</a></td>
                            <td><a href="#">Facebook</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">About Us</a></td>
                            <td><a href="#">Checkout</a></td>
                            <td><a href="#">Instagram</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Contact Us</a></td>
                            <td></td>
                            <td><a href="#">LinkedIn</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </footer>

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
    console.log('Searching for:', searchInput);
});

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
        });
    </script>
</body>
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
