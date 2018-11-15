<?php
    /*
        Sign Up Modal Form - pops up modal form when the button is click
    */
?>

<div class="modal fade" id="signModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-dark font-weight-bold my-3" id="myModalLabel"><strong>Sign Up Now</strong>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <form action="./register.php" method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-user text-dark prefix"></i>
                        <input class="form-control" type="text" name="lastname" required>
                        <label for="lastname">Last Name</label>
                    </div>
                     <div class="md-form mb-5">
                        <i class="fa fa-user text-dark prefix"></i>
                        <input class="form-control" type="text" name="firstname" required>
                        <label for="firstname">First Name</label>
                    </div>
                     <div class="md-form mb-5">
                        <i class="fa fa-user text-dark prefix"></i>
                        <input class="form-control" type="text" name="midname" required>
                        <label for="midname">Middle Name</label>
                    </div>
                    <div class="form-group mb-5">
                        <label>Birthday</label>
                        <input class="form-control" id="bday" type="date" name="bdate">
                    </div>
                    <div class="form-group mb-5">
                        <select class="form-control" name="gender" required>
                            <option>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-envelope text-dark prefix"></i>
                        <input type="email" id="email" name="email" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="email">Email</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-user text-dark prefix"></i>
                        <input type="text" name="username" class="form-control validate" required>
                        <label for="username">Username</label>
                    </div>
                <div class="md-form pb-3">
                    <i class="fa fa-lock text-dark prefix"></i>
                    <input type="password" id="password" name="password" class="form-control validate" required>
                    <label data-error="wrong" data-success="right" for="password">Password</label>
                </div>
                 <div class="md-form pb-3">
                    <i class="fa fa-lock text-dark prefix"></i>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    <label data-error="wrong" data-success="right" for="confirm_password">Confirm Password</label>
                    <div class="form-group mt-4">
                        <input class="form-check-input" type="checkbox" name="">Accept the <a class="text-dark font-weight-bold" href="#"> Terms and Conditions</a>
                    </div>
                </div>
                <div class="row d-flex align-items-center mb-4">
                        <div class="text-center mb-3 col-md-12">
                            <button type="submit" name="register" class="btn btn-success btn-block btn-rounded z-depth-1">Sign up</button>
                        </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>