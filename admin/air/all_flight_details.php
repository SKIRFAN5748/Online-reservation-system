<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>ALL FLIGHT DETAILS</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
            <div class='float-right'>
                <a class="btn btn-primary" href="admin.php?page=alljet" role="button">AIRCRAFTS DETAILS</a>
            </div>
            <pre></pre>
                <div class="card card-success">
                    <div class="card-body">
                        <table id="example1" style="align-items: stretch;"
                            class="table table-hover w-100 table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Flight No</th>
                                    <th>From City</th>
                                    <th>To city</th>
                                    <th>Departure Date</th>
                                    <th>Arrival Date</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                    <th>Seats Economy</th>
                                    <th>Seats Business</th>
                                    <th>Price Economy</th>
                                    <th>Price Business</th>
                                    <th>Jet Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql= "SELECT * FROM flight_details";
                                $res=mysqli_query($conn,$sql);
                                if ($res->num_rows < 1) echo "No Records Yet";
                                $sn = 1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $flight_no=$row['flight_no'];
                                    $from_city=$row['from_city'];
                                    $to_city=$row['to_city'];
                                    $departure_date=$row['departure_date'];
                                    $arrival_date=$row['arrival_date'];
                                    $departure_time=$row['departure_time'];
                                    $arrival_time=$row['arrival_time'];
                                    $seats_economy=$row['seats_economy'];
                                    $seats_business=$row['seats_business'];
                                    $price_economy=$row['price_economy'];
                                    $price_business=$row['price_business'];
                                    $jet_id=$row['jet_id'];
                                
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $flight_no ;?></td>
                                    <td><?php echo $from_city ;?></td>
                                    <td><?php echo  $to_city ;?></td>
                                    <td><?php echo $departure_date ;?></td>
                                    <td><?php echo $arrival_date ;?></td>
                                    <td><?php echo $departure_time ;?></td>
                                    <td><?php echo $arrival_time;?></td>
                                    <td><?php echo $seats_economy ;?></td>
                                    <td><?php echo $seats_business ;?></td>
                                    <td><?php echo $price_economy;?></td>
                                    <td><?php echo $price_business ;?></td>
                                    <td><?php echo $jet_id ;?></td>
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