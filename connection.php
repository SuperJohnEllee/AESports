<?php
	//mysqli_connect ---> creates a connection to the database
	//localhost --> server name
	//root --> default username of the database
	//password --> ' ' or you can put a password in the database
	//court_reservation --> database name

	$conn = mysqli_connect('localhost', 'root', '', 'court_reservation') or 
	die("Connection Failed: " . mysqli_error());

?>