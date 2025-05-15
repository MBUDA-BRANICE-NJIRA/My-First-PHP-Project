<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Login & Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-hover: #4f46e5;
            --primary-light: rgba(99, 102, 241, 0.1);
            --secondary-color: #f8fafc;
            --text-color: #0f172a;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --danger-color: #ef4444;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            font-size: 1.25rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 1.5rem;
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 0;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn i {
            font-size: 0.875rem;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-light);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 8px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(99, 102, 241, 0.25);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            z-index: 101;
        }

        .hamburger span {
            width: 25px;
            height: 2px;
            background-color: var(--text-color);
            margin: 3px 0;
            border-radius: 2px;
            transition: var(--transition);
        }

        /* Hero Section */
        .hero {
            padding: 6rem 0 4rem;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .hero-text {
            flex: 1;
            max-width: 600px;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
        }

        .hero h1 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            font-weight: 800;
        }

        .hero h1 span {
            color: var(--primary-color);
            position: relative;
        }

        .hero h1 span::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: var(--primary-light);
            z-index: -1;
        }

        .hero p {
            font-size: 1.125rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.25rem;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .section-title p {
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .feature-description {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Modal Styles */
        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-backdrop.active {
            display: block;
            opacity: 1;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            z-index: 1001;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal.active {
            display: block;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        .modal-content {
            background-color: white;
            padding: 2.5rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 450px;
            box-shadow: var(--box-shadow);
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 1.25rem;
            right: 1.25rem;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .close-modal:hover {
            background-color: var(--border-color);
            color: var(--text-color);
        }

        .form-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        .form-subtitle {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            color: var(--text-color);
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: var(--text-muted);
        }

        .input-action {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 1rem;
            color: var(--text-muted);
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .input-action:hover {
            color: var(--primary-color);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: var(--transition);
            background-color: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-control.error {
            border-color: var(--danger-color);
        }

        .error-message {
            color: var(--danger-color);
            font-size: 0.75rem;
            margin-top: 0.5rem;
            display: none;
        }

        .error-message.visible {
            display: block;
        }

        .password-strength {
            height: 4px;
            background-color: var(--border-color);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            transition: var(--transition);
        }

        .strength-weak {
            background-color: var(--danger-color);
            width: 33%;
        }

        .strength-medium {
            background-color: var(--warning-color);
            width: 66%;
        }

        .strength-strong {
            background-color: var(--success-color);
            width: 100%;
        }

        .strength-text {
            font-size: 0.75rem;
            color: var(--text-muted);
            margin-top: 0.25rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary-color);
        }

        .checkbox-group label {
            margin-bottom: 0;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
        }

        .form-footer p {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .form-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .btn-block {
            display: block;
            width: 100%;
            padding: 0.875rem;
        }

        .social-login {
            margin-top: 2rem;
            position: relative;
        }

        .social-login::before {
            content: 'OR';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            padding: 0 10px;
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 500;
        }

        .social-login::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: var(--border-color);
        }

        .social-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 1px solid var(--border-color);
            color: var(--text-color);
            font-weight: 500;
            transition: var(--transition);
            cursor: pointer;
        }

        .social-btn:hover {
            background-color: var(--secondary-color);
        }

        .social-btn i {
            font-size: 1.25rem;
        }

        .social-btn.google i {
            color: #DB4437;
        }

        .social-btn.facebook i {
            color: #4267B2;
        }

        /* Footer */
        .footer {
            background-color: white;
            padding: 4rem 0 2rem;
            border-top: 1px solid var(--border-color);
            margin-top: 4rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .footer-column h3 {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.875rem;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .copyright {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .social-icon:hover {
            background-color: var(--primary-light);
            color: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Loading State */
        .btn-loading {
            position: relative;
            color: transparent !important;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Toast Notification */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            background-color: white;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: var(--box-shadow);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            min-width: 300px;
            max-width: 400px;
            transform: translateX(120%);
            animation: slideIn 0.3s forwards;
        }

        .toast.success {
            border-left: 4px solid var(--success-color);
        }

        .toast.error {
            border-left: 4px solid var(--danger-color);
        }

        .toast-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .toast.success .toast-icon {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
        }

        .toast.error .toast-icon {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-color);
        }

        .toast-message {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .toast-close {
            color: var(--text-muted);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            padding: 0.25rem;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            to {
                transform: translateX(120%);
            }
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-links {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background-color: white;
                flex-direction: column;
                padding: 6rem 2rem 2rem;
                z-index: 100;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links li {
                margin: 1rem 0;
                text-align: center;
            }

            .auth-buttons {
                display: none;
            }

            .auth-buttons.active {
                display: flex;
                flex-direction: column;
                width: 100%;
                padding: 0 2rem;
                margin-top: 2rem;
                position: fixed;
                left: 0;
                z-index: 100;
            }

            .hamburger.active span:nth-child(1) {
                transform: translateY(7px) rotate(45deg);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: translateY(-7px) rotate(-45deg);
            }

            .hero h1 {
                font-size: 2.25rem;
            }

            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
                align-items: center;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .social-buttons {
                flex-direction: column;
            }

            .modal-content {
                padding: 2rem 1.5rem;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container navbar-container">
            <a href="#" class="logo">
                <i class="fas fa-cube"></i>
                Fusion
            </a>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="#">Home</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            
            <div class="auth-buttons" id="authButtons">
                <button class="btn btn-outline" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
                <button class="btn btn-primary" id="registerBtn">
                    <i class="fas fa-user-plus"></i>
                    Register
                </button>
            </div>
            
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Build Your <span>Digital Presence</span> With Us</h1>
                    <p>Our platform provides everything you need to establish and grow your online business. Join thousands of satisfied customers who have transformed their ideas into reality.</p>
                    <div class="hero-buttons">
                        <button class="btn btn-primary" id="heroRegisterBtn">
                            <i class="fas fa-rocket"></i>
                            Get Started
                        </button>
                        <button class="btn btn-outline">
                            <i class="fas fa-play"></i>
                            Watch Demo
                        </button>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">10k+</span>
                            <span class="stat-label">Active Users</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Countries</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">99%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&h=600&q=80" alt="Team working together">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Us</h2>
                <p>Discover the features that make our platform stand out from the competition</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure & Reliable</h3>
                    <p class="feature-description">Our platform uses industry-leading security measures to keep your data safe and ensure 99.9% uptime.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Lightning Fast</h3>
                    <p class="feature-description">Experience blazing-fast performance with our optimized infrastructure and global CDN network.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-description">Our dedicated support team is available around the clock to help you with any issues or questions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Backdrop -->
    <div class="modal-backdrop" id="modalBackdrop"></div>

    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <button class="close-modal" id="closeLoginModal">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="form-title">Welcome Back</h2>
            <p class="form-subtitle">Sign in to your account to continue</p>
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="loginEmail" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="error-message" id="loginEmailError">Please enter a valid email address</div>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="loginPassword" class="form-control" placeholder="Enter your password" required>
                        <button type="button" class="input-action" id="toggleLoginPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="loginPasswordError">Password must be at least 6 characters</div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" id="loginSubmitBtn">Sign In</button>
                <div class="form-footer">
                    <p>Don't have an account? <a href="#" id="switchToRegister">Register</a></p>
                    <p style="margin-top: 0.5rem;"><a href="#">Forgot password?</a></p>
                </div>
                <div class="social-login">
                    <div class="social-buttons">
                        <button type="button" class="social-btn google">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                        <button type="button" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <button class="close-modal" id="closeRegisterModal">
                <i class="fas fa-times"></i>
            </button>
            <h2 class="form-title">Create Account</h2>
            <p class="form-subtitle">Join our community and start your journey</p>
            <form id="registerForm">
                <div class="form-group">
                    <label for="registerName">Full Name</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="registerName" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="error-message" id="registerNameError">Please enter your full name</div>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="registerEmail" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="error-message" id="registerEmailError">Please enter a valid email address</div>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="registerPassword" class="form-control" placeholder="Create a password" required>
                        <button type="button" class="input-action" id="toggleRegisterPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-meter" id="passwordStrengthMeter"></div>
                    </div>
                    <div class="strength-text" id="passwordStrengthText">Password strength</div>
                    <div class="error-message" id="registerPasswordError">Password must be at least 8 characters</div>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Confirm Password</label>
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" id="registerConfirmPassword" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <div class="error-message" id="registerConfirmPasswordError">Passwords do not match</div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="termsAgreement" required>
                    <label for="termsAgreement">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>
                <button type="submit" class="btn btn-primary btn-block" id="registerSubmitBtn">Create Account</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="#" id="switchToLogin">Login</a></p>
                </div>
                <div class="social-login">
                    <div class="social-buttons">
                        <button type="button" class="social-btn google">
                            <i class="fab fa-google"></i>
                            Google
                        </button>
                        <button type="button" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>Company</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Product</h3>
                    <ul class="footer-links">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Integrations</a></li>
                        <li><a href="#">Changelog</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">Community</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Legal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">GDPR</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="copyright">&copy; 2025 Fusion. All rights reserved.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // DOM Elements
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');
        const authButtons = document.getElementById('authButtons');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const loginModal = document.getElementById('loginModal');
        const registerModal = document.getElementById('registerModal');
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');
        const heroRegisterBtn = document.getElementById('heroRegisterBtn');
        const closeLoginModal = document.getElementById('closeLoginModal');
        const closeRegisterModal = document.getElementById('closeRegisterModal');
        const switchToRegister = document.getElementById('switchToRegister');
        const switchToLogin = document.getElementById('switchToLogin');
        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
        const loginPassword = document.getElementById('loginPassword');
        const registerPassword = document.getElementById('registerPassword');
        const registerConfirmPassword = document.getElementById('registerConfirmPassword');
        const passwordStrengthMeter = document.getElementById('passwordStrengthMeter');
        const passwordStrengthText = document.getElementById('passwordStrengthText');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const loginSubmitBtn = document.getElementById('loginSubmitBtn');
        const registerSubmitBtn = document.getElementById('registerSubmitBtn');
        const toastContainer = document.getElementById('toastContainer');

        // Toggle mobile menu
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            authButtons.classList.toggle('active');
        });

        // Modal functions
        function openModal(modal) {
            modalBackdrop.classList.add('active');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modal) {
            modalBackdrop.classList.remove('active');
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        function closeAllModals() {
            closeModal(loginModal);
            closeModal(registerModal);
        }

        // Open modals
        loginBtn.addEventListener('click', () => openModal(loginModal));
        registerBtn.addEventListener('click', () => openModal(registerModal));
        heroRegisterBtn.addEventListener('click', () => openModal(registerModal));

        // Close modals
        closeLoginModal.addEventListener('click', () => closeModal(loginModal));
        closeRegisterModal.addEventListener('click', () => closeModal(registerModal));
        modalBackdrop.addEventListener('click', closeAllModals);

        // Switch between modals
        switchToRegister.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(loginModal);
            openModal(registerModal);
        });

        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            closeModal(registerModal);
            openModal(loginModal);
        });

        // Toggle password visibility
        toggleLoginPassword.addEventListener('click', () => {
            const type = loginPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            loginPassword.setAttribute('type', type);
            toggleLoginPassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

        toggleRegisterPassword.addEventListener('click', () => {
            const type = registerPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            registerPassword.setAttribute('type', type);
            toggleRegisterPassword.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

        // Password strength meter
        registerPassword.addEventListener('input', () => {
            const password = registerPassword.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
            if (password.match(/\d/)) strength += 1;
            if (password.match(/[^a-zA-Z\d]/)) strength += 1;
            
            passwordStrengthMeter.className = 'password-strength-meter';
            
            if (password.length === 0) {
                passwordStrengthMeter.style.width = '0';
                passwordStrengthText.textContent = 'Password strength';
            } else if (strength < 2) {
                passwordStrengthMeter.classList.add('strength-weak');
                passwordStrengthText.textContent = 'Weak password';
                passwordStrengthText.style.color = '#ef4444';
            } else if (strength < 4) {
                passwordStrengthMeter.classList.add('strength-medium');
                passwordStrengthText.textContent = 'Medium password';
                passwordStrengthText.style.color = '#f59e0b';
            } else {
                passwordStrengthMeter.classList.add('strength-strong');
                passwordStrengthText.textContent = 'Strong password';
                passwordStrengthText.style.color = '#10b981';
            }
        });

        // Form validation
        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function showError(input, errorElement, message) {
            input.classList.add('error');
            errorElement.textContent = message;
            errorElement.classList.add('visible');
        }

        function hideError(input, errorElement) {
            input.classList.remove('error');
            errorElement.classList.remove('visible');
        }

        // Login form validation
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail');
            const password = document.getElementById('loginPassword');
            const emailError = document.getElementById('loginEmailError');
            const passwordError = document.getElementById('loginPasswordError');
            let isValid = true;
            
            // Validate email
            if (!validateEmail(email.value)) {
                showError(email, emailError, 'Please enter a valid email address');
                isValid = false;
            } else {
                hideError(email, emailError);
            }
            
            // Validate password
            if (password.value.length < 6) {
                showError(password, passwordError, 'Password must be at least 6 characters');
                isValid = false;
            } else {
                hideError(password, passwordError);
            }
            
            if (isValid) {
                // Show loading state
                loginSubmitBtn.classList.add('btn-loading');
                
                // Simulate API call
                setTimeout(() => {
                    loginSubmitBtn.classList.remove('btn-loading');
                    closeModal(loginModal);
                    showToast('Success', 'You have successfully logged in!', 'success');
                    loginForm.reset();
                }, 1500);
            }
        });

        // Register form validation
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('registerName');
            const email = document.getElementById('registerEmail');
            const password = document.getElementById('registerPassword');
            const confirmPassword = document.getElementById('registerConfirmPassword');
            const nameError = document.getElementById('registerNameError');
            const emailError = document.getElementById('registerEmailError');
            const passwordError = document.getElementById('registerPasswordError');
            const confirmPasswordError = document.getElementById('registerConfirmPasswordError');
            const termsAgreement = document.getElementById('termsAgreement');
            let isValid = true;
            
            // Validate name
            if (name.value.trim() === '') {
                showError(name, nameError, 'Please enter your full name');
                isValid = false;
            } else {
                hideError(name, nameError);
            }
            
            // Validate email
            if (!validateEmail(email.value)) {
                showError(email, emailError, 'Please enter a valid email address');
                isValid = false;
            } else {
                hideError(email, emailError);
            }
            
            // Validate password
            if (password.value.length < 8) {
                showError(password, passwordError, 'Password must be at least 8 characters');
                isValid = false;
            } else {
                hideError(password, passwordError);
            }
            
            // Validate confirm password
            if (password.value !== confirmPassword.value) {
                showError(confirmPassword, confirmPasswordError, 'Passwords do not match');
                isValid = false;
            } else {
                hideError(confirmPassword, confirmPasswordError);
            }
            
            // Validate terms agreement
            if (!termsAgreement.checked) {
                isValid = false;
                alert('Please agree to the Terms of Service and Privacy Policy');
            }
            
            if (isValid) {
                // Show loading state
                registerSubmitBtn.classList.add('btn-loading');
                
                // Simulate API call
                setTimeout(() => {
                    registerSubmitBtn.classList.remove('btn-loading');
                    closeModal(registerModal);
                    showToast('Success', 'Your account has been created successfully!', 'success');
                    registerForm.reset();
                    passwordStrengthMeter.style.width = '0';
                    passwordStrengthText.textContent = 'Password strength';
                    passwordStrengthText.style.color = '';
                }, 1500);
            }
        });

        // Toast notification
        function showToast(title, message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            
            toast.innerHTML = `
                <div class="toast-icon">
                    <i class="fas ${type === 'success' ? 'fa-check' : 'fa-exclamation'}"></i>
                </div>
                <div class="toast-content">
                    <div class="toast-title">${title}</div>
                    <div class="toast-message">${message}</div>
                </div>
                <button class="toast-close">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            toastContainer.appendChild(toast);
            
            const closeBtn = toast.querySelector('.toast-close');
            closeBtn.addEventListener('click', () => {
                toast.style.animation = 'slideOut 0.3s forwards';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            });
            
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s forwards';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }, 5000);
        }

        // Close modals when pressing Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeAllModals();
            }
        });
    </script>
</body>
</html>