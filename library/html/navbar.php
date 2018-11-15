<?php
	if ($type == "User")  {
	?>
	<nav class="navbar navbar-expand-lg fixed-top top-navbar-collapse" style = "background-color: #000;">
		<a class="navbar-brand" href="user-dashboard.php"><img src="image/icon.jpg" height="30" width="30"></a>
		<button class="navbar-toggler grey darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon text-white "></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class = "navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link text-white" href="admin-dashboard.php"><span class="fa fa-home"></span> Home</a></li>
			</ul>
			<ul class = "navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-bell-o"></span> Notifications</a>
					<div class="dropdown-menu">
						<?php
							$conn = mysqli_connect('localhost', 'root', '', 'court_reservation');

							$admin_sql = mysqli_query($conn, "SELECT * FROM accounts WHERE Type = 'Admin'");
							$admin_row = mysqli_fetch_assoc($admin_sql);

							$reserve_sql = mysqli_query($conn, "SELECT * FROM reservation INNER JOIN court ON reservation.CourtID = court.CourtID WHERE Status = 'Approved' ORDER BY DateReserved DESC");

							if (mysqli_num_rows($reserve_sql) > 0) {
								while ($reserve_row = mysqli_fetch_assoc($reserve_sql)) {
								
									echo "<a class='dropdown-item'>".$admin_row['Type']." approved your court named <span class='font-weight-bold'>".$reserve_row['CourtName']."</span></a>";
								}
							} else {
								echo '<a class="dropdown-item"> You have no notifications </a>';
							}
						?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="user-profile.php?<?php echo $log_ses; ?>"><span class="fa fa-user"></span> <?php echo htmlspecialchars($log_ses); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="logout.php"><span class="fa fa-sign-out"></span> Log Out</a>
				</li>
			</ul>
		</div>
	</nav><br><br><br>
	<?php
	} else if ($type == "Admin") {
		?>
	<nav class="navbar navbar-expand-lg fixed-top top-navbar-collapse" style="background-color: #000;">
		<a class="navbar-brand" href="admin-dashboard.php"><img src="image/icon.jpg" height="30" width="30"></a>
		<button class="navbar-toggler grey darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon text-white "></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class = "navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link text-white" href="admin-dashboard.php"><span class="fa fa-home"></span> Home</a></li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-bell-o"></span> Notifications</a>
					<div class="dropdown-menu">
						<?php
							$conn = mysqli_connect('localhost', 'root', '', 'court_reservation');
							$court_reserve_pend = "SELECT * FROM reservation INNER JOIN court 
							ON reservation.CourtID = court.CourtID 
							WHERE Status = 'Pending' ORDER BY DateReserved DESC";
							
							$court_reserve_pend_res = mysqli_query($conn, $court_reserve_pend);

						if (mysqli_num_rows($court_reserve_pend_res) > 0) {
							while ($court_reserve_row = mysqli_fetch_assoc($court_reserve_pend_res)) {
				
							echo "<a class='dropdown-item'><span class='font-weight-bold'>".$court_reserve_row['ReserveBy']."</span> <br> reserve a court named <span class='font-weight-bold'>".$court_reserve_row['CourtName']."</span> <br> ".$court_reserve_row['DateReserved']."</a>";
							}
					} else {
							echo '<a class="dropdown-item"> You have no notifications </a>';
						}
						?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="admin-profile.php?<?php echo $log_ses; ?>"><span class="fa fa-user"></span> <?php echo htmlspecialchars($log_ses); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="logout.php"><span class="fa fa-sign-out"></span> Log Out</a>
				</li>
			</ul>
		</div>
	</nav><br><br><br>
	<?php } ?>