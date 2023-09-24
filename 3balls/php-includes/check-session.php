<?php
require('database.php');
session_start();
if(isset($_SESSION['id']) && $_SESSION['login_type']=='users'){
}
else{
	echo '<script>alert("You are not authorized to access this page");window.location.assign("logout.php");</script>';
}
?>