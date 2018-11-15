<div class="modal fade" id="logModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-dark font-weight-bold my-3" id="myModalLabel"><strong><span class="fa fa-sign-in"></span> Sign In</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <form action="./login.php" method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-user text-dark prefix"></i>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label data-error="wrong" data-success="right" for="username">Username</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-lock text-dark prefix"></i>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <label data-error="wrong" data-success="right" for="password">Password</label>
                        <!--<a class="btn btn-default" id="show_pass" href="#"><span class="fa fa-eye"></span> Show</a> -->
						<br/>
                        <button type="submit" class="btn btn-default pull-right" name="login" data-loading-text="Logging in.."><span class="fa fa-sign-in"></span> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>