<?php
	$db_host = "localhost";
	$db_user = "root"; // "swer3";
	$db_pass = ""; // "Swer3@2023";
	$db_name = "admin_swer3";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'DATABASE CONNECTION ERROR';
	}
?>