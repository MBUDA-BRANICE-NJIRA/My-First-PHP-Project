<?php

session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- -----Html top section -------->
 <?php require('../User/Includes/header.php'); ?>


<!-- -----Body of the page --------->

<?php require('../User/Includes/Body.php');  ?>

<!-- ------Footer ------------------>
<?php require('../User/Includes/footer.php');  ?>