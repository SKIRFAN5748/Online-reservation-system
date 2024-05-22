<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">Payments</span>
</div>

<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                Search</h3>
                            <div class='float-right'>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            New Search
                        </button>
                                
                            </div>
                        </div>

                        <div class="card-body">
                            <?php
                            if (isset($_POST['submit'])) {
                                $ticket = $_POST['ticket'];
                                $conn = connect();
                                //Check if train exists
                                $check = $conn->query("SELECT * FROM tbooked WHERE code = '$ticket' ");
                                if ($check->num_rows != 1) {
                                    alert("Invalid Ticket Number Provided");
                                } else {
                                    $id = $check->fetch_assoc()['id'];
                                    $row = $conn->query("SELECT tschedule.id as schedule_id, users.name as fullname, users.email as email, users.phone as phone, tpayment.amount as amount, tpayment.ref as ref, tpayment.date as payment_date, tschedule.train_id as train_id, tbooked.code as code, tbooked.no as no, tbooked.class as class, tbooked.seat as seat, tschedule.date as date, tschedule.time as time FROM tbooked INNER JOIN tschedule on tbooked.schedule_id = tschedule.id INNER JOIN tpayment ON tpayment.id = tbooked.payment_id INNER JOIN users ON users.id = tbooked.user_id WHERE tbooked.id = '$id'")->fetch_assoc();
                                    echo '<table id="example1" style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">';
                                    echo "
                                   
        <tr><th>Full Name</th><td>$row[fullname]</td></tr>
        <tr><th>Email</th><td>$row[email]</td></tr>
        <tr><th>Phone</th><td>$row[phone]</td></tr>
        <tr><th>Ticket Code</th><td>$row[code]</td></tr>
        <tr><th>Class</th><td>$row[class]</td></tr>
        <tr><th>Seat</th><td>$row[seat]</td></tr>
        <tr><th>Trip Date/TIme</th><td>" . date("D d, M Y", strtotime($row['date'])) . " / $row[time]</td></tr>
        <tr><th>Amount Paid</th><td>$ $row[amount]</td></tr>
        <tr><th>Payment Date</th><td>$row[payment_date]</td></tr>
        <tr><th>Payment Ref</th><td>$row[ref]</td></tr>
        <tr><th>Route</th><td>" . getRouteFromSchedule($row['schedule_id']) . "</td></tr>
        <tr><th>Train</th><td>" . getTrainName($row['train_id']) . "</td></tr>
        </table>";
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Search Commuter With Ticket ID
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <table class="table table-bordered">
                        <tr>
                            <th>Enter Ticket Number</th>
                            <td><input type="text" class="form-control" name="ticket" required minlength="3" id=""></td>
                        </tr>
                        <td colspan="2">

                            <input class="btn btn-info" type="submit" value="Search" name='submit'>
                        </td>
                        </tr>
                    </table>
                </form>



            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
function getTrainName($id)
{
    $val = connect()->query("SELECT name FROM train WHERE id = '$id'")->fetch_assoc();
    return $val['name'];
}
function getRouteFromSchedule($id)
{
    $q = connect()->query("SELECT route_id as id FROM tschedule WHERE id = '$id'")->fetch_assoc();
    return getRoutePath($q['id']);
}
function getRoutePath($id)
{
    $val = connect()->query("SELECT * FROM troute WHERE id = '$id'")->fetch_assoc();
    return $val['start'] . " to " . $val['stop'];
}
?>