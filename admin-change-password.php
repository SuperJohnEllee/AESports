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
			<h5>Change Password for <span class="text-warning"><?php echo $log_ses; ?></span></h5>
		</div>
		<div class="row">
			<form class="col-lg-6" method="post">
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="old_pass" id="old_pass">
					<label>Old Password</label>
				</div>
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="new_pass" id="new_pass">
					<label>New Password</label>
				</div>
				<div class="md-form">
					<i class="fa fa-lock prefix"></i>
					<input class="form-control" type="password" name="conf_pass" id="conf_pass">
					<label>Confirm Password</label>
				</div>
				<div class="md-form">
					<button type="submit" class="btn btn-info btn-lg" name="change_pass"><span class="fa fa-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>

<!--JS Libraries-->
<script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/func.js"></script>

<!--PHP Change Passsword here-->
<?php
	if (isset($_POST['change_pass'])) {
		
		$old_pass = mysqli_real_escape_string($conn, $_POST['old_pass']);
		$new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
		$conf_pass = mysqli_real_escape_string($conn, $_POST['conf_pass']);

		$check_pass = mysqli_query($conn, "SELECT * FROM accounts WHERE Type = 'Admin' AND Username = '$log_ses'");
		$check_row = mysqli_fetch_assoc($check_pass);

		if ($check_row['Password'] == $old_pass) {
			
			if ($new_pass == $conf_pass) {

				$change_pass_sql = mysqli_query($conn, "UPDATE accounts SET Password = '$new_pass' WHERE Type = 'Admin' AND Username = '$log_ses'");

				if ($change_pass_sql) {
					echo "<script>
						alert('Passsword changed successfully');
					</script>
					<meta http-equiv='refresh' content='0; url=admin-change-password.php'>";
				} else {
					echo "<script>
						alert('Failure changing password');
					</script>
					<meta http-equiv='refresh' content='0; url=admin-change-password.php'>";
				}

			} else {
				echo "<script>
					alert('Passwords do not match');
				</script>
				<meta http-equiv='refresh' content='0; url=admin-change-password.php'>";
			}
		
		} else {
			echo "<script>
				alert('Old Passwords do not match');
			</script>
			<meta http-equiv='refresh' content='0; url=admin-change-password.php'>";
		}
	}
?>
</body>
</html>