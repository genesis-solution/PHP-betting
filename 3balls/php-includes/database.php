<?php
	$db_host = "localhost";
	$db_user = "pick3";
	$db_pass = "Pick3@2023";
	$db_name = "admin_pick3";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'DATABASE CONNECTION ERROR';
	}
?>