<!DOCTYPE html>
<?php
	//include this two always
	include('connection.php');
	include('session.php');

	//Number of Opened Courts
	$open_court = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtStatus = 'Open' AND CourtType = 'Basketball'");
	$open_court_count = mysqli_num_rows($open_court);

	//Number of Closed Courts
	$close_court = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtStatus = 'Close' AND CourtType = 'Basketball'");
	$close_court_count = mysqli_num_rows($close_court);

	//checl for court status if
	$court_stat = mysqli_query($conn, "SELECT * FROM court");
	$court_status_row = mysqli_fetch_assoc($court_stat);

	$court_reserve = mysqli_query($conn, "SELECT * FROM reservation");
	$court_row = mysqli_fetch_assoc($court_reserve);
			
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
		<div class="page-header">
			<h2>Reserve for Basketball Court</h2>
			<hr>
		</div>
		<h5>Number of Opened Courts: <?php echo $open_court_count; ?><br>
			Number of Closed Courts: <?php echo $close_court_count; ?></h5>
		<div class="row">
			<?php
			//check if court is available or not
			if ($court_status_row['CourtStatus'] == "Open") {

				$disp_court = mysqli_query($conn, "SELECT * FROM court WHERE CourtType = 'Basketball'");
				if (mysqli_num_rows($disp_court) > 0) {
					while ($disp_court_row = mysqli_fetch_assoc($disp_court)) {
					
					if ($disp_court_row['CourtStatus'] == "Open") {
						echo "
						<form method='post'>
						<div class='col-sm'>
							<h5>Court Name: ".$disp_court_row['CourtName']."</h5>
							<h5>Status: ".$disp_court_row['CourtStatus']."</h5>
						</div>
			
			<div class='col-sm'>
				<div class='form-group'>
					<label>Time Start</label>
					<input class='form-control' type='time' name='court_time_start'>
				</div>
			</div>
			<div class='col-sm'>
				<div class='form-group'>
					<label>Time End</label>
					<input class='form-control' type='time' name='court_time_end'>
				</div>
			</div>
			<div class='col-sm'>
				<div class='form-group'>
					<label>Date</label>
					<input class='form-control' type='date' name='court_date'>
				</div>
			</div>
			<div class='col-sm'>
				<div class='form-group pt-3'>
					<button class='btn btn-info' name='btn_reserved' onclick='return confirm('Reserve this court?');'>Reserved this Court</button>
				</div>
			</div>
			</form>";
		} else if ($disp_court_row['CourtStatus'] == "Close") {
			echo "<form method='post'>
					<fieldset disabled>
					<div class='col-sm'>
						<h5>Court Name: ".$disp_court_row['CourtName']."</h5>
						<h5>Status: ".$disp_court_row['CourtStatus']."</h5>
					</div>
			
					<div class='col-sm'>
						<div class='form-group'>
							<label>Time Start</label>
							<input class='form-control' type='time' name='court_time_start'>
						</div>
					</div>
					<div class='col-sm'>
						<div class='form-group'>
							<label>Date</label>
							<input class='form-control' type='date' name='court_date'>
						</div>
					</div>
					<div class='col-sm'>
						<div class='form-group pt-3'>
							<button class='btn btn-info' name='btn_reserved' onclick='return confirm('Reserve this court?');'>Reserved this Court</button>
						</div>
					</div>
					</fieldset>
				</form>";
				} else if ($court_row['Status'] == "Approved") {
						echo "<form method='post'>
					<fieldset disabled>
					<div class='col-sm'>
						<h5>Court Name: ".$disp_court_row['CourtName']."</h5>
						<h5>Status: ".$disp_court_row['CourtStatus']."</h5>
					</div>
			
					<div class='col-sm'>
						<div class='form-group'>
							<label>Time Start</label>
							<input class='form-control' type='time' name='court_time_start'>
						</div>
					</div>
					<div class='col-sm'>
						<div class='form-group'>
							<label>Date</label>
							<input class='form-control' type='date' name='court_date'>
						</div>
					</div>
					<div class='col-sm'>
						<div class='form-group pt-3'>
							<button class='btn btn-info' name='btn_reserved' onclick='return confirm('Reserve this court?');'>Reserved this Court</button>
						</div>
					</div>
					</fieldset>
				</form>";
				}
			}
				} else {
					echo "<h1 class='alert alert-warning mx-auto'><span class='fa fa-info-circle'></span> No Courts Found</h1>";
				}
			} else {
				echo "<h1 class='alert alert-warning mx-auto'><span class='fa fa-info-circle'></span> No Courts Available</h1>";
			}
			?>
		</div>
	</div>
<?php
	//reserve court

	if (isset($_POST['btn_reserved'])) {
		
		$reserve_time_start = mysqli_real_escape_string($conn, $_POST['court_time_start']);
		$reserve_time_end = mysqli_real_escape_string($conn, $_POST['court_time_end']);
		$reserve_date = mysqli_real_escape_string($conn, $_POST['court_date']);

		$check_time_date = "SELECT * FROM reservation 
		WHERE TimeStart = '$reserve_time_start' AND TimeEnd = '$reserve_time_end' OR ReservedDate = '$reserve_date'";
		$check_time_date_res = mysqli_query($conn, $check_time_date);

		$courtname = mysqli_query($conn,"SELECT * FROM court WHERE CourtID");
		$court_row = mysqli_fetch_assoc($courtname);
		$court_row_id = $court_row['CourtID'];
		$court_row_name = $court_row['CourtName'];
		$court_row_type = $court_row['CourtType'];

		$name = $firstname . ' ' . $lastname; 

		if (mysqli_num_rows($check_time_date_res) > 0) {
			
			echo "<script>
				alert('You already reserved this court');
				window.open('bball.php', '_self');
			</script>";
		} else {
			$reserve_sql = "INSERT INTO reservation(CourtID, ID, Status, TimeStart, TimeEnd, ReservedDate, ReserveBy, DateReserved)
			VALUES('$court_row_id', '$id', 'Pending', '$reserve_time_start', '$reserve_time_end', 
			'$reserve_date', '$name', NOW())";
			$reserve_res = mysqli_query($conn, $reserve_sql);

			if ($reserve_res) {
				echo "<script>
					alert('Sucessfully reserve a court');
				</script>
				<meta http-equiv='refresh' content='0; url=bball.php'>";
			} else {
				echo "<script>
					alert('Failure to reserve a court');
				</script>";
			}
		}
	}
?>
<!--JavaScript Libraries-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>
</body>
</html>