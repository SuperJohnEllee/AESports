<!DOCTYPE HTML>
<?php
	include('connection.php');
	include('session.php');

    //check courts

    $court_sql = mysqli_query($conn, "SELECT * FROM court");
    $court_row = mysqli_fetch_assoc($court_sql);
?>
<html>
<head>
<?php include('library/html/header.php'); //meta and links ?>
</head>

<body>
	<?php include('library/html/navbar.php'); // include user navbar ?>

<div class="container">
	<div class="page-header">
        <h1>Welcome, <?php echo htmlspecialchars($name); ?></h1>
        <hr>
	   <h2>Instructions</h2>
       <p>Select any sport you wish to play and click it and select a time and date you wish to play</p>
    </div>
	
	<!--<h3>Attention to all players</h3>
	<p>No shows: After 10 minutes your court time is forfeited.</p>--->
   <div class="row">
        <div class="col-lg-4 col-sm-6 text-center mb-4">
			<a style="text-decoration: none;" href="bball.php">
            <img src="image/home/bball.svg" height="200" width="200">
            <h3>Basketball<br></h3></a>
		</div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
			<a style="text-decoration: none;" href="vball.php">
            <img src="image/home/vball.svg" height="200" width="200">
            <h3>Volleyball<br></h3></a>
		</div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
			<a style="text-decoration: none;" href="lawn_tennis.php">
            <img src="image/home/tennis.svg" height="200" width="200">
            <h3>Lawn Tennis<br></h3></a>
		</div>
        <div class="col-lg-4 col-sm-6 text-center mb-4">
            <a style="text-decoration: none;" href="#">
            <img src="image/home/badminton.png" height="200" width="200">
            <h3>Badminton<br></h3></a>
        </div>
    </div>
</div>
 <div style="background-color: #000; padding: 15px 0;" class="text-center text-white">
    <h6 class="col-lg-12">Develop By AE Solutions &copy 2018. All Rights Reserved</h6>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>
</body>
</html>