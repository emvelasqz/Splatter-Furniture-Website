<?php
session_start();
date_default_timezone_set('Asia/Manila'); 
$currentDateTime = date('F j, Y | g:i A'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Store</title>
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Montaga&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Besley:ital,wght@0,400..900;1,400..900&family=DM+Serif+Text:ital@0;1&family=Great+Vibes&family=Montaga&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&family=WindSong:wght@400;500&family=Yeseva+One&display=swap" rel="stylesheet">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                        Welcome, <?php echo htmlspecialchars($_SESSION["firstname"]); ?>! 
                        <a href="logout.php" class="logout-link">Logout</a>
                    </div>
                <?php } else { ?>
                    <a href="login.php" class="icon-link">
                        <i class="fas fa-user"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Best <br><span>Furniture Here!</span></h1>
            <p>Shop high-quality furniture for your home today. Discover things you deserve.</p>
            <form class="search-bar" action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search furniture" required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </section>

    <section class="features">
        <div class="feature-item">
            <i class="fas fa-truck"></i>
            <div class="feature-text">
                <h3>Free Delivery</h3>
                <p>No delivery charge for you</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-clock"></i>
            <div class="feature-text">
                <h3>Support 24/7</h3>
                <p>Virtual customer assistance</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-shield-alt"></i>
            <div class="feature-text">
                <h3>100% Authentic</h3>
                <p>Authentic items assured</p>
            </div>
        </div>
    </section>

    <section class="browse-range">
        <h2>Browse The Range</h2>
        <p>Explore our curated collection of stylish, high-quality furniture designed to enhance any space, blending comfort, functionality, and timeless elegance.</p>
        <div class="category-links">
            <a href="Sofas.php" class="category-item">
                <img src="sofa11.jpg" alt="Dining">
                <h3>Sofas</h3>
            </a>
            <a href="Chairs.php" class="category-item">
                <img src="chair3.jpg" alt="Living">
                <h3>Chairs</h3>
            </a>
            <a href="Beds.php" class="category-item">
                <img src="bed3.jpg" alt="Bedroom">
                <h3>Beds</h3>
            </a>
        </div>
    </section>

    <section class="full-width-section">
        <div class="section-container">
            <div class="image-container left-image">
                <img src="room.png" alt="Featured Image 1">
            </div>
            <div class="text-container">
                <h2>Beautify Your Space</h2>
                <p>Craft a space that truly reflects you. Browse our collection to find the perfect touches for your unique style.</p>
                <a href="shop.php" class="button">Learn More</a>
                </div>
            <div class="image-container right-image">
                <img src="room.png" alt="Featured Image 2">
            </div>
        </div>
    </section>

    <section class="products">
        <h2>Our Products</h2>
        <div class="product-grid">
            <div class="product-item">
                <a href="home-product7.php">
                    <img src="product7.jpg" alt="Alberte">
                </a>
                <div class="discount-badge">-20%</div>
                <div class="product-info">
                    <a href="home-product7.php">
                        <h3>Posey Shelf</h3>
                    </a>
                    <p>Cute Woooden Shelf</p>
                    <div class="price">
                        <span class="new-price">PHP 17, 000</span>
                        <span class="old-price">PHP 19, 000</span>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="home-product3.php">
                    <img src="product3.jpg" alt="Aliyah">
                </a>
                <div class="discount-badge">-5%</div>
                <div class="product-info">
                    <a href="home-product3.php">
                        <h3>Kelsey Counter Stool</h3>
                    </a>
                    <p>Luxury Stool</p>
                    <div class="price">
                        <span class="new-price">PHP 14,000</span>
                        <span class="old-price">PHP 15,000</span>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="product1.php">
                    <img src="product1.jpg" alt="Anneliese">
                </a>
                <div class="discount-badge">-30%</div>
                <div class="product-info">
                    <a href="home-product1.php">
                        <h3>Austen Counter Stool</h3>
                    </a>
                    <p>Luxury Big Sofa</p>
                    <div class="price">
                        <span class="new-price">PHP 8,999</span>
                        <span class="old-price">PHP 10,000</span>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="product5.php">
                    <img src="product5.jpg" alt="Aurelie">
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
                <a href="home-product8.php">
                    <img src="product8.jpg" alt="Beatrix">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="home-product8.php">
                        <h3>Abbey Performance Bench</h3>
                    </a>
                    <p>Minimalis Sofa Set</p>
                    <div class="price">
                        <span class="new-price">PHP 14,000</span>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="home-product2.php">
                    <img src="product2.jpg" alt="Benoite">
                </a>
                <div class="discount-badge">-10%</div>
                <div class="product-info">
                    <a href="home-product2.php">
                        <h3>Brooke Round Dining Table</h3>
                    </a>
                    <p>Stylish Dining Table</p>
                    <div class="price">
                        <span class="new-price">Php 11,000</span>
                        <span class="old-price">PHP 12,000</span>

                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="home-product4.php">
                    <img src="product4.jpg" alt="Brunhilde">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="home-product4.php">
                        <h3>Bradley TV Stand</h3>
                    </a>
                    <p>Indoor TV Stand</p>
                    <div class="price">
                        <span class="new-price">PHP 7,000</span>
                    </div>
                </div>
            </div>
            <div class="product-item">
                <a href="home-product6.php">
                    <img src="product6.jpg" alt="Capucine">
                </a>
                <div class="new-badge">New</div>
                <div class="product-info">
                    <a href="home-product6.php">
                        <h3>Hugg Nesting Side Table</h3>
                    </a>
                    <p>Small Side Table</p>
                    <div class="price">
                        <span class="new-price">PHP 14,000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testimonials">
        <h2>Testimonials</h2>
        <p class="subheading">Over 1,300 are happy at our products</p>
    
        <div class="testimonial-grid">
            <div class="testimonial-item" style="background-image: url('living.png');">
                <div class="testimonial-content">
                    <img src="testimonial-profile1.jpg" alt="Raji Miguel Dizon">
                    <div class="testimonial-info">
                        <h3>Kim Catrall</h3>
                        <p class="title">Retired Actress, 68</p>
                        <p class="quote">This furniture transformed my space with its unique design and high-quality craftsmanship.</p>
                        <div class="stars">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="testimonial-item" style="background-image: url('product2.jpg');">
                <div class="testimonial-content">
                    <img src="testimonial-profile3.jpg" alt="Shantel Salvador">
                    <div class="testimonial-info">
                        <h3>Phoebe Bridgers</h3>
                        <p class="title">Singer, 27</p>
                        <p class="quote">The bookshelf was the perfect blend of style and utility, making it an essential addition to my home!

                        </p>
                        <div class="stars">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="testimonial-item" style="background-image: url('product2.jpg');">
                <div class="testimonial-content">
                    <img src="testimonial-profile.jpg" alt="Keflene Cosme">
                    <div class="testimonial-info">
                        <h3>Sydney Sweeney</h3>
                        <p class="title">Actress, 28</p>
                        <p class="quote">A perfect addition to any home, this item combines durability and style, making it a standout piece.</p>
                        <div class="stars">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="testimonial-item" style="background-image: url('product2.jpg');">
                <div class="testimonial-content">
                    <img src="testimonial-profile4.jpg" alt="Testimonial 4">
                    <div class="testimonial-info">
                        <h3>Sabrina Carpenter</h3>
                        <p class="title">Singer, 25</p>
                        <p class="quote">This piece enhances any room with its elegant design, offering both style and practicality for everyday use.                        </p>
                        <div class="stars">
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                            <span class="star">&#9733;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram-section">
    <div class="instagram-header">
        <h2>#design</h2>
        <a href="https://www.instagram.com/castleryus/" target="_blank" class="follow-us">
            <i class="fab fa-instagram"></i> FOLLOW US ON INSTAGRAM
        </a>
    </div>
    <div class="instagram-grid">
        <div class="instagram-item">
            <a href="https://www.instagram.com/castleryus/" target="_blank">
                <img src="home-post4.jpg" alt="Instagram Post 1">
            </a>
        </div>
        <div class="instagram-item">
            <a href="https://www.instagram.com/castleryus/" target="_blank">
                <img src="home-post2.jpg" alt="Instagram Post 2">
            </a>
        </div>
        <div class="instagram-item">
            <a href="https://www.instagram.com/castleryus/" target="_blank">
                <img src="home-post3.jpg" alt="Instagram Post 3">
            </a>
        </div>
    </div>
</section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <h2 class="windsong-logo">Splatter</h2>
                <p>Crafting comfort, one piece at a time.</p>
                <p>1st Street, Balibago, Angeles City, Pampanga, 2008, Philippines</p>
                <div class="footer-date-time"><?php echo $currentDateTime; ?></div>
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
