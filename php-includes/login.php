<?php
session_start();
require('database.php');

$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
 
$password = md5($password);
$query = mysqli_query($con,"select * from users where username='$username' and password='$password'");

if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_array($query)){
        $_SESSION['username'] = $row['username'];
		$_SESSION['access'] = $row['access_status'];
	    $_SESSION['id'] = session_id();
	    $_SESSION['login_type'] = "users";
		$username = $_SESSION['username'];
		
		$update_access = mysqli_query($con,"update users set access_status = 'Online' where username = '$username'");
	    header("Location:../dashboard.php");
	}
}else{
	echo '<script>alert("Wrong username or password, please try again.");window.location.assign("../index.php");</script>';
}
?>