
<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">Report</span>
</div>
<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Schedules</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table style="width: 100%;" id="example1" style="align-items: stretch;"
                                    class="table table-hover table-bordered">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Train</th>
                                            <th>Route</th>
                                            <th>Date/Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $row = $conn->query("SELECT * FROM tschedule ORDER BY id DESC");
                                        if ($row->num_rows < 1) echo "No Records Yet";
                                        $sn = 0;
                                        while ($fetch = $row->fetch_assoc()) {
                                            $id = $fetch['id']; ?><tr>
                                            <td><?php echo ++$sn; ?></td>
                                            <td><?php echo getTrainName($fetch['train_id']); ?></td>
                                            <td><?php echo getRoutePath($fetch['route_id']);
                                                    $fullname = " Schedule" ?></td>

                                            <td><?php echo $fetch['date'], " / ", formatTime($fetch['time']); ?></td>

                                            <td>
                                                
                                                <a href="train/print.php?page=report&id=<?php echo $id; ?>">
                                                    <button type="submit" class="btn btn-success">
                                                        View
                                                    </button></a>
                                            </td>
                                        </tr>
                                        <?php
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
</div>
</div>
</div>
</div>
<?php
function getTrainName($id)
{
$val = connect()->query("SELECT name FROM train WHERE id = '$id'")->fetch_assoc();
return $val['name'];
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
?>