<style>
input {
    border: 1.5px solid #030337;
    border-radius: 4px;
    padding: 7px 30px;
}

input[type=submit] {
    background-color: #030337;
    color: white;
    border-radius: 4px;
    padding: 7px 45px;
    margin: 0% 15.8%
}

input[type=date] {
    border: 1.5px solid #030337;
    border-radius: 4px;
    padding: 5.5px 44.5px;
}
</style>
<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>VIEW LIST OF BOOKED TICKETS FOR A FLIGHT</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <form class="mx-1 mx-md-4" method="post">


                        <pre></pre>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter the Flight
                                    No.</span>
                            </div>
                            <input type="text" name="flight_no" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                style="width: 30%;">
                            &emsp;
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter the Departure
                                    Date</span>
                            </div>
                            <input type="date" name="departure_date" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                style="width: 30%">
                        </div>


                        <div class="input-group mb-3" style="justify-content: center;">
                            <input type="submit" value="Submit" name="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['flight_no']))
				{
					$data_missing[]='Flight No.';
				}
				else
				{
					$flight_no=trim($_POST['flight_no']);
				}
				if(empty($_POST['departure_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$departure_date=$_POST['departure_date'];
				}

				if(empty($data_missing))
				{
					
					$query="SELECT pnr,date_of_reservation,class,no_of_passengers,payment_id,customer_id,ref FROM Ticket_Details where flight_no=? and journey_date=? and booking_status='CONFIRMED' ORDER BY class";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$departure_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$class,$no_of_passengers,$payment_id,$customer_id,$ref);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt)==0)
					{
						echo "<h3>No booked tickets information is available!</h3>";
					}
					else
					{
                        ?>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <?php
						echo "<table cellpadding=\"10\"";
						echo "<tr><th>PNR</th>
						<th>Date of Reservation</th>
						<th>Class</th>
						<th>No. of Passengers</th>
						<th>Payment ID</th>
						<th>Customer ID</th>
						<th>Reference ID</th> 
						</tr>";
						while(mysqli_stmt_fetch($stmt)) {
        					echo "<tr>
							<td>".$pnr."</td>
							<td>".$date_of_reservation."</td>
							<td>".$class."</td>
							<td>".$no_of_passengers."</td>
							<td>".$payment_id."</td>
							<td>".$customer_id."</td>
							<td>".$ref."</td>
        					</tr>";
    					}
    					echo "</table> <br>";
    				}
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			
		?>
                </div>
            </div>
        </div>
    </div>
</div>