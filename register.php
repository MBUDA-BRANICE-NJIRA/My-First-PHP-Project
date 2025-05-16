
<?php
// Include the database connection file
include './Conection.php';


//Registering 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Get values from the form
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = "admin";

    //Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //SAVE TO DATABASE
    try{

    $sql = "INSERT INTO register (username, email, password, role) VALUES (:username, :email, :password, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':role', $role);
    
    // Execute the statement
    $stmt->execute();
    // echo "Registration successfully";
  }
  catch(PDOException $e) {
    echo "Error Occured " . $e->getMessage();
}
}
?>

<!-- ---------------------------------------HTML FORM DOCUMENT ------------------------------------>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Signup Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="form-wrapper">
        <div class="form-container">
            <div class="form-header">
                <div class="logo">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2>Join Us Today</h2>
                <p>Create your account in just 30 seconds</p>
            </div>
            
            <form class="signup-form" action="" method="post">
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i> Full Name
                    </label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required>
                </div>
                
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
                    <div class="password-strength">
                        <span class="strength-bar"></span>
                        <span class="strength-text">Password strength</span>
                    </div>
                </div>
                
                <div class="form-group terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the <a href="#">Terms & Conditions</a></label>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Create Account
                </button>
                
                <div class="form-footer">
                    <p>Already have an account? <a href="./Login.php">Sign In</a></p>
                    <div class="social-login">
                        <p>Or sign up with:</p>
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




