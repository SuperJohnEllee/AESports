<?php
	/*
		session 
		user and admin session after you logged in
	*/
	session_start(); //starts the session
	include ('connection.php'); //include the connection
	session_set_cookie_params(432000); //set cookie parameters in seconds
	$account_check = htmlspecialchars($_SESSION['login_account']); // define login var
	$ses_sql = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$account_check'"); //query the user accounts
	$ses_row = mysqli_fetch_assoc($ses_sql); //fetch user account info in the database

	//set session variables and concatinate name and fullname
	$id = htmlspecialchars($ses_row['ID']);
	$lastname = htmlspecialchars($ses_row['LastName']);
	$firstname = htmlspecialchars($ses_row['FirstName']);
	$midname = htmlspecialchars($ses_row['MiddleName']);
	$name = htmlspecialchars($ses_row['FirstName']) . " " . htmlspecialchars($ses_row['LastName']);
	$fullname = htmlspecialchars($ses_row['FirstName']) . " " . htmlspecialchars($ses_row['MiddleName']) . " " . htmlspecialchars($ses_row['LastName']);  
	$email = htmlspecialchars($ses_row['Email']);
	$gender = htmlspecialchars($ses_row['Gender']);
	$bdate = htmlspecialchars($ses_row['Birthdate']);
	$type = htmlspecialchars($ses_row['Type']);
	$log_ses = htmlspecialchars($ses_row['Username']);
	$password = htmlspecialchars($ses_row['Password']);

	//if the user or admin is not logged in
	//if the session var is not set, it must directly go the the error page

	if (!isset($_SESSION['login_account'])) {
		header('location: error_page.php');
	}
?>