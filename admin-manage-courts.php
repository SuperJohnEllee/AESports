<!DOCTYPE html>
<?php
	include('connection.php'); //connection
	include('session.php'); //session
?>
<html>
<?php include('library/html/header.php'); //meta tags and css links ?>
<body>
	<?php include('library/html/navbar2.php'); //navbar for admin
		  include('library/modals/addCourtModal.php'); // Add Court Modal
	?>
	<?php
		//count bball courts
		$bball_sql = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtType = 'Basketball'");
		$bball_count = mysqli_num_rows($bball_sql);

		//count vball courts
		$vball_sql = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtType = 'Volleyball'");
		$vball_count = mysqli_num_rows($vball_sql);

		//count lawn tennis
		$lawnTennis_sql = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtType = 'Lawn Tennis'");
		$lawnTennis_count = mysqli_num_rows($lawnTennis_sql);
		
		//count badminton court
		$badminton_sql = mysqli_query($conn, "SELECT CourtID FROM court WHERE CourtType = 'Badminton'");
		$badminton_count = mysqli_num_rows($badminton_sql);
	?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center"><span class="fa fa-gears"></span> Manage Courts</h1>
			<h5>List of Court <br>
			<hr>
			Basketball Court: <?php echo $bball_count; ?> <br>
			Volleyball Court: <?php echo $vball_count; ?>  <br>
			Lawn Tennis: <?php echo $lawnTennis_count; ?> <br>
		    Badminton: <?php echo $badminton_count; ?> </h5>
			<a class="btn btn-info" data-toggle="modal" data-target="#addCourtModal"><span class="fa fa-plus"></span> Add Court</a>
		</div>
		<br>
       	<div class="table-responsive">
			<table class="table table-hover text-dark">
				<thead class="thead-dark">
					<tr>
						<th>Court ID</th>
						<th>Court Name</th>
						<th>Court Type</th>
						<th>Court Status</th>
						<th colspan="3" class="text-center">Action</th>
					</tr>		
				</thead>
				<tbody>
					<?php
						$disp_court = "SELECT * FROM court";
						$disp_court_res = mysqli_query($conn, $disp_court);

						if (mysqli_num_rows($disp_court_res) > 0) {
							while ($disp_court_row = mysqli_fetch_assoc($disp_court_res)) {
								echo "<tr>
									<td>".$disp_court_row['CourtID']."</td>
									<td>".$disp_court_row['CourtName']."</td>
									<td>".$disp_court_row['CourtType']."</td>
									<td>".$disp_court_row['CourtStatus']."</td>
									<div class='row'>
									<td><a class='btn btn-primary' href='actions.php?open=".$disp_court_row['CourtID']."'><span class='fa fa-folder-open'></span> Open</a></td>
									<td><a class='btn btn-warning' href='actions.php?close=".$disp_court_row['CourtID']."'><span class='fa fa-close'></span> Close</a></td>
									<td><a class='btn btn-danger' href='actions.php?del_court=".$disp_court_row['CourtID']."'><span class='fa fa-trash'></span> Delete</a></td>
									</div>
								</tr>";
							}
						} else {
							echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> No Courts Found</h3></td></tr>";
						}
					?>
				</tbody>
			</table>
   	</div>
	</div>
<?php
	//add court
	if (isset($_POST['add_court'])) {
		
		//define court name
		$court_name = mysqli_real_escape_string($conn, $_POST['court_name']);
		$court_type = mysqli_real_escape_string($conn, $_POST['court_type']);

		//check for same court and prevent in duplication
		$check_court = mysqli_query($conn, "SELECT * FROM court WHERE CourtName = '$court_name'");
		
		if (mysqli_num_rows($check_court) > 0) {
			
			echo "<script>
				alert('You already added this court');
				window.open('admin-manage-courts.php', '_self');
			</script>";
		
		} else {

			//query start
			$insert_court = "INSERT INTO court(CourtName, CourtType, CourtStatus) VALUES('$court_name', '$court_type', 'Open')";
			$insert_court_res = mysqli_query($conn, $insert_court);

			if ($insert_court_res) {
				echo "<script>
					alert('Sucessfully added a court');
				</script>
				<meta http-equiv='refresh' content='0; url=admin-manage-courts.php'>";
			} else {
				echo "<script>
					alert('Failure in adding a court');
				</script>
				<meta http-equiv='refresh' content='0; url=admin-manage-courts.php'>";
			}
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