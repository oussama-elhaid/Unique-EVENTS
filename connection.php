<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password, "unique-events");

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
?>