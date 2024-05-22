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
    margin: 0px 68px
}
</style>

    <section class="content">
        <div class="container-fluid"style="opacity: 0.6;">

            <div class="card card-success">
                <div class="card-header">
                    <h2>CANCEL BOOKED TICKETS</h2>
                </div>
                <form  method="post">

                    <?php
				if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color: red'>*Invalid PNR, please enter PNR again</strong>
						<br>
						<br>";
				}
			?>
                    <table cellpadding="5" style="padding-left: 30px;">
                        <tr>
                            <td class="fix_table">Enter the PNR</td>
                        </tr>
                        <tr>
                            <td class="fix_table"><input type="text" name="pnr" required></td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Cancel Ticket" name="Cancel_Ticket">
                </form>
                <!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS
		-->
            </div>
        </div>
    </section>
</div>



		<?php
			if(isset($_POST['Cancel_Ticket']))
			{
				$data_missing=array();
				if(empty($_POST['pnr']))
				{
					$data_missing[]='PNR';
				}
				else
				{
					$pnr=trim($_POST['pnr']);
				}

				if(empty($data_missing))
				{
					

					$todays_date=date('Y-m-d'); 
					$customer_id=$_SESSION['user_id'];

					$query="SELECT count(*) from Ticket_Details t WHERE pnr=? and journey_date>=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$pnr,$todays_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$cnt);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					if($cnt!=1)
					{
						mysqli_close($conn);
						
					}
					$query="UPDATE Ticket_Details SET booking_status='CANCELED' WHERE pnr=? and customer_id=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$pnr,$customer_id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					if($affected_rows==1)
					{
						$query="SELECT t.flight_no,t.journey_date,t.no_of_passengers,t.class,0.85*p.payment_amount as refund_amount from Ticket_Details t,Payment_Details p WHERE t.pnr=? and t.pnr=p.pnr";
						$stmt=mysqli_prepare($conn,$query);
						mysqli_stmt_bind_param($stmt,"s",$pnr);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt,$flight_no,$journey_date,$no_of_pass,$class,$refund_amount);
						mysqli_stmt_fetch($stmt);
						mysqli_stmt_close($stmt);
						$_SESSION['refund_amount']=$refund_amount;
						if($class=='economy')
						{
							$query="UPDATE Flight_Details SET seats_economy=seats_economy+? WHERE flight_no=? AND departure_date=?";
							$stmt=mysqli_prepare($conn,$query);
							mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
							mysqli_stmt_execute($stmt);
							$affected_rows_1=mysqli_stmt_affected_rows($stmt);
							echo $affected_rows_1.'<br>';
							mysqli_stmt_close($stmt);
						}
						else if($class=='business')
						{
							$query="UPDATE Flight_Details SET seats_business=seats_business+? WHERE flight_no=? AND departure_date=?";
							$stmt=mysqli_prepare($conn,$query);
							mysqli_stmt_bind_param($stmt,"iss",$no_of_pass,$flight_no,$journey_date);
							mysqli_stmt_execute($stmt);
							$affected_rows_1=mysqli_stmt_affected_rows($stmt);
							echo $affected_rows_1.'<br>';
							mysqli_stmt_close($stmt);
						}
						if($affected_rows_1==1)
						{
                            ?>
                            <script>
                            alert("Your ticket has been cancelled successfully.Your amount of  <?php echo $_SESSION['refund_amount']?> will be refunded to your bank account (Cancellation charge on 15% of your ticket amount has been deducted).");
							//header("location: cancel_booked_tickets_success.php");
                            </script>
                            <?php
						}
						else
						{
                            ?>
                            <script>
							alert( "Submit Error");
							//echo mysqli_error();
                            </script>
                            <?php
						}
					}
					else
					{
                        ?>
                        <script>
						alert ("Submit Error");
						//echo mysqli_error();
						
                        </script>
                        <?php
					}
					mysqli_close($conn);
				}
				else
				{
                    ?>
                    <script>
					alert( "The following data fields were empty!");
                    </script>
                    <?php
					foreach($data_missing as $missing)
					{
						?>
                        <script>
                        alert( $missing);
                        </script>
                        <?php
					}
				}
			}
			
		?>



