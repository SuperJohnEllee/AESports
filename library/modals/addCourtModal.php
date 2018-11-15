<div class="modal fade" id="addCourtModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-dark font-weight-bold my-3" id="myModalLabel"><strong>Add Court</strong>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4">
                <form method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-tag text-dark prefix"></i>
                        <input class="form-control" type="text" name="court_name" required>
                        <label for="lastname">Court Name</label>
                    </div>
                    <div class="form-group mb-5">
                        <label>Court Type</label>
                        <select class="form-control" name="court_type">
                            <option>Court Type</option>
                            <option value="Basketball">Basketball</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Lawn Tennis">Lawn Tennis</option>
                            <?php
                                /*$conn = mysqli_connect('localhost','root','','court_reservation');
                                $court_type = mysqli_query($conn, "SELECT CourtType FROM court");
                                while ($row = mysqli_fetch_assoc($court_type)) {
                                    echo "<option value=".$row['CourtType'].">".$row['CourtType']."</option>";
                                }*/
                            ?>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="text-center mb-3 col-md-12">
                            <button type="submit" name="add_court" class="btn btn-success btn-block btn-rounded z-depth-1">Add Court</button>
                        </div>
                    </div>
                </form>
           </div>
        </div>
    </div>
</div>