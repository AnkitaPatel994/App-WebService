<?php
	$servername = "localhost";
	$username = "sound";
	$password = "sound@2019";
	$dbname = "relaxio";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
?>