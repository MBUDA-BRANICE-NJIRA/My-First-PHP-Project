<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Products Sales Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2ecc71;
            --danger: #e74c3c;
            --warning: #f39c12;
            --dark: #34495e;
            --light: #ecf0f1;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
        }
        
        .container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            background-color: var(--dark);
            color: white;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .logo {
            text-align: center;
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .logo h2 {
            font-size: 1.5rem;
        }
        
        .nav-menu {
            margin-top: 30px;
        }
        
        .nav-item {
            padding: 15px 25px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .nav-item:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .nav-item.active {
            background-color: var(--primary);
        }
        
        .nav-item i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
        
        /* Main Content Styles */
        .main-content {
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .card-icon.sales {
            background-color: var(--primary);
        }
        
        .card-icon.revenue {
            background-color: var(--secondary);
        }
        
        .card-icon.products {
            background-color: var(--warning);
        }
        
        .card-icon.customers {
            background-color: var(--danger);
        }
        
        .card h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .card p {
            color: #777;
            font-size: 0.9rem;
        }
        
        .card .value {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .card .change {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        .change.up {
            color: var(--secondary);
        }
        
        .change.down {
            color: var(--danger);
        }
        
        /* Charts Section */
        .charts {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-header h3 {
            font-size: 1.2rem;
        }
        
        .chart-actions select {
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        /* Recent Orders */
        .recent-orders {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status.completed {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status.processing {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .view-all {
            text-align: right;
            margin-top: 15px;
        }
        
        .view-all a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        /* Logout button */
        .logout-btn {
            background-color: var(--danger);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        
        .logout-btn i {
            margin-right: 5px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .dashboard-cards {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .charts {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                display: none;
            }
            
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <h2>Branice L.t.d Company</h2>
            </div>
            
            <div class="nav-menu">
                <div class="nav-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Orders</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-laptop"></i>
                    <span>Products</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-users"></i>
                    <span>Customers</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-bullhorn"></i>
                    <span>Marketing</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Admin Dashboard</h1>
                <div class="user-info">
                 <span>User</span>
                    <button class="logout-btn" onclick="location.href='./LogOut.php'">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </div>
            </div>
            
            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Total Sales</h3>
                            <p>This Month</p>
                        </div>
                        <div class="card-icon sales">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="value">$48,256</div>
                    <div class="change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>12.5% from last month</span>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Revenue</h3>
                            <p>This Month</p>
                        </div>
                        <div class="card-icon revenue">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                    <div class="value">$36,192</div>
                    <div class="change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>8.3% from last month</span>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>Products Sold</h3>
                            <p>This Month</p>
                        </div>
                        <div class="card-icon products">
                            <i class="fas fa-laptop"></i>
                        </div>
                    </div>
                    <div class="value">1,248</div>
                    <div class="change up">
                        <i class="fas fa-arrow-up"></i>
                        <span>5.7% from last month</span>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3>New Customers</h3>
                            <p>This Month</p>
                        </div>
                        <div class="card-icon customers">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="value">186</div>
                    <div class="change down">
                        <i class="fas fa-arrow-down"></i>
                        <span>2.4% from last month</span>
                    </div>
                </div>
            </div>
            
            <!-- Charts Section -->
            <div class="charts">
                <div class="chart-container">
                    <div class="chart-header">
                        <h3>Sales Performance</h3>
                        <div class="chart-actions">
                            <select>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                                <option>This Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="chart-placeholder" style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        [Sales Chart Would Appear Here]
                    </div>
                </div>
                
                <div class="chart-container">
                    <div class="chart-header">
                        <h3>Product Categories</h3>
                        <div class="chart-actions">
                            <select>
                                <option>By Revenue</option>
                                <option>By Units</option>
                            </select>
                        </div>
                    </div>
                    <div class="chart-placeholder" style="height: 300px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                        [Pie Chart Would Appear Here]
                    </div>
                </div>
            </div>
            
            <!-- Recent Orders -->
            <div class="recent-orders">
                <div class="orders-header">
                    <h3>Recent Orders</h3>
                    <div class="chart-actions">
                        <select>
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>All Orders</option>
                        </select>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#TECH-7842</td>
                            <td>John Smith</td>
                            <td>Gaming Laptop</td>
                            <td>$1,299.99</td>
                            <td><span class="status completed">Completed</span></td>
                            <td>May 14, 2023</td>
                        </tr>
                        <tr>
                            <td>#TECH-7841</td>
                            <td>Sarah Johnson</td>
                            <td>Wireless Mouse</td>
                            <td>$49.99</td>
                            <td><span class="status completed">Completed</span></td>
                            <td>May 14, 2023</td>
                        </tr>
                        <tr>
                            <td>#TECH-7840</td>
                            <td>Michael Brown</td>
                            <td>4K Monitor</td>
                            <td>$349.99</td>
                            <td><span class="status processing">Processing</span></td>
                            <td>May 13, 2023</td>
                        </tr>
                        <tr>
                            <td>#TECH-7839</td>
                            <td>Emily Davis</td>
                            <td>Mechanical Keyboard</td>
                            <td>$129.99</td>
                            <td><span class="status pending">Pending</span></td>
                            <td>May 13, 2023</td>
                        </tr>
                        <tr>
                            <td>#TECH-7838</td>
                            <td>Robert Wilson</td>
                            <td>Desktop PC</td>
                            <td>$1,599.99</td>
                            <td><span class="status completed">Completed</span></td>
                            <td>May 12, 2023</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="view-all">
                    <a href="#">View All Orders <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>