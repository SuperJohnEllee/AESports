<!DOCTYPE html>
<?php
	include('session.php');
	include('connection.php');

	$edit_news = $_GET['edit_news'];
	$edit_news_sql = "SELECT * FROM news WHERE NewsID = '$edit_news'";
	$edit_news_res = mysqli_query($conn, $edit_news_sql);
	$edit_news_row = mysqli_fetch_assoc($edit_news_res);
?>
<html>
<head>
	<?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
		<div class="page-header">
			<h1 class="text-center"><span class="fa fa-edit"></span> Edit News</h1>
			<hr>
		</div>
		<div class="col-md-6">
			<form method="post">
					<div class="md-form mb-5">
						<input type="hidden" name="news_id" value="<?php echo $edit_news_row['NewsID']; ?>">
					</div>
                    <div class="md-form mb-5">
                        <i class="fa fa-header text-dark prefix"></i>
                        <input type="text" name="news_title" id="news_title" class="form-control" value="<?php echo $edit_news_row['Title'] ?>">
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-pencil ext-dark prefix"></i>
                       	<textarea class="form-control md-textarea" name="news_content" id="news_content" maxlength="1000" rows="7" style="resize: none; margin-bottom: 8px;" autofocus><?php echo $edit_news_row['Content'] ?></textarea>
						<br/>
                        <span>Edited by <span class="font-weight-bold"><?php echo $name; ?></span></span>
                        <button type="submit" class="btn btn-default pull-right" name="update_news" data-loading-text="Logging in.."><span class="fa fa-save"></span> Update News</button>
                    </div>
                </form>
		</div>
	</div>
	<?php
		if (isset($_POST['update_news'])) {
			
			//define variables
			$news_title = mysqli_real_escape_string($conn, $_POST['news_title']);
			$news_content = mysqli_real_escape_string($conn, $_POST['news_content']);
			$news_id = htmlspecialchars($_POST['news_id']);

			//query start
			$update_news_sql = "UPDATE news SET Title = '$news_title', Content = '$news_content', 
			PostedBy = '$name', DatePosted = NOW() WHERE NewsID = '$news_id'";
			$update_news_res = mysqli_query($conn, $update_news_sql);

			//check if success or fail
			if ($update_news_res) {
				echo "<script>
					alert('Successfully updated news');
				</script>
				<meta http-equiv='refresh' content='0; url=admin-edit-news.php'>";
			} else {
				echo "<script>
					alert('Failure in updating news');
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