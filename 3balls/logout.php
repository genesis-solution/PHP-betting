<?php
session_start();
session_destroy();
require('php-includes/database.php');
echo '<script>alert("Signed out successfully!");window.location.assign("index.php");</script>';
?>