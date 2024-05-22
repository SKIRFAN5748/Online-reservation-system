<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">Payments</span>
</div>

<div class="container-fluid">
            <div class="col-lg-12">


                <div class="card card-success">
                    <div class="card-header border-0">
                        <h3 class="card-title">All Payments</h3>

                    </div>
                    <div class="card-body">
                        <table id='example1' class="table table-striped table-bordered table-hover table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Route</th>
                                    <th>Date</th>
                                    <th>First Class</th>
                                    <th>Second Class</th>
                                    <th>Capacity</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $pay = $conn->query("SELECT *, tschedule.id as id, tschedule.date as date, tschedule.time as time FROM tschedule INNER JOIN tpayment ON tschedule.id = tpayment.schedule_id");
                                $sn = 0;

                                while ($val = $pay->fetch_assoc()) {
                                    $id = $val['id'];
                                    $array = getTotalBookByType($id);
                                    // echo (($array['first'] - $array['first_booked'])), " Seat(s) Available for First Class" . "<hr/>" . ($array['second'] - $array['second_booked']) . " Seat(s) Available for Second Class";
                                    $sn++;
                                    echo "<tr>
                                      <td>" . getRoutePath($val['route_id']) . "</td>
                                      <td>" . $val['date'] . " - " . formatTime($val['time']) . "</td>
                                      <td>$ " . sum($val['id'], 'first') . "</td>
                                      <td>$ " . sum($val['id'], 'second') . "</td>
                                      <td>" . (($array['first'] - $array['first_booked'])), " Seat(s) Available for First Class" . "<hr/>" . ($array['second'] - $array['second_booked']) . " Seat(s) Available for Second Class" . "</td>
                                      </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>
<?php
function getTotalBookByType($id)
{

    $con =  connect()->query("SELECT SUM(no) as no FROM `tbooked` WHERE schedule_id = '$id' AND class = 'second'")->fetch_assoc();
    $con2 =  connect()->query("SELECT SUM(no) as no FROM `tbooked` WHERE schedule_id = '$id' AND class = 'first'")->fetch_assoc();
    $no = $con['no'];
    $no2 = $con2['no'];
    $num = $no == null ? 0 :  $con['no'];
    $num2 = $no2 == null ? 0 :  $con2['no'];
    $qu = connect()->query("SELECT train.first_seat as first, train.second_seat as second FROM tschedule INNER JOIN train ON train.id = tschedule.train_id WHERE tschedule.id = '$id'")->fetch_assoc();
    $first = $qu['first'];
    $second = $qu['second'];
    $first = intval($first);
    $second = intval($second);
    $num = intval($num);
    $num2 = intval($num2);
    return array("first" => $first, "second" => $second, "first_booked" => $num, "second_booked" => $num2);
}
function getRoutePath($id)
{
    $val = connect()->query("SELECT * FROM troute WHERE id = '$id'")->fetch_assoc();
    return $val['start'] . " to " . $val['stop'];
}
function formatTime($time)
{
    $time = explode(":", $time);
    if ($time[0] > 12) {
        $string = ($time[0] - 12) . ":" . $time[1] . " PM";
    } else {
        $string = ($time[0]) . ":" . $time[1] . " AM";
    }
    return $string;
}
function sum($id, $type = null)
{
    $conn = connect();
    if ($type == null) {
        $row = $conn->query("SELECT SUM(amount) as amount FROM `tpayment` INNER JOIN tbooked ON tbooked.payment_id = tpayment.id AND tbooked.schedule_id = tpayment.schedule_id WHERE tpayment.schedule_id = '$id'")->fetch_assoc();
    } else {
        $row = $conn->query("SELECT SUM(amount) as amount FROM `tpayment` INNER JOIN tbooked ON tbooked.payment_id = tpayment.id AND tbooked.schedule_id = tpayment.schedule_id WHERE tpayment.schedule_id = '$id' AND tbooked.class = '$type'")->fetch_assoc();
    }
    return $row['amount'] == null ? 0 : $row['amount'];
}
?>