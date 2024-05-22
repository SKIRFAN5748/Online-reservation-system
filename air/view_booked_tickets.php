

    <section class="content">
        <div class="container-fluid"style="opacity: 0.6;">

            <div class="card card-success">
                <div class="card-header">
                    <h2>VIEW BOOKED FLIGHT TICKETS</h2>
                </div>
                <div class="card-body">
                    <h3 class='set_nice_size'>
                        <center><u>Upcoming Trips</u></center>
                    </h3>


                    <table style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>PNR</th>
                                <th>Date of Reservation</th>
                                <th>Flight No.</th>
                                <th>Journey Date</th>
                                <th>Class</th>
                                <th>Booking Status</th>
                                <th>No. of Passengers</th>
                                <th>Payment ID</th>
                                <th>Reference ID</th>
								
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$todays_date=date('Y-m-d');
							$thirty_days_before_date=date_create(date('Y-m-d'));
							date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
							$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
							$customer_id=$_SESSION['user_id'];
			
							$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id,ref FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
							$stmt=mysqli_prepare($conn,$query);
							mysqli_stmt_bind_param($stmt,"ss",$customer_id,$todays_date);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id,$ref);
							mysqli_stmt_store_result($stmt);
							if(mysqli_stmt_num_rows($stmt)==0)
							{
								echo "<h3><center>No upcoming trips!</center></h3>";
							}
							else
							{
								while(mysqli_stmt_fetch($stmt)) {
							?>
                            <tr>
                                <td><?php echo $pnr ?></td>
                                <td><?php echo $date_of_reservation ?></td>
                                <td><?php echo $flight_no ?></td>
                                <td><?php echo $journey_date ?></td>
                                <td><?php echo $class ?></td>
                                <td><?php echo $booking_status ?></td>
                                <td><?php echo $no_of_passengers ?></td>
                                <td><?php echo $payment_id ?></td>
                                <td><?php echo $ref ?></td>
								
                            </tr>
                            <?php
    						}
						}
						?>
                        </tbody>
                    </table>
                    <?php
			echo "<br><h3 class=\"set_nice_size\"><center><u>Completed Trips</u></center></h3>";

				?>
                    <table style="align-items: stretch;" class="table table-hover w-100 table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>PNR</th>
                                <th>Date of Reservation</th>
                                <th>Flight No.</th>
                                <th>Journey Date</th>
                                <th>Class</th>
                                <th>Booking Status</th>
                                <th>No. of Passengers</th>
                                <th>Payment ID</th>
                                <th>Reference ID</th>
                            </tr>
                        </thead>
						<tbody>
                        <?php
				
						$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id,ref FROM Ticket_Details where customer_id=? and journey_date<? and journey_date>=? ORDER BY  journey_date";
						$stmt=mysqli_prepare($conn,$query);
						mysqli_stmt_bind_param($stmt,"sss",$customer_id,$todays_date,$thirty_days_before_date);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id,$ref);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt)==0)
						{
							echo "<h3><center>No trips completed in the past 30 days!</center></h3>";
						}
						else
						{
							while(mysqli_stmt_fetch($stmt)) {
						?>
                        <tr>
                            <td><?php echo $pnr ?></td>
                            <td><?php echo $date_of_reservation ?></td>
                            <td><?php echo $flight_no ?></td>
                            <td><?php echo $journey_date ?></td>
                            <td><?php echo $class ?></td>
                            <td><?php echo $booking_status ?></td>
                            <td><?php echo $no_of_passengers ?></td>
                            <td><?php echo $payment_id ?></td>
                            <td><?php echo $ref ?></td>
                        </tr>
                        <?php
    						}
				
						}
						mysqli_stmt_close($stmt);
						mysqli_close($conn);
						?>
                    	</tbody>
                    </table>
                </div>
            </div>
    </section>
</div>