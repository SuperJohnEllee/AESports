<!DOCTYPE html>
<?php
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
    	<div class="page-header">
    		<h2 class="text-center"><span class="fa fa-bookmark"></span> Reservations</h2>
    		<h4>List of Reserve Courts</h4>
    		<hr>
    	</div>
        <ul class="nav nav-tabs md-tabs nav-justified mdb-color darken-4">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#viewPendingReserve"><span class="fa fa-clock-o"></span> Pending Reserved</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewApprovedReserved" role="tab"><span class="fa fa-thumbs-up"></span> Approved Reserved Court </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewRejectedReserved" role="tab"><span class="fa fa-thumbs-down"></span> Rejected Reserved Court</a>
            </li>
        </ul>
        <br><br>
    	<div class="tab-content card">
            <div class="tab-pane fade in show active" id="viewPendingReserve" role="tabpanel">
                <div class="table-responsive text-dark">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Court ID</th>
                        <th>Reserved By</th>
                        <th>Court Name</th>
                        <th>Court Type</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Date of Reservation</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $reserved_court = mysqli_query($conn,"SELECT * FROM reservation 
                            INNER JOIN court ON reservation.CourtID = court.CourtID WHERE Status = 'Pending'");
                        $reserved_court_count = mysqli_num_rows($reserved_court);

                        if ($reserved_court_count > 0) {
                                while ($reserved_court_row = mysqli_fetch_assoc($reserved_court)) {
                                    echo "<tr>
                                        <td>".$reserved_court_row['reservationID']."</td>
                                        <td>".$reserved_court_row['CourtID']."</td>
                                        <td>".$reserved_court_row['ReserveBy']."</td>
                                        <td>".$reserved_court_row['CourtName']."</td>
                                        <td>".$reserved_court_row['CourtType']."</td>
                                        <td>".$reserved_court_row['Status']."</td>
                                        <td>".$reserved_court_row['TimeStart']." - ".$reserved_court_row['TimeEnd']."</td>
                                        <td>".$reserved_court_row['ReservedDate']."</td>
                                        <td>".$reserved_court_row['DateReserved']."</td>
                                        <td><a class='btn btn-primary' href='actions.php?approved=".$reserved_court_row['reservationID']."'><span class='fa fa-check'></span> Approved</a></td>
                                        <td><a class='btn btn-danger' href='actions.php?rejected=".$reserved_court_row['reservationID']."'><span class='fa fa-close'></span> Reject</a></td>
                                    </tr>";
                                }
                        } else {
                        echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> No Reserved Courts Found</h3></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
            </div>
            </div>
            <div class="tab-pane fade" id="viewApprovedReserved" role="tabpanel">
                <div class="table-responsive text-dark">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Court ID</th>
                        <th>Reserved By</th>
                        <th>Court Name</th>
                        <th>Court Type</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Date of Reservation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $reserved_court = mysqli_query($conn,"SELECT * FROM reservation 
                            INNER JOIN court ON reservation.CourtID = court.CourtID WHERE Status = 'Approved'");
                        $reserved_court_count = mysqli_num_rows($reserved_court);

                        if ($reserved_court_count > 0) {
                                while ($reserved_court_row = mysqli_fetch_assoc($reserved_court)) {
                                    echo "<tr>
                                        <td>".$reserved_court_row['reservationID']."</td>
                                        <td>".$reserved_court_row['CourtID']."</td>
                                        <td>".$reserved_court_row['ReserveBy']."</td>
                                        <td>".$reserved_court_row['CourtName']."</td>
                                        <td>".$reserved_court_row['CourtType']."</td>
                                        <td>".$reserved_court_row['Status']."</td>
                                        <td>".$reserved_court_row['TimeStart']." - ".$reserved_court_row['TimeEnd']."</td>
                                        <td>".$reserved_court_row['ReservedDate']."</td>
                                        <td>".$reserved_court_row['DateReserved']."</td>
                                    </tr>";
                                }
                        } else {
                        echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> No Reserved Courts Found</h3></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
            </div>
            <div class="tab-pane fade" id="viewRejectedReserved" role="tabpanel">
                <div class="table-responsive text-dark">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Court ID</th>
                        <th>Reserved By</th>
                        <th>Court Name</th>
                        <th>Court Type</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Date of Reservation</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $reserved_court = mysqli_query($conn,"SELECT * FROM reservation 
                            INNER JOIN court ON reservation.CourtID = court.CourtID WHERE Status = 'Rejected'");
                        $reserved_court_count = mysqli_num_rows($reserved_court);

                        if ($reserved_court_count > 0) {
                                while ($reserved_court_row = mysqli_fetch_assoc($reserved_court)) {
                                    echo "<tr>
                                        <td>".$reserved_court_row['reservationID']."</td>
                                        <td>".$reserved_court_row['CourtID']."</td>
                                        <td>".$reserved_court_row['ReserveBy']."</td>
                                        <td>".$reserved_court_row['CourtName']."</td>
                                        <td>".$reserved_court_row['CourtType']."</td>
                                        <td>".$reserved_court_row['Status']."</td>
                                        <td>".$reserved_court_row['TimeStart']." - ".$reserved_court_row['TimeEnd']."</td>
                                        <td>".$reserved_court_row['ReservedDate']."</td>
                                        <td>".$reserved_court_row['DateReserved']."</td>
                                        <td><a class='btn btn-danger' href='actions.php?del_reserve=".$reserved_court_row['reservationID']."'><span class='fa fa-trash'></span> Delete</a></td>
                                    </tr>";
                                }
                        } else {
                        echo "<tr><td colspan='11'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> No Reserved Courts Found</h3></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
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
<script type="text/javascript" src="js/func.js"></script>
</body>
</html>