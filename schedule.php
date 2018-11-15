<!DOCTYPE html>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
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
	</nav><br><br><br>
	<?php include('library/modals/loginModal.php'); 
		  include('library/modals/signUpModal.php');
	?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center">Schedule of Courts</h1>
			<h4>List of Schedules</h4>
		</div>
		<div class="table-responsive">
			<table class="table table-hover" id="tblSchedule">
				<thead class="thead-dark">
					<tr>
						<th>Court Name</th>
						<th>Court Type</th>
						<th>Time</th>
						<th>Date</th>
						<th>Reserved By</th>
						<th>Date of Reservation</th>
					</tr>
				</thead>
				<tbody>
					<?php
						include('connection.php');
						$disp_sched = mysqli_query($conn, "SELECT * FROM reservation INNER JOIN court ON court.CourtID = reservation.CourtID WHERE Status = 'Approved'");

						if (mysqli_num_rows($disp_sched) > 0) {
							while ($sched_row = mysqli_fetch_assoc($disp_sched)) {
								echo "<tr>
									<td>".$sched_row['CourtName']."</td>
									<td>".$sched_row['CourtType']."</td>
									<td>".$sched_row['TimeStart']." - ".$sched_row['TimeEnd']."</td>
									<td>".$sched_row['ReservedDate']."</td>
									<td>".$sched_row['ReserveBy']."</td>
									<td>".$sched_row['DateReserved']."</td>
								</tr>";
							}
						} else {
							echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> No Schedules Found</h3></td></tr>";
						}
					?>
				</tbody>
			</table>
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
</body>
</html>