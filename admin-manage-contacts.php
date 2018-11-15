<!DOCTYPE html>
<?php
	include('connection.php');
	include('session.php');

	$contact_sql = "SELECT * FROM contact_us";
	$contact_res = mysqli_query($conn, $contact_sql);
	$contact_row = mysqli_fetch_assoc($contact_res);
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center"><span class="fa fa-address-book"></span> Manage Contacts</h1>
			<hr>
		</div>
		<div class="row">
			<form class="col-md-6" method="post">
				<div class="md-form mb-4">
					<input type="hidden" name="contact_id" value="<?php echo $contact_row['contact_usID']; ?>">
				</div>
				<div class="md-form mb-4">
					<i class="fa fa-map-marker prefix text-dark"></i>
					<input class="form-control" type="text" name="address" value="<?php echo $contact_row['Address']; ?>">
				</div>
				<div class="md-form mb-4">
					<i class="fa fa-envelope prefix text-dark"></i>
					<input class="form-control" type="email" name="email" value="<?php echo $contact_row['ContactEmail'] ?>">
				</div>
				<div class="md-form mb-4">
					<i class="fa fa-phone prefix text-dark"></i>
					<input class="form-control" type="text" name="contact_number" value="<?php echo $contact_row['ContactNumber'] ?>">
				</div>
				<div class="md-form mb-4">
					<i class="fa fa-calendar text-dark prefix"></i>
					<input class="form-control" type="text" name="schedule" value="<?php echo $contact_row['Schedule'] ?>">
				</div>
				<div class="md-form">
					<button class="btn btn-primary" type="submit" name="save"><span class="fa fa-save"></span> Save Changes</button>
				</div>
			</form>
		</div>
	</div>
<?php
	
	if (isset($_POST['save'])) {
		
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
		$schedule = mysqli_real_escape_string($conn, $_POST['schedule']);

		$contact_id = htmlspecialchars($_POST['contact_id']);

		$contact_update_sql = "UPDATE contact_us SET Address = '$address', 
		ContactNumber = '$email', ContactNumber = '$contact_number', Schedule = '$schedule' WHERE contact_usID = '$contact_id'";
		$contact_update_res = mysqli_query($conn, $contact_update_sql);

		if ($contact_update_res) {
			
			echo "<script>
				alert('Update contact sucessfully');
			</script>
			<meta http-equiv='refresh' content='0; url=admin-manage-contacts.php'>";
		} else {

			echo "<script>
				alert('Failure in updating contacts');
			</script>";
		}
	}
?>
<!--JS Libraries-->
<script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>