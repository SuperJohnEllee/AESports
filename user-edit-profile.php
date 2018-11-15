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
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
		<div class="page-header">
			<h1>Edit Profile for account <span class="font-weight-bold text-primary"><?php echo htmlspecialchars($log_ses); ?></span></h1>
		</div>
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">
                    		<input class="form-control" type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">   
                        <div class="form-group col-md-6">
                            <label for="lastname" class="cols-sm-2 control-label">Last Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname" class="cols-sm-2 control-label">First Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="midname" class="cols-sm-2 control-label">Middle Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="midname" id="book_title"  placeholder="Middle Name" value="<?php echo htmlspecialchars($midname); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                    <input class="form-control" type="text" name="username" id="username" value="<?php echo htmlspecialchars($log_ses); ?>">
                            </div>
                        </div>
                        <div class="form-group mx-auto col-md-6">
                            <button class="btn btn-success btn-lg col-md-10"  name="update" id="register">Save Changes</button>
                        </div>
                   </div>
            </form>
	</div>
<!--JS Libraries-->
<script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<?php
	 if (isset($_POST['update'])) {
        
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $midname = mysqli_real_escape_string($conn, $_POST['midname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $id = htmlspecialchars($_POST['id']);

        $sql = "UPDATE accounts SET 
        LastName = '$lastname',
        FirstName = '$firstname',
        MiddleName = '$midname',
        Email = '$email',
        Username = '$username' WHERE ID = '$id' AND Type = 'User'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "<script>
                alert('Update profile successfully');
                </script>
                <meta http-equiv='refresh' content='0; url=user-profile.php?remarks=success'";
        } else {
            echo "<script>
                alert('Error in updating profile');
            </script>";
        }
    }
?>
</body>
</html>