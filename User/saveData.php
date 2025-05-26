<?php
include '../db/Conection.php'; // Database connection


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get values from form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $company = $_POST['company'] ?? '';
    $message = $_POST['message'] ?? '';

   


    // save values to db
    try{
        $sql = "INSERT INTO contacts (name ,email, company, message) VALUES (:name, :email, :company, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':message', $message);
        

        $stmt-> execute();
        echo "<script>alert(' Application sent successfully')</script>";

    }catch(PDOException $e){
        echo "an error occured " . $e->getMessage();
    }
}
?>