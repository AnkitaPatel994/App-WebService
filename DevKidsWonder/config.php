<?php
	$servername = "localhost";
	$username = "devkivhg_devkids";
	$password = "ITT@1995itt";
	$dbname = "devkivhg_devkids_ecommerce";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
?>