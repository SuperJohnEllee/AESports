<?php
	
	//All actions are here
	//Hide and Show, Approved and Reject, Active and Inactive, Close and Open and Delete
	include('connection.php');
	include('session.php');


	//Activate and Inactivate Users
	if (isset($_GET['user_act'])) {
		//set the url name by using GET method and to check whether a variable is numeric or not

		$user_act = htmlspecialchars($_GET['user_act']); //define the url name
		$user_act_sql = "UPDATE accounts SET Status = 'Active' WHERE ID = '$user_act'"; //update query
		$user_act_res = mysqli_query($conn, $user_act_sql); //result
		echo "<script>
			alert('Activate a user');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-user-accounts.php'>";
	
	} else if(isset($_GET['user_deact'])){ 

		$user_deact = htmlspecialchars($_GET['user_deact']);
		$user_deact_sql = "UPDATE accounts SET Status = 'Inactive' WHERE ID = '$user_deact'";
		$user_deact_res = mysqli_query($conn, $user_deact_sql);
		
		echo "<script>
			alert('Dectivate an user');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-user-accounts.php'>";
	}

	//Activate and Deactivate Admin
	if (isset($_GET['admin_act'])) {
			
		$admin_act = htmlspecialchars($_GET['admin_act']);
		$admin_act_sql = "UPDATE accounts SET Status = 'Active' WHERE ID = '$admin_act'"; 
		$admin_act_res = mysqli_query($conn, $admin_act_sql);

		echo "<script>
			alert('Activate an admin');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-admin-accounts.php'>";
	
	} else if (isset($_GET['admin_deact'])) {
	
		$admin_deact = htmlspecialchars($_GET['admin_deact']);
		$admin_deact_sql = "UPDATE accounts SET Status = 'Inactive' WHERE ID = '$admin_deact'"; 
		$admin_deact_res = mysqli_query($conn, $admin_deact_sql);

		echo "<script>
			alert('Deactivate an admin');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-admin-accounts.php'>";
	}	

	//Hide and Show News
	if (isset($_GET['show'])) {
		
		$show_news = htmlspecialchars($_GET['show']); //get url name in href ex.. actions.php?show
		
		//query start
		$show_news_sql = "UPDATE news SET Status = 'Active', 
		PostedBy = '$name', DatePosted = NOW() WHERE NewsID = '$show_news'";
		$show_news_res = mysqli_query($conn, $show_news_sql);

		echo "<script>
			alert('Successfully showed a news');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
	
	} else if (isset($_GET['hide'])) {
		
		$hide_news = htmlspecialchars($_GET['hide']);
		$hide_news_sql = "UPDATE news SET Status = 'Inactive' WHERE NewsID = '$hide_news'";
		$hide_news_res = mysqli_query($conn, $hide_news_sql);

		echo "<script>
			alert('Successfully hide a news');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
	}
	
	//Close and Open Court
	if (isset($_GET['open'])) {
		
		$open_court = htmlspecialchars($_GET['open']);
		$open_sql = "UPDATE court SET CourtStatus = 'Open' WHERE CourtID = '$open_court'";
		$open_res = mysqli_query($conn, $open_sql);
		echo "<script>
			alert('Successfully opened a court');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-courts.php'>";
	
	} else if (isset($_GET['close'])) {
		
		$close_court = htmlspecialchars($_GET['close']);
		$close_sql = "UPDATE court SET CourtStatus = 'Close' WHERE CourtID = '$close_court'";
		$close_res = mysqli_query($conn, $close_sql);

		echo "<script>
			alert('Successfully closed a court');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-courts.php'>";
	}

	//approved and rejected reserve court
	if (isset($_GET['approved'])) {
		
		$approved_court = htmlspecialchars($_GET['approved']);
		$approved_court_sql = "UPDATE reservation SET Status = 'Approved' WHERE reservationID = '$approved_court'";
		$approved_court_res = mysqli_query($conn, $approved_court_sql);

		echo "<script>
			alert('Successfully approved a reservation');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-reservations.php'>";
	
	} else if (isset($_GET['rejected'])) {
		
		$rejected_court = htmlspecialchars($_GET['rejected']);
		$rejected_court_sql = "UPDATE reservation SET Status = 'Rejected' WHERE reservationID = '$rejected_court'";
		$rejected_court_res = mysqli_query($conn, $rejected_court_sql);

		echo "<script>
			alert('Successfully rejected a reservation');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-reservations.php'>";
	}

	//delete button

		if (isset($_GET['del_admin'])) {

		$admin_del = htmlspecialchars($_GET['del_admin']);
		$admin_del_sql = mysqli_query($conn,"DELETE FROM accounts WHERE ID = '$admin_del'");

		echo "<script>
			alert('Successfully deleted an admin');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-admin-accounts.php'>";

	} else if (isset($_GET['del_court'])) {
		
		$del_court = htmlspecialchars($_GET['del_court']);
		$del_court_sql = mysqli_query($conn, "DELETE FROM court WHERE CourtID = '$del_court'");

		echo "<script>
			alert('Successfully deleted a court');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-courts.php'>";
	
	} else if (isset($_GET['del_news'])) {
		
		$del_news = htmlspecialchars($_GET['del_news']);
		$del_news_sql = mysqli_query($conn, "DELETE FROM news WHERE NewsID = '$del_news'");

		echo "<script>
			alert('Successfully deleted a news');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
	
	} else if (isset($_GET['del_reserve'])) {
		
		$del_reserve = htmlspecialchars($_GET['del_reserve']);
		$del_reserve_sql = mysqli_query($conn, "DELETE FROM reservation WHERE reservationID = '$del_reserve'");

		echo "<script>
			alert('Successfully deleted a reserve court');
		</script>
		<meta http-equiv='refresh' content='0; url=admin-manage-reservations.php'>";
	}

?>