<div class="modal fade" id="signModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-dark font-weight-bold my-3" id="myModalLabel"><strong>Sign Up Now</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <form action="./register.php" method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-envelope text-dark prefix"></i>
                        <input type="email" id="Form-email5" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="Form-email5">Your email</label>
                    </div>
                    <div class="md-form pb-3">
                        <i class="fa fa-lock text-dark prefix"></i>
                        <input type="password" id="Form-pass5" class="form-control validate" required>
                        <label data-error="wrong" data-success="right" for="Form-pass5">Your password</label>
                    </div>
                    <div class="md-form pb-3">
                        <i class="fa fa-lock text-dark prefix"></i>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                        <label data-error="wrong" data-success="right" for="password">Confirm Password</label>
                    <div class="form-group mt-4">
                        <input class="form-check-input" style = "color: black" type="checkbox" name=""><a class="text-dark" href="#">Accept the Terms and Conditions</a>
                    </div>
                    </div>
				    <div class="row d-flex align-items-center mb-4">
                        <div class="text-center mb-3 col-md-12">
                            <button type="button" class="btn btn-default pull-right">Sign up</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>