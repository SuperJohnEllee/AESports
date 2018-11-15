<!DOCTYPE HTML>
<?php
	include('connection.php');

	$contact_sql = "SELECT * FROM contact_us";
	$contact_res = mysqli_query($conn, $contact_sql);
	$contact_row = mysqli_fetch_assoc($contact_res);
?>
<html>
<head>
<meta charset="utf-8">
<meta name="author" content="AE Sports">
<meta name="description" content="Online Court Reservation">
<meta http-equiv="Content-Type" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AE Sports</title>
<link rel="stylesheet" href="css/design.css">
<link rel="stylesheet"  href="css/bootstrap.min.css" />
<link rel="stylesheet"  href="css/bootstrap.css" />
<link rel="stylesheet" href="css/mdb.min.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="icon" href="image/icon.jpg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-expand-lg fixed-top top-navbar-collapse">
		<a class="navbar-brand" href="#"><img src="image/icon.jpg" height="30" width="30"></a>
		  <button class="navbar-toggler grey darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon text-white "></span>
		  </button>
       <div class="collapse navbar-collapse" id="navbar">
			<ul class = "navbar-nav mr-auto">
				<li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><span class="fa fa-home"></span> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="schedule.php"><span class="fa fa-calendar"></span> Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="news.php"><span class="fa fa-newspaper-o"></span> News</a>
                </li>
			</ul>
			<ul class = "navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link text-white" data-toggle="modal" data-target="#signModalForm"><span class="fa fa-user"></span> Registration</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" data-toggle="modal" data-target="#logModalForm"><span class="fa fa-sign-in"></span> Log In</a>
				</li>
			</ul>
		</div>
	</nav>
	<?php include('library/modals/signupModal.php'); 
        include('library/modals/loginModal.php');?>
	<!--parallax and carousel-->
  <?php include('library/html/carousel.php'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-6">
                <h1 class="black-text my-5"><span class="font-weight-bold">AE Sports</span><span class="blue-text"> Court Reservation</span></h1>
                <h6 class="text-center text-dark" align="justify">Our Online Court Reservation allows players or clients to make online reservations at 3 sites for each sports throughout Iloilo City. 
				Online reservations cost Php per court, per hour.</h6>
            </div>
        </div>
    </div>
    <?php include('library/html/steps.php'); // reservation steps ?>
	<br/>
<?php include('library/html/footer.php'); // footer ?>

<!--JS Libraries-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript" src="js/map.js"></script>
<script>
  $('.datepicker').pickadate();
</script>
</body>
</html>