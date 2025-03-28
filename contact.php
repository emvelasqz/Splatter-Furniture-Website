<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "shansalvadr@gmail.com";
    $subject = "New Ticket from $full_name";
    $body = "Name: $full_name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Ticket sent successfully!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Failed to send ticket. Please try again.'); window.location.href = 'index.html';</script>";
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
    <link rel="stylesheet" href="contact.css">
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
            <h1>Contact</h1>
            <div class="breadcrumb">
                <a href="home.php">Home</a> > Contact
            </div>
        </div>
    </section>


    <section class="features">
        <div class="feature-item">
            <i class="fas fa-star"></i> 
            <div class="feature-text">
                <h3>High Quality</h3>
                <p>Crafted from top materials</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-shield-alt"></i> 
            <div class="feature-text">
                <h3>Warranty Protection</h3>
                <p>Over 2 years</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-truck"></i> 
            <div class="feature-text">
                <h3>Free Shipping</h3>
                <p>No charge delivery</p>
            </div>
        </div>
        <div class="feature-item">
            <i class="fas fa-headset"></i> 
            <div class="feature-text">
                <h3>24 / 7 Support</h3>
                <p>Dedicated support</p>
            </div>
        </div>
    </section>

    <div class="contact-section">
    <div class="contact-content">
        <div class="contact-text">
            <h2>Get In Touch With Us</h2>
            <p>For More Information About Our Product & Services. Please Feel Free To Drop Us An Email. Our Staff Always Be There To Help You Out. Do Not Hesitate!</p>
            <div class="contact-info">
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i> 
                    <div>
                        <h3>Address</h3>
                        <p>1st Street, Balthogo, Angeles City, Pampanga, 2009, Philippines</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i> 
                    <div>
                        <h3>Phone</h3>
                        <p>(63) 998-166-7570</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i> 
                    <div>
                        <h3>Working Time</h3>
                        <p>Monday-Friday: 9:00 - 22:00</p>
                        <p>Saturday-Sunday: 9:00 - 21:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="image-collage">
            <div class="image-column">
                <div class="image-item">
                    <img src="contact1.png" alt="Photo 2">
                </div>
                <div class="image-item">
                    <img src="contact2.png" alt="Photo 1">
                </div>
            </div>
            <div class="image-column">
                <div class="image-item">
                    <img src="contact2.png" alt="Photo 4">
                </div>
                <div class="image-item">
                    <img src="contact1.png" alt="Photo 3">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-line-wrapper">
        <section class="product-line">
            <div class="product-item">
                <img src="fun1.png" alt="Nordic Chair">
                <div class="product-text">
                    <h2>Nordic Chair</h2>
                    <p>Offering unmatched comfort and a futuristic flair for any room.</p>
                    <a href="contact-blog1.php" class="read-more">Read more</a>
                </div>
            </div>
            <div class="product-item">
                <img src="fun3.png" alt="Kruzi Aero">
                <div class="product-text">
                    <h2>Rustic Furniture</h2>
                    <p>Elevate your space with the timeless and minimalist charm.</p>
                    <a href="contact-blog4.php" class="read-more">Read more</a>
                </div>
            </div>
            <div class="product-item">
                <img src="fun4.png" alt="Ergonomic Chair">
                <div class="product-text">
                    <h2>Stylist Sofa</h2>
                    <p>Transform your living space with our Stylist Sofa, blending comfort with eye-catching design.</p>
                    <a href="contact-blog3.php" class="read-more">Read more</a>
                </div>
            </div>
        </section>
    </div>


    <div class="functionality-section">
        <div class="functionality-content">
            <div class="text-content">
                <h2>Reimagining Living Spaces</h2>
                <p>Beyond mere furniture, we craft experiences. Our pieces are thoughtfully conceived to transform ordinary spaces into extraordinary environments, where every curve, every line speaks to both practicality and personal expression.</p>
            </div>
            <div class="progress-bars">
                <div class="progress-item">
                    <div class="progress-top">
                        <div class="progress-label">Innovation</div>
                        <div class="progress-percent">99%</div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 99%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-top">
                        <div class="progress-label">Ingenuity</div>
                        <div class="progress-percent">100%</div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="progress-item">
                    <div class="progress-top">
                        <div class="progress-label">Conception</div>
                        <div class="progress-percent">98%</div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 98%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
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
