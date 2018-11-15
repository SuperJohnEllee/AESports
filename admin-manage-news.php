<!DOCTYPE html>
<?php
	include('connection.php');
	include('session.php');
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); 
		  include('library/modals/newsModal.php');
	?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center"><span class="fa fa-newspaper-o"></span> Manage News</h1>
			<a class="btn btn-info" data-toggle="modal" data-target="#newsModal"><span class="fa fa-plus"></span> Add News</a>
		</div>
		<br>
		 <ul class="nav nav-tabs md-tabs nav-justified mdb-color darken-4">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#activeNews"><span class="fa fa-eye"></span> Active News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#inactiveNews" role="tab"><span class="fa fa-eye-slash"></span> Inactive News </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#allNews" role="tab"><span class="fa fa-newspaper-o"></span> All News</a>
            </li>
        </ul>
        <div class="tab-content card">
        	<div class="tab-pane fade in show active" id="activeNews" role="tabpanel">
        		<h3 class="text-center">Active News</h3>
			<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>News ID</th>
						<th>Title</th>
						<th>Content</th>
						<th>Status</th>
						<th>Posted By</th>
						<th>Date Posted</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$active_news = "SELECT * FROM news WHERE DatePosted >= CURRENT_DATE() - INTERVAL 36 DAY_HOUR AND Status = 'Active' ORDER BY DatePosted DESC";
						$active_news_res = mysqli_query($conn, $active_news);

						if (mysqli_num_rows($active_news_res) > 0) {
							while ($active_news_row = mysqli_fetch_assoc($active_news_res)) {
								
								echo "<tr>
									<td>".$active_news_row['NewsID']."</td>
									<td>".$active_news_row['Title']."</td>
									<td>".$active_news_row['Content']."</td>
									<td>".$active_news_row['Status']."</td>
									<td>".$active_news_row['PostedBy']."</td>
									<td>".$active_news_row['DatePosted']."</td>
									<td><a class='btn btn-info' href='actions.php?hide=".$active_news_row['NewsID']."'><span class='fa fa-eye-slash'></span> Hide</a></td>
								</tr>";
							}
						} else {
							echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> No News Found</h3></td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
        	</div>
        	<div class="tab-pane fade" id="inactiveNews" role="tabpanel">
        		<h3 class="text-center">Inactive News</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th>News ID</th>
						<th>Title</th>
						<th>Content</th>
						<th>Status</th>
						<th>Posted By</th>
						<th>Date Posted</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$inactive_news = "SELECT * FROM news WHERE Status = 'Inactive' ORDER BY DatePosted";
						$inactive_news_res = mysqli_query($conn, $inactive_news);

						if (mysqli_num_rows($inactive_news_res) > 0) {
							while ($inactive_news_row = mysqli_fetch_assoc($inactive_news_res)) {
								
								echo "<tr>
									<td>".$inactive_news_row['NewsID']."</td>
									<td>".$inactive_news_row['Title']."</td>
									<td>".$inactive_news_row['Content']."</td>
									<td>".$inactive_news_row['Status']."</td>
									<td>".$inactive_news_row['PostedBy']."</td>
									<td>".$inactive_news_row['DatePosted']."</td>
									<td><a class='btn btn-info' href='actions.php?show=".$inactive_news_row['NewsID']."'><span class='fa fa-eye'></span> Show</a></td>
								</tr>";
							}
						} else {
							echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> No News Found</h3></td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
      </div>
        	<div class="tab-pane fade" id="allNews" role="tabpanel">
        		<h3 class="text-center">All News</h3>
        		<div class="table-responsive">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
							<th>News ID</th>
							<th>Title</th>
							<th>Content</th>
							<th>Status</th>
							<th>Posted By</th>
							<th>Date Posted</th>
							<th colspan="3" class="text-center">Action</th>
						</tr>
					</thead>
				<tbody>
					<?php
						$all_news = "SELECT * FROM news ORDER BY DatePosted DESC";
						$all_news_res = mysqli_query($conn, $all_news);

						if (mysqli_num_rows($all_news_res) > 0) {
							while ($all_news_row = mysqli_fetch_assoc($all_news_res)) {
								
								echo "<tr>
									<td>".$all_news_row['NewsID']."</td>
									<td>".$all_news_row['Title']."</td>
									<td>".$all_news_row['Content']."</td>
									<td>".$all_news_row['Status']."</td>
									<td>".$all_news_row['PostedBy']."</td>
									<td>".$all_news_row['DatePosted']."</td>
									<td><a class='btn btn-info' href='actions.php?show=".$all_news_row['NewsID']."'><span class='fa fa-eye'></span> Show</a></td>
									<td><a class='btn btn-primary' href='admin-edit-news.php?edit_news=".$all_news_row['NewsID']."'><span class='fa fa-edit'></span> Edit</a></td>
									<td><a class='btn btn-danger' href='action.php?del_news=".$all_news_row['NewsID']."'><span class='fa fa-trash'></span> Delete</a></td>
								</tr>";
							}
						} else {
							echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> No News Found</h3></td></tr>";
						}
					?>
				</tbody>
			</table>
			</div>
        </div>
       </div>
	</div>

<?php
	//post news

	if (isset($_POST['post_news'])) {

		//define news variable
		$news_title = mysqli_real_escape_string($conn, $_POST['news_title']);
		$news_content = mysqli_real_escape_string($conn, $_POST['news_content']);

		$news_sql = "INSERT INTO news(Title, Content, Status, PostedBy, DatePosted)
			VALUES('$news_title', '$news_content', 'Active', '$name', NOW())";
			$news_res = mysqli_query($conn, $news_sql);

			if ($news_res) {
				echo "<script>
					alert('Successfully posted a news');
				</script>
				<meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
			} else {
					echo "<script>
				alert('Failure in posting news');
				window.open('admin-manage-news.php', '_self');
			</script>";
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