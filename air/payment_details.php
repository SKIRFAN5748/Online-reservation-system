<?php

$id=$_SESSION['user_id'];
?>
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
    margin: 0px 357px
}
</style>

    <section class="content">
        <div class="container-fluid"style="opacity: 0.6;">

            <div class="card card-success">
                <div class="card-header">
                    <h2>ENTER THE PAYMENT DETAILS</h2>
                </div>
                <form action="pay.php" method="post">

                    <h3 style="margin-left: 30px"><u>Payment Summary</u></h3>
                    <?php
				$flight_no=$_SESSION['flight_no'];
				$journey_date=$_SESSION['journey_date'];
				$no_of_pass=$_SESSION['no_of_pass'];
				$total_no_of_meals=$_SESSION['total_no_of_meals'];
				$payment_id=rand(100000000,999999999);
				$pnr=$_SESSION['pnr'];
				$_SESSION['payment_id']=$payment_id;
				$payment_date=date('Y-m-d'); 
				$_SESSION['payment_date']=$payment_date;
                $class=$_SESSION['class'];


				
				if($_SESSION['class']=='economy')
				{	
					$query="SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				else if($_SESSION['class']=='business')
				{
					$query="SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$journey_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$ticket_price);
					mysqli_stmt_fetch($stmt);
				}
				mysqli_stmt_close($stmt);
				mysqli_close($conn);
				$total_ticket_price=$no_of_pass*$ticket_price;
				$total_meal_price=250*$total_no_of_meals;
				if($_SESSION['insurance']=='yes')
				{
					$total_insurance_fee=100*$no_of_pass;
				}
				else
				{
					$total_insurance_fee=0;
				}
				if($_SESSION['priority_checkin']=='yes')
				{
					$total_priority_checkin_fee=200*$no_of_pass;
				}
				else
				{
					$total_priority_checkin_fee=0;
				}
				if($_SESSION['lounge_access']=='yes')
				{
					$total_lounge_access_fee=300*$no_of_pass;
				}
				else
				{
					$total_lounge_access_fee=0;
				}
				$total_discount=0;
				$total_amount=$total_ticket_price+$total_meal_price+$total_insurance_fee+$total_priority_checkin_fee+$total_lounge_access_fee+$total_discount;
				$_SESSION['total_amount']=$total_amount;

				echo "<table cellpadding=\"5\"	style='margin-left: 50px'>";
				echo "<tr>";
				echo "<td class=\"fix_table\">Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_ticket_price."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Meal Combo Charges:</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_meal_price."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Priority Checkin Fees:</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_priority_checkin_fee."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Lounge Access Fees:</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_lounge_access_fee."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Insurance Fees:</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_insurance_fee."</td>";
				echo "</tr>";

				echo "<tr>";
				echo "<td class=\"fix_table\">Discount:</td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_discount."</td>";
				echo "</tr>";

				echo "</table>";

				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
				echo "<tr>";
				echo "<td class=\"fix_table\"><strong>Total:</strong></td>";
				echo "<td class=\"fix_table\">&#x20b9; ".$total_amount."</td>";
				echo "</tr>";
				echo "</table>";
				echo "<hr style='margin-right:900px; margin-left: 50px'>";
				echo "<br>";
				echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
                
               
				echo "<br>";
			?>


                    <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
                        class="form-control" value="<?php echo  "AIR" . rand(10000,99999999)?>" style="border: none;"
                        readonly>
                        <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12"
                        name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                    <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID"
                        autocomplete="off" value="WEB">
                        <!-- flight no -->
                        <input type="hidden" id="fno" tabindex="2" maxlength="12" size="12" name="fno" autocomplete="off"
                        value="<?php echo $flight_no ?>" class="form-control" readonly>
                        <!-- journey date -->
                        <input type="hidden" id="jdate" tabindex="2" maxlength="12" size="12" name="jdate" autocomplete="off"
                        value="<?php echo $journey_date ?>" class="form-control" readonly>
                    <!-- no of pass -->
                    <input type="hidden" id="no" tabindex="2" maxlength="12" size="12" name="no" autocomplete="off"
                        value="<?php echo $no_of_pass ?>" class="form-control" readonly>
                       <!-- payment_id --> 
                       <input type="hidden" id="p_ID" tabindex="2" maxlength="12" size="12" name="p_ID" autocomplete="off"
                        value="<?php echo $payment_id ?>" class="form-control" readonly>
                        <!-- pnr -->
                        <input type="hidden" id="pnr" tabindex="2" maxlength="12" size="12" name="pnr" autocomplete="off"
                        value="<?php echo $pnr ?>" class="form-control" readonly>
                         <!-- class -->
                         <input type="hidden" id="CLASS" tabindex="2" maxlength="12" size="12" name="CLASS"
                        autocomplete="off" value="<?php echo $class ?>" class="form-control" readonly>
                        <!-- amount -->
                    <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT"
                        value="<?php echo $total_amount ?>" class="form-control" readonly>
                        <!-- user id -->
                    <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID"
                        autocomplete="off" value="<?php echo $id ?>" class="form-control" readonly>
                       <!--  total_no_of_meals-->
                       <input type="hidden" id="tnm" tabindex="2" maxlength="12" size="12" name="tnm"
                        autocomplete="off" value="<?php echo $total_no_of_meals ?>" class="form-control" readonly>
                    
                    
                   
                        





                    <input type="submit" value="Pay Now" name="Pay_Now">
                </form>
                <!-- 
•	Booking_Status
•	Payment_ID -->

                <!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS
		-->
            </div>
        </div>
    </section>
</div>