<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNJ.Tech Company | Computer Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #2563eb;
            z-index: 1001;
        }

        .logo span {
            color: #333;
        }

        /* Navigation Styles */
        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin-right: 20px;
        }

        nav ul li {
            margin-left: 30px;
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
            position: relative;
        }

        nav ul li a:hover {
            color: #2563eb;
        }

        /* Underline effect on hover */
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #2563eb;
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }

        /* Active link style */
        nav ul li a.active {
            color: #2563eb;
            font-weight: 600;
        }

        nav ul li a.active::after {
            width: 100%;
        }

        .cta-button {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
            border: 2px solid #2563eb;
        }

        .cta-button:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
        }

        .cta-button:active {
            transform: translateY(0);
        }

        /* Mobile Menu */
        .hamburger {
            display: none;
            cursor: pointer;
            z-index: 1001;
        }

        .hamburger .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #333;
            transition: all 0.3s ease-in-out;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            nav ul li {
                margin-left: 20px;
            }
        }

        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }

            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }

            nav {
                position: fixed;
                left: -100%;
                top: 0;
                flex-direction: column;
                background-color: white;
                width: 100%;
                height: 100vh;
                text-align: center;
                transition: 0.3s;
                box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
                padding-top: 80px;
                z-index: 1000;
            }

            nav.active {
                left: 0;
            }

            nav ul {
                flex-direction: column;
                margin-right: 0;
            }

            nav ul li {
                margin: 15px 0;
            }

            .cta-button {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <div class="logo">BNJ.Tech<span>Company</span></div>
            
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <nav>
                <ul>
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="../../../PHP/User/Articles/Articles.php">Articles</a></li>
                    <li><a href="../../../PHP/User/Articles/create.php">Create Article</a></li>
                </ul>
                <a class="cta-button" onclick="location.href='../../../PHP/Auth/LogOut.php'">Log Out</a>
            </nav>
        </div>
    </header>

    <!-- Add your page content here -->

    <script>
        // Mobile menu toggle
        const hamburger = document.querySelector(".hamburger");
        const nav = document.querySelector("nav");
        
        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            nav.classList.toggle("active");
        });
        
        // Close mobile menu when clicking on a nav link
        document.querySelectorAll("nav a").forEach(link => {
            link.addEventListener("click", () => {
                hamburger.classList.remove("active");
                nav.classList.remove("active");
            });
        });
        
        // Set active link based on current page
        const currentLocation = location.href;
        const menuItems = document.querySelectorAll('nav ul li a');
        
        menuItems.forEach(link => {
            if(link.href === currentLocation) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>