<?php
	/*
		Register Form 
		insert user information
	*/
	session_start(); //starts session
	include ('connection.php'); //include connection as always
	date_default_timezone_set('Asia/Manila'); //set timezone

	if (isset($_POST['register'])) //set the button name variable
	{
		//define user information variables
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']); //escapes special characters in a string for use in a SQL Statement, specifies the MySQL connection
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$midname = mysqli_real_escape_string($conn, $_POST['midname']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$confirm_password = htmlspecialchars($_POST['confirm_password']); //converts special or predefined characters to HTML entities

		//check email and user if someone is existing
		$check_email = mysqli_query($conn, "SELECT * FROM accounts WHERE Email = '$email'");
		$check_user = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$username'");
		$count_email = mysqli_num_rows($check_email);
		$count_user = mysqli_num_rows($check_user);

		if ($count_email > 0) {
		
			echo "<script>
				alert('Email is already existing');
			</script>";			
		
		} elseif ($count_user > 0) {
			
			echo "<script>
				alert('Username is already existing');
			</script>";

		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
			//validate email if correct
			echo "<script>
				alert('Email is invalid');
			</script>";
		}
		 elseif ($password != $confirm_password) {

			echo "<script>
				alert('Password do not match');
			</script>";
			exit();
		}  
		else {
			//insert query
			$reg_sql = "INSERT INTO accounts (LastName, FirstName, MiddleName, Gender, Birthdate, Type, Status, Email, Username, Password)
			VALUES ('$lastname', '$firstname', '$midname', '$gender', '$bdate', 'User', 'Active', '$email', '$username', '$password')";
			$reg_res = mysqli_query($conn, $reg_sql);

			if ($reg_res) {
				
				echo "<script>
					alert('Successfully registered, Thank you for registration');
                	window.open('index.php?remarks=success', '_self');
				</script>";
				//User Register Logs --> Text File
				 $filename = "system/user_register.txt";
                 $fp = fopen($filename, 'a+');
                 fwrite($fp, " " . $lastname. " | " . $firstname. " | " . $midname . " | " . $email . " | " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
                 fclose($fp);
                 die();

			} else {
				//User Register Error Logs --> Text File
				echo "<script>
                	alert('Error in registration');
                	window.open('index.php, '_self');
            	</script>";
				 $filename = "system/user_register_error.txt";
                 $fp = fopen($filename, 'a+');
                 fwrite($fp, " " . $lastname. " | " . $firstname. " | " . $midname . " | " . $email . " | " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
                 fclose($fp);
                 die();
			}
		}

		mysqli_close($conn);
	}
?>