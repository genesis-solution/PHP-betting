<?php
require('database.php');
session_start();
$username = $_SESSION['username'];

$check_status = mysqli_query($con,"select access_status from users where username = '$username'");
$result_status = mysqli_fetch_assoc($check_status);
$access_status = $result_status['access_status'];

if(isset($_SESSION['id']) && $_SESSION['login_type']=='users' && $access_status == 'Online'){
}
else{
	echo '<script>alert("You are not authorized to access this page");window.location.assign("logout.php");</script>';
}
?> 