<!DOCTYPE html>
<?php
	include('connection.php');

	//count no of active news in 36 hours
	$news_sql = mysqli_query($conn, "SELECT NewsID FROM news WHERE DatePosted >= CURRENT_DATE() - INTERVAL 36 DAY_HOUR AND Status = 'Active'");
	$news_count = mysqli_num_rows($news_sql);
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php 
		include('library/modals/signupModal.php');
		include('library/modals/loginModal.php');
	?>
	<nav class="navbar navbar-default navbar-expand-lg fixed-top" style="background-color: #000;">
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
	<div class="jumbotron text-center">
		<h1>AE Sports News</h1>
		<h6>We have <?php echo $news_count; ?> news posted here</h6>
		<hr>
		<?php
			//Displays news
			//query start, news is active for only 36 Hours
			$disp_news = mysqli_query($conn, "SELECT * FROM news 
				WHERE DatePosted >= CURRENT_DATE() - INTERVAL 36 DAY_HOUR AND Status = 'Active' ORDER BY DatePosted DESC");
			if (mysqli_num_rows($disp_news) > 0) {
				while ($disp_row = mysqli_fetch_assoc($disp_news)) {
				
				//display
				echo "<div class='card-body'>
					<h1 class='card-title'>".$disp_row['Title']."</h1>
					<p>Posted by <span class='font-weight-bold'>".$disp_row['PostedBy']."</span> on <span class='font-weight-bold'>".$disp_row['DatePosted']."</span></p>
					<h4 class='card-text'>".$disp_row['Content']."</h4>
					<hr>
				</div>";

				}
				//if no news posted
			} else {
				echo "<div class='card-body'>
					<h1 class='card-title'>No news posted today</h1>
					<h4 class='card-text'>Please wait for the incoming news</h4>
					<hr>
				</div>";

			}
		?>
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