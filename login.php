<?php
	/**
		The Login Form
		
		Return keywords

		Active -> If account was activated
		Inactive -> If account was deactivated
		User -> If user account was logged in
		Admin -> If admin account was logged in

		Variables

		$_POST['username'] -> text
		$_POST['password'] -> text
	**/
	
	session_start(); //start the session
	include ('connection.php'); //connection
	date_default_timezone_set('Asia/Manila'); // set timezone

	if (isset($_POST['login'])) //set the button name
	{  

	//define username and password variable
	$username = htmlspecialchars($_POST['username']); // Convert special and predefined characters to HTML entities
	$password = htmlspecialchars($_POST['password']);

	//Protection from MySQL Injection
	$username = stripslashes($username); //removes backslashes
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn, $username); //escapes special characters
	$password = mysqli_real_escape_string($conn, $password);//in a string for use in a SQL Statement, specifies the MySQL connection

	//check username if valid or not
	$check_login = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$username'"); //select query --> performs a query against the database.
	$check_count = mysqli_num_rows($check_login); //count number of rows existing --> returns the number of rows
	$check_row = mysqli_fetch_assoc($check_login); // fetch data in the database --> fetch a result row in an associative array
	
	//db variables
	$check_pass = htmlspecialchars($check_row['Password']);
	$type = htmlspecialchars($check_row['Type']);
	$status = htmlspecialchars($check_row['Status']);

	if ($check_count > 0) { // check if username is existing
		if ($status == "Active") { //check if status is Active or Inactive
			if ($check_pass == $password) { // check if password from database and your inputted password is match
				$_SESSION['login_account'] = $username; //session variable
				if ($type == 'User') {
					//if user, it will directly go to his/her dashboard
					header('location: user-dashboard.php');
				} 
				elseif ($type == 'Admin') {
					//else if admin, it will directly go to his/her dashboard
					header('location: admin-dashboard.php');
				}
				//User and Admin Login Logs --> Text File
				$filename = "system/login_user.txt"; // filename
            	$fp = fopen($filename, 'a+'); // open file with mode
            	fwrite($fp, " ". $username . " | " . $password . " | " . $type . " | " . $status . " | " . date("l jS \of F Y h:i:s A"). "\n"); //write variables in text file
            	fclose($fp); //close file
            	die();
		} else {
			//if the password is incorrect
			echo "<script>
                alert('Incorrect Password');
                window.open('index.php', '_self');
            </script>";
		}
	
		} else {
			//if the account is deactivated
			echo "<script>
				 alert('Account Deactivated, Your account has not yet been activated by the sports administrator');
                window.open('index.php', '_self');
			</script>";
		}
	
		} else {
			// if the username is not existing in the database
			echo "<script>
				alert('Invalid username');
				window.open('index.php', '_self')
			</script>";
		}
	mysqli_close($conn); //close connection
}
?>