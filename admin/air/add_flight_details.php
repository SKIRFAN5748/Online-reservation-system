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
    margin: 0px 200px
}
</style>
<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>ENTER THE FLIGHT SCHEDULE DETAILS</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <form method="post" class="mx-1 mx-md-4">

                        <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
						<br>
						<br>";
				}
			?>
                        <pre></pre>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Flight Number</span>
                            </div>
                            <input type="text" name="flight_no" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Origin</span>
                            </div>
                            <input type="text" name="origin" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            &emsp;<div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Destination</span>
                            </div>
                            <input type="text" name="destination" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Departure Date</span>
                            </div>
                            <input type="date" name="dep_date" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            &emsp;<div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Arrival Date</span>
                            </div>
                            <input type="date" name="arr_date" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Departure Time</span>
                            </div>
                            <input type="time" name="dep_time" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            &emsp;<div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Arrival Time</span>
                            </div>
                            <input type="time" name="arr_time" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Number of Seats in Economy
                                    Class</span>
                            </div>
                            <input type="number" name="seats_eco" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            &emsp;<div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Number of Seats in
                                    Business Class</span>
                            </div>
                            <input type="number" name=" seats_bus" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ticket Price(Economy
                                    Class)</span>
                            </div>
                            <input type="number" name="price_eco" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            &emsp;<div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Ticket Price(Business
                                    Class)</span>
                            </div>
                            <input type="number" name="price_bus" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Jet ID</span>
                            </div>
                            <input type="text" name="jet_id" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>


                        <div class="input-group mb-3" style="justify-content: center;">
                            <input type="submit" value="Submit" name="Submit">
                        </div>
                    </form>
                    <!--check out addling local host in links and other places

		-->
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

				if(empty($_POST['origin']))
				{
					$data_missing[]='Origin';
				}
				else
				{
					$origin=$_POST['origin'];
				}
				if(empty($_POST['destination']))
				{
					$data_missing[]='Destination';
				}
				else
				{
					$destination=$_POST['destination'];
				}

				if(empty($_POST['dep_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$dep_date=$_POST['dep_date'];
				}
				if(empty($_POST['arr_date']))
				{
					$data_missing[]='Arrival Date';
				}
				else
				{
					$arr_date=$_POST['arr_date'];
				}
				
				if(empty($_POST['dep_time']))
				{
					$data_missing[]='Departure Time';
				}
				else
				{
					$dep_time=$_POST['dep_time'];
				}
				if(empty($_POST['arr_time']))
				{
					$data_missing[]='Arrival Time';
				}
				else
				{
					$arr_time=$_POST['arr_time'];
				}

				if(empty($_POST['seats_eco']))
				{
					$data_missing[]='Seats(Economy)';
				}
				else
				{
					$seats_eco=$_POST['seats_eco'];
				}
				if(empty($_POST['seats_bus']))
				{
					$data_missing[]='Seats(Business)';
				}
				else
				{
					$seats_bus=$_POST['seats_bus'];
				}

				if(empty($_POST['price_eco']))
				{
					$data_missing[]='Price(Economy)';
				}
				else
				{
					$price_eco=$_POST['price_eco'];
				}
				if(empty($_POST['price_bus']))
				{
					$data_missing[]='Price(Business)';
				}
				else
				{
					$price_bus=$_POST['price_bus'];
				}

				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=$_POST['jet_id'];
				}

				if(empty($data_missing))
				{
					$cnt=-1;
					

					$query="SELECT count(*) FROM Jet_Details WHERE jet_id=? and active='Yes'";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);

					if($cnt==1)
					{
						$query="INSERT INTO Flight_Details (flight_no,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,seats_economy,seats_business,price_economy,price_business,jet_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
						$stmt=mysqli_prepare($conn,$query);
						mysqli_stmt_bind_param($stmt,"sssssssiiiis",$flight_no,$origin,$destination,$dep_date,$arr_date,$dep_time,$arr_time,$seats_eco,$seats_bus,$price_eco,$price_bus,$jet_id);
						mysqli_stmt_execute($stmt);
						$affected_rows=mysqli_stmt_affected_rows($stmt);
						mysqli_stmt_close($stmt);
					}
					else
					{
						$affected_rows=0;
					}
					mysqli_close($conn);
					if($affected_rows==1)
					{
						?>
<script>
//echo "Successfully Submitted";
//header("location: add_flight_details.php?msg=success");
alert("Successfully Submitted");
</script>
<?php
					}
					else
					{
						?>
<script>
//echo "Submit Error";
//echo mysqli_error();
alert("Submit Error");
</script>
<?php
					}
				}
				else
				{
					?>
<script>
alert("The following data fields were empty!");

//echo "The following data fields were empty! <br>";
</script>
<?php
					foreach($data_missing as $missing)
					{
						?>
<script>
alert($missing);

//echo $missing ."<br>";
</script>
<?php
					}
				}
			}

		?>
<?php
function alert($msg)
{
    echo "<script>alert('$msg')</>";
	
}

?>