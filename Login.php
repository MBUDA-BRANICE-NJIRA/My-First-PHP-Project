<?php
//Include the connection file
include './Conection.php';


//Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Get values from the form

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    //Check if the email and password are not empty

    $sql = "SELECT * FROM register WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    //All users with the same email
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

     // check specific user from array
    if ($user && password_verify($password, $user['password'])) {
        header("Location: dashboard.php");
        exit;
    }else{
        echo "Invalid credentials";
    }
}
?>


<!------------------------------------------Log In Form ------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Login Form</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-container">
            <div class="form-header">
                <div class="logo">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Welcome Back</h2>
                <p>Sign in to access your account</p>
            </div>
            
            <form class="login-form" action="" method="POST">
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Email Address
                    </label>
                    <input type="email" id="email" name="email" placeholder="john@example.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
                
                <div class="form-footer">
                    <p>Don't have an account? <a href="#">Sign Up</a></p>
                    <div class="social-login">
                        <p>Or sign in with:</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>