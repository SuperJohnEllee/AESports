<!DOCTYPE html>
<?php 
include('connection.php'); 
include('session.php');
//users
$user_sql = mysqli_query($conn,"SELECT * FROM accounts WHERE Type = 'User'");
$user_count = mysqli_num_rows($user_sql);

//admins
$admin_sql = mysqli_query($conn, "SELECT * FROM accounts WHERE Type = 'Admin'");
$admin_count = mysqli_num_rows($admin_sql);

//courts
$court_sql = mysqli_query($conn, "SELECT * FROM court");
$court_count = mysqli_num_rows($court_sql);

//news
$news_sql = mysqli_query($conn, "SELECT NewsID FROM news");
$news_count = mysqli_num_rows($news_sql);
?>
<html>
<head>
<?php include('library/html/header.php'); //meta and links  ?>
</head>
<body>
	<?php include('library/html/navbar.php'); //navbar ?>
	<div class="container">
		<div class="page-header">
			<h1>Hello, <?php echo htmlspecialchars($name); ?></h1>
			<h5>You are logged in as <span class="font-weight-bold"><?php echo htmlspecialchars($type); ?></span></h5>
			<hr>
		</div>
		<div class="row">
            <div class="col-lg-12">
                <h1 class="my-4 text-center">Administration</h1>
            </div>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-user-accounts.php">
                <img src="image/users.png" height="200" width="200">
                <h3>Manage User Accounts<br><?php echo htmlspecialchars($user_count); ?></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-admin-accounts.php">
                <img src="image/admin.png" height="200" width="200">
                <h3>Manage Admins<br><?php echo htmlspecialchars($admin_count); ?></h3></a>
			</div>    
			<div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-reservations.php">
                <img src="image/reserve.png" height="200" width="200">
                <h3>Manage Reservation<br></h3></a>
			</div>
			<div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-courts.php">
				<img src="image/home/court.svg" height="200" width="200">
				<h3>Manage Courts<br><?php echo htmlspecialchars($court_count); ?></h3></a>
			</div>
			<div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-news.php">
				<img src="image/news.png" height="200" width="200">
				<h3>Manage News<br><?php echo htmlspecialchars($news_count); ?></h3></a>
			</div>
			<div class="col-lg-4 col-sm-6 text-center mb-4">
				<a style="text-decoration: none;" href="admin-manage-contacts.php">
				<img src="image/home/manage-contact.svg" height="200" width="200">
				<h3>Manage Contacts</h3></a>
			</div>
		</div>
	</div>

 <div style="background-color: #000; padding: 15px 0;" class="text-center text-white">
    <h6 class="col-lg-12">Develop By AE Solutions &copy 2018. All Rights Reserved</h6>
</div>
<!--JS Libraries-->
<script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/func.js"></script>
</body>
</html>