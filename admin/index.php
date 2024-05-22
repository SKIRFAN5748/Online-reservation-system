<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">Dashboard</span>
</div>
<div class="content">


    <h5 class="mt-4 mb-2"><i class=" fa fa-subway"> </i> Train</h5>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Passengers</span>
                    <span class="info-box-number" > <?php
                                                    echo $reg =  $conn->query("SELECT * FROM users")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-train"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Trains</span>
                    <span class="info-box-number"style="color: white;"><?php
                                                    echo $reg =  $conn->query("SELECT * FROM train")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%" ></div>
                    </div>
                    <?php //readonly  
                        ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary">
                <span class="info-box-icon"style="color: white;"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Schedules</span>
                    <span class="info-box-number"style="color: white;"><?php
                                                    echo $reg =  $conn->query("SELECT * FROM tschedule")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <?php //readonly  
                        ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-rupee-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Payments</span>
                    <span class="info-box-number"style="color: white;"> $ <?php
                                                            $row = connect()->query("SELECT SUM(amount) AS amount FROM tpayment")->fetch_assoc();
                                                            echo $row['amount'] == null ? '0' : $row['amount'];
                                                            ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- /.col-md-6 -->
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-route"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Routes</span>
                    <span class="info-box-number"style="color: white;"><?php echo connect()->query("SELECT * FROM troute")->num_rows ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-comment-dots"></i></span>

                <div class="info-box-content"style="color: white;">
                    <span class="info-box-text"style="color: white;">Feedbacks Received</span>
                    <span class="info-box-number"style="color: white;"><?php echo connect()->query("SELECT * FROM tfeedback")->num_rows ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.col -->
</div>
<!-- /.row -->

</div>












<div class="content">


    <h5 class="mt-4 mb-2"><i class=" fa fa-subway"> </i> Airlines</h5>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fa fa-user-check "></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Passengers Confirmed</span>
                    <span class="info-box-number" > <?php
                                                    /*echo $reg =  $conn->query("SELECT * FROM ticket_details")->num_rows;*/
                                                    $row = connect()->query("SELECT SUM(no_of_passengers) AS no_of_passengers FROM ticket_details WHERE booking_status ='CONFIRMED' ")->fetch_assoc();
                                                            echo $row['no_of_passengers'] == null ? '0' : $row['no_of_passengers'];
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">TOTAL FLIGHT </span>
                    <span class="info-box-number"style="color: white;"><?php
                                                    echo $reg =  $conn->query("SELECT * FROM flight_details")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%" ></div>
                    </div>
                    <?php //readonly  
                        ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-fighter-jet"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">TOTAL AIRCRAFTS</span>
                    <span class="info-box-number"style="color: white;"><?php
                                                    echo $reg =  $conn->query("SELECT * FROM jet_details")->num_rows;
                                                    ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <?php //readonly  
                        ?>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-success">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-rupee-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Payments</span>
                    <span class="info-box-number"style="color: white;"> $ <?php
                                                            $row = connect()->query("SELECT SUM(payment_amount) AS payment_amount FROM payment_details WHERE txnstatus ='TXN_SUCCESS' ")->fetch_assoc();
                                                            echo $row['payment_amount'] == null ? '0' : $row['payment_amount'];
                                                            ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <!-- /.col-md-6 -->
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-primary">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-user-clock"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"style="color: white;">Ticket Pending</span>
                    <span class="info-box-number"style="color: white;"><?php  $row = connect()->query("SELECT SUM(no_of_passengers) AS no_of_passengers FROM ticket_details WHERE booking_status ='PENDING' ")->fetch_assoc();
                                                            echo $row['no_of_passengers'] == null ? '0' : $row['no_of_passengers']; ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
                <span class="info-box-icon"style="color: white;"><i class="fa fa-times-circle"></i></span>

                <div class="info-box-content"style="color: white;">
                    <span class="info-box-text"style="color: white;">Ticket Canceled</span>
                    <span class="info-box-number"style="color: white;"><?php $row = connect()->query("SELECT SUM(no_of_passengers) AS no_of_passengers FROM ticket_details WHERE booking_status ='CANCELED' ")->fetch_assoc();
                                                            echo $row['no_of_passengers'] == null ? '0' : $row['no_of_passengers']; ?></span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.col -->
</div>
<!-- /.row -->

</div>