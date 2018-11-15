<!DOCTYPE html>
<?php
	include('connection.php');
	include('session.php');
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	 <div class="container">
    	<div class="page-header">
    		<h3>User Profile</h3>
    	</div><br>
    	<div class="col-md-9">
    		<div class="form-group">
    			<?php
    				if ($gender == "Female") {
    			?>
    			<img style="border-radius: 50%;" src="image/img_avatar.png" height="200" width="200">
    			<?php } else if ($gender == "Male") {
    			 ?>
    			 <img src="image/img_avatar_2.png" height="200" width="200">
    			 <?php } ?> 
    		</div>
    	</div>
		<div class="col-md-9">
			<hr class="theo-footer-hr">
			<div class="form-group">
				<h4>Username:&nbsp;<?php echo htmlspecialchars($log_ses); ?></h4>
			</div>
			<div class="form-group">
				<h4>Name:&nbsp;<?php echo htmlspecialchars($fullname); ?></h4>
			</div>
			<div class="form-group">
				<h4>Gender: <?php echo htmlspecialchars($gender); ?></h4>
			</div>
			<div class="form-group">
				<h4>Type:&nbsp;<?php echo htmlspecialchars($type); ?></h4>
			</div>
			<div class="form-group">
				<h4>Email:&nbsp;<?php echo htmlspecialchars($email); ?></h4>
			</div>
			<div class="form-group">
				<h4>Birthday: <?php echo htmlspecialchars($bdate); ?></h4>
			</div>
			<div class="row">
				<div class="form-group">
					<a class="btn btn-lg btn-primary" href="user-edit-profile.php?edit=<?php echo $id; ?>"><span class="fa fa-edit"></span> Edit Profile</a>
				</div>
				<div class="form-group">
					<a href="user-change-password.php?<?php echo htmlspecialchars($log_ses); ?>" class="btn btn-lg btn-dark"><span class="fa fa-lock"></span> Change Password</a> 
				</div>
			</div>
		</div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>
</body>
</html>