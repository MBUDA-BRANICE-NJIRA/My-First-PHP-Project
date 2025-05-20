<?php

session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- -----Navbar-------- --------->
 <?php require('./Includes/header.php'); ?>

<!-- -----Body of the page --------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechPro Solutions | Computer Products</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }


        /* Hero Section */
        .hero {
            padding: 150px 0 100px;
            background-color: #f0f5ff;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-text {
            flex: 1;
        }

        .hero-text h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #1e293b;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #64748b;
        }

        .hero-image {
            flex: 1;
        }

        .hero-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Products Section */
        .products {
            padding: 80px 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .section-title p {
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            height: 200px;
            background-color: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            max-width: 80%;
            max-height: 80%;
        }

        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #1e293b;
        }

        .product-info p {
            color: #64748b;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .product-price {
            font-weight: 700;
            color: #2563eb;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: #f8fafc;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            color: #2563eb;
            font-size: 24px;
        }

        .feature-card h3 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #1e293b;
        }

        .feature-card p {
            color: #64748b;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 80px 0;
            background-color: white;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background-color: #f8fafc;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: #334155;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .author-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h4 {
            font-size: 1rem;
            color: #1e293b;
        }

        .author-info p {
            font-size: 0.9rem;
            color: #64748b;
        }

        /* Contact Section */
        .contact {
            padding: 80px 0;
            background-color: #f0f5ff;
        }

        .contact-container {
            display: flex;
            gap: 40px;
        }

        .contact-info {
            flex: 1;
        }

        .contact-info h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #1e293b;
        }

        .contact-info p {
            margin-bottom: 30px;
            color: #64748b;
        }

        .contact-details {
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            background-color: #e0e7ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .contact-icon i {
            color: #2563eb;
        }

        .contact-form {
            flex: 1;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #1e293b;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 120px;
            resize: vertical;
        }

        .submit-button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #1d4ed8;
        }

       
        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
            }

            .hero-text, .hero-image {
                text-align: center;
            }

            .contact-container {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .header-container {
                justify-content: center;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-content">
            <div class="hero-text">
                <h1>Premium Computer Products for Your Business</h1>
                <p>Boost your productivity with our high-quality computer hardware, software, and accessories. Trusted by over 1,000+ businesses worldwide.</p>
                <a href="#products" class="cta-button">Explore Products</a>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/600x400" alt="Modern computer setup">
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <div class="container">
            <div class="section-title">
                <h2>Our Featured Products</h2>
                <p>Discover our range of high-performance computer products designed for businesses of all sizes.</p>
            </div>
            <div class="product-grid">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/300x200" alt="Business Laptop">
                    </div>
                    <div class="product-info">
                        <h3>Business Pro Laptop</h3>
                        <p>Ultra-thin, powerful laptop designed for professionals. Features 16GB RAM, 512GB SSD, and 14" display.</p>
                        <div class="product-price">$1,299</div>
                        <a href="#contact" class="cta-button">Inquire Now</a>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/300x200" alt="Desktop Workstation">
                    </div>
                    <div class="product-info">
                        <h3>Performance Workstation</h3>
                        <p>High-performance desktop for demanding tasks. Includes 32GB RAM, 1TB SSD, and dedicated graphics.</p>
                        <div class="product-price">$1,899</div>
                        <a href="#contact" class="cta-button">Inquire Now</a>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/300x200" alt="Network Server">
                    </div>
                    <div class="product-info">
                        <h3>Enterprise Server</h3>
                        <p>Reliable server solution for small to medium businesses. Includes redundant storage and power supply.</p>
                        <div class="product-price">$2,499</div>
                        <a href="#contact" class="cta-button">Inquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Us</h2>
                <p>We provide more than just computer products - we deliver complete solutions for your business.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>✓</i>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>All our products are sourced from trusted manufacturers and undergo rigorous quality testing.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>⚡</i>
                    </div>
                    <h3>Fast Delivery</h3>
                    <p>We offer expedited shipping options to ensure you receive your products when you need them.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>🛠️</i>
                    </div>
                    <h3>Technical Support</h3>
                    <p>Our team of experts is available to provide technical assistance and troubleshooting.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>💰</i>
                    </div>
                    <h3>Competitive Pricing</h3>
                    <p>We offer the best value for your investment with flexible payment options.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>Don't just take our word for it - hear from our satisfied customers.</p>
            </div>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "TechPro provided us with top-notch workstations that significantly improved our design team's productivity. Their after-sales support has been exceptional."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://via.placeholder.com/50x50" alt="Sarah Johnson">
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Creative Director, DesignHub</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "We upgraded our entire office with TechPro's business laptops. The performance is outstanding, and the price was within our budget. Highly recommended!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://via.placeholder.com/50x50" alt="Michael Chen">
                        </div>
                        <div class="author-info">
                            <h4>Michael Chen</h4>
                            <p>IT Manager, Global Solutions</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The server solutions from TechPro have been running flawlessly for over two years. Their technical team was extremely helpful during setup and configuration."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="https://via.placeholder.com/50x50" alt="David Rodriguez">
                        </div>
                        <div class="author-info">
                            <h4>David Rodriguez</h4>
                            <p>CTO, Innovate Financial</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Get In Touch</h2>
                <p>Have questions or ready to upgrade your computer systems? Contact us today.</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p>Fill out the form or reach out to us directly using the information below.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i>📍</i>
                            </div>
                            <div>
                                <p>123 Business Avenue, Tech Park, CA 94103</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i>📞</i>
                            </div>
                            <div>
                                <p>+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i>✉️</i>
                            </div>
                            <div>
                                <p>sales@techprosolutions.com</p>
                            </div>
                        </div>
                    </div>
                    <p>Business Hours: Monday - Friday, 9:00 AM - 6:00 PM</p>
                </div>
                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name</label>
                            <input type="text" id="company" placeholder="Your company">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" placeholder="How can we help you?"></textarea>
                        </div>
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<!-- ----Footer ---------------->
<?php require('./Includes/footer.php');  ?>

