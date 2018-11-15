<?php
	//functions
	

	/*Notifications*/

	//User reserves a court and notifies admin
	function userPendingReserve(){

		include('connection.php');

		$user_sql = mysqli_query($conn, "SELECT * FROM accounts WHERE Type = 'User'");
		$user_row = mysqli_fetch_assoc($user_sql);

		$court_reserve_pend = mysqli_query($conn, "SELECT * FROM reservation 
			WHERE ReserveStatus = 'Pending' ORDER BY Date_Of_Reservation DESC");

		if (mysqli_num_rows($court_reserve_pend) > 0) {
			while ($court_reserve_row = mysqli_fetch_assoc($court_reserve_pend)) {
				
				echo "<a class='dropdown-item'>".$court_reserve_row['ReserveName']." <br> reserve a court named ".$court_reserve_row['ReserveCourtName']." <br> ".$court_reserve_row['Date_Of_Reservation']."</a>";
			}
		} else {
			echo '<a class="dropdown-item"> You have no notifications </a>';
		}
	}

	/*End of Notifications*/
?>