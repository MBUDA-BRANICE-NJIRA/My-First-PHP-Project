<?php

//session start
session_start();

//session destroy
session_destroy();

header("Location: ../Auth/Login.php");

?>