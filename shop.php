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
            <h1>Shop</h1>
            <div class="breadcrumb">
                <a href="home.php">Home</a> > Shop
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
                <a href="product1.php">
                    <img src="product1.jpg" alt="Cassiopeia">
                </a>
                <div class="discount-badge">-30%</div>
                <div class="product-info">
                    <a href="product1.php">
                        <h3>Austen Counter Stool</h3>
                    </a>
                    <p>Stylish Stool</p>
                    <div class="price">
                        <span class="new-price">PHP 8,999</span>
                        <span class="old-price">PHP 10,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product2.php">
                    <img src="product2.jpg" alt="Brooke Round Dining Table">
                </a>
                <div class="discount-badge">-30%</div>
                <div class="product-info">
                    <a href="product2.php">
                        <h3>Brooke Round Dining Table</h3>
                    </a>
                    <p>Stylish Dining Table</p>
                    <div class="price">
                        <span class="new-price">PHP 11,000</span>
                        <span class="old-price">PHP 12,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product3.php">
                    <img src="product3.jpg" alt="Cressida">
                </a>
                <div class="discount-badge">-50%</div>
                <div class="product-info">
                    <a href="cressida.php">
                        <h3>Kelsey Counter Stool</h3>
                    </a>
                    <p>Luxury stool</p>
                    <div class="price">
                        <span class="new-price">PHP 4,700</span>
                        <span class="old-price">PHP 5,999</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product4.php">
                    <img src="product4.jpg" alt="Dorothea">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="product4.php">
                        <h3>Bradley TV Stand</h3>
                    </a>
                    <p>Indoor TV Stand</p>
                    <div class="price">
                        <span class="new-price">PHP 7,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product5.php">
                    <img src="product5.jpg" alt="Eulalia">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="product5.php">
                        <h3>Dawson Sofa</h3>
                    </a>
                    <p>Luxurious Sofa</p>
                    <div class="price">
                        <span class="new-price">PHP 13,000</span>
                        <span class="old-price">PHP 16,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product6.php">
                    <img src="product6.jpg" alt="Felicite">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="felicite.php">
                        <h3>Hugg Nesting Side Table</h3>
                    </a>
                    <p>Small Side Table</p>
                    <div class="price">
                        <span class="new-price">Php 14,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product7.php">
                    <img src="product7.jpg" alt="Isadora">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="product7.php">
                        <h3>Posey Shelf</h3>
                    </a>
                    <p>Cute Wooden Shelf</p>
                    <div class="price">
                        <span class="new-price">Php 17,000</span>
                        <span class="old-price">Php 19,000</span>
                    </div>
                </div>
            </div>

            <div class="product-item">
                <a href="product8.php">
                    <img src="product8.jpg" alt="Jaliyah">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="product8.php">
                        <h3>Abbey Performance Bench</h3>
                    </a>
                    <p>Minimalist sofa set</p>
                    <div class="price">
                        <span class="new-price">Php 14,000</span>
                    </div>
                </div>
            </div>
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
</html>
