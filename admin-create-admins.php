<!DOCTYPE html>
<?php

    /*
        Create Admin Page - creates an another administrator, staff or work student

    */
	include ('session.php');
	include ('connection.php');
?>
<html>
<head>
    <?php include('library/html/header.php'); ?>
</head>
<body>
	<?php include('library/html/navbar2.php'); ?>
	<div class="container">
        <div class="row main">
            <div class="text-dark ml-5">
                <h1 class="text-center">Create Administrator</h1>
                <br>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="lastname" class="cols-sm-2 control-label"><span class="sr-only">Last Name</span></label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname" class="cols-sm-2 control-label"><span class="sr-only">First Name</span></label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="First Name" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="midname" class="cols-sm-2 control-label"><span class="sr-only">Middle Name</span></label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="midname" id="book_title"  placeholder="Middle Name" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bdate" class="cols-sm-2 control-label"><span class="sr-only">Birthdate</span></label>
                            <div class="cols-sm-10">
                                <input type="date" class="form-control" name="bdate" id="bdate"required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="cols-sm-2 control-label"><span class="sr-only">Email</span></label>
                            <div class="cols-sm-10">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="cols-sm-2 control-label"><span class="sr-only">Gender</span></label>
                            <select name="gender" class="form-control" required>
                                <option>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username" class="cols-sm-2 control-label"><span class="sr-only">Username</span></label>
                            <div class="cols-sm-10">
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="cols-sm-2 control-label"><span class="sr-only">Password</span></label>
                            <div class="cols-sm-10">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                            <div class="form-group col-md-6">
                                <label for="confirm_password" class="cols-sm-2 control-label"><span class="sr-only">Confirm Password</span></label>
                                <div class="cols-sm-10">
                                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        <div class="form-group mx-auto col-md-6">
                            <button class="btn btn-success btn-lg col-md-10"  name="add_admin" id="register">Create Account</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!--JS Libraries-->
<script type="text/javascript" src="js/mdb.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<?php

    if (isset($_POST['add_admin'])) { //set the button name

        //set the admin information details
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']); //escapes string
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $midname = mysqli_real_escape_string($conn, $_POST['midname']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        //check email and user
        $check_email = mysqli_query($conn, "SELECT * FROM accounts WHERE Email = '$email'");
        $check_user = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$username'");
        $count_email = mysqli_num_rows($check_email);
        $count_user = mysqli_num_rows($check_user);


        if ($count_email > 0) { //check if email is already existing

            echo "<script>
                alert('Email is already existing');
            </script>";         
        
        } elseif ($count_user > 0) { //check if username is already existing
            
            echo "<script>
                alert('Username is already existing');
            </script>";
            exit();

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate email when the email is valid
            
            echo "<script>
                alert('This email is invalid');
            </script>";
            exit();
        }
         elseif ($password != $confirm_password) { //check if password and confirm password is correct

            echo "<script>
                alert('Password do not match');
            </script>";
            exit();
        }  
        else {
            //insert query start
            $reg_sql = "INSERT INTO accounts (LastName, FirstName, MiddleName, Gender, Birthdate, Type, Status, Email, Username, Password)
            VALUES ('$lastname', '$firstname', '$midname', '$gender', '$bdate', 'Admin', 'Active', '$email', '$username', '$password')";
            $reg_res = mysqli_query($conn, $reg_sql);

            if ($reg_res) { //if it is success
                
                echo "<script>
                    alert('Successfully added an admin');
                </script>
                <meta http-equiv='refresh' content='0; url=admin-create-admins.php'>";

                //Create Admin Logs inserted to a text file
                 $filename = "system/add_admin.txt";
                 $fp = fopen($filename, 'a+');
                 fwrite($fp, " " . $lastname. " | " . $firstname. " | " . $midname . " | " . $email . " | " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
                 fclose($fp);
                 die();

            } else { //if there is an error
                echo "<script>
                    alert('Error in account submission');
                </script>";
            }
        }
    }
?>
</body>
</html>