<?php
require('php-includes/database.php');
session_start();
$username = $_SESSION['username'];
$update_access = mysqli_query($con,"update users set access_status = 'Offline' where username = '$username'");
session_destroy();
echo '<script>alert("Signed out successfully!");window.location.assign("index.php");</script>';
?>