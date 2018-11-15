<!DOCTYPE html>
<?php
	include('session.php');
	include('connection.php');
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center"><span class="fa fa-lock"></span> Change Password</h1>
			<h3>Change Password for <span class="text text-danger"><?php echo $log_ses; ?></span></h3>
		</div>
		<div class="row">
			<form class="col-lg-6" method="post">
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="old_pass" required>
					<label>Old Password</label>
				</div>	
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="new_pass" required>
					<label>New Password</label>
				</div>
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="confirm_pass" required>
					<label>Confirm Password</label>
				</div>
				<div class="md-form">
					<button type="submit" class="btn btn-primary" name="change_pass"><span class="fa fa-save"></span> Save Changes</button>
				</div>
			</form>
		</div>
	</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>
<?php
	if (isset($_POST['change_pass'])) {
		
		//define password variables
		$old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
		$confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

		$check_pass = mysqli_query($conn, "SELECT * FROM accounts WHERE Type = 'User' AND Username = '$log_ses'");
		$check_pass_row = mysqli_fetch_assoc($check_pass);

		//check if old password is match
		if ($check_pass_row['Password'] == $old_pass) {
			
			//check if new pass and confirm pass is match
			if ($new_pass == $confirm_pass) {
				
				//query for change password
				$change_pass_sql = mysqli_query($conn, "UPDATE accounts SET Password = '$new_pass' WHERE Type = 'User' AND Username = '$log_ses'");
				//check for errors
				if ($change_pass_sql) {
					echo "<script>
						alert('Password changed successfully');
					</script>
					<meta htpp-equiv='refresh' content='0; url=user-change-password.php'>";
				} else {
					echo "<script>
						alert('Failure in changing password');
					</script>
					<meta htpp-equiv='refresh' content='0; url=user-change-password.php'>";

				}
			} else {
				echo "<script>
					alert('Passwords do not match');
				</script>
				<meta htpp-equiv='refresh' content='0; url=user-change-password.php'>";
			}
		} else {
			echo "<script>
				alert('Old Passwords do not match');
			</script>
			<meta htpp-equiv='refresh' content='0; url=user-change-password.php'>";
		}
	}
?>
</body>
</html>