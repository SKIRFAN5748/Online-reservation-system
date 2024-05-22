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
    margin: 0px 67px
}
</style>
<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>ENTER THE FLIGHT SCHEDULE TO BE DELETED</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <form action="delete_flight_details_form_handler.php" method="post" class="mx-1 mx-md-4">
                        <div>
                            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color:green; padding-left:20px;'>The Flight Schedule has been successfully deleted.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red; padding-left:20px;'>*Invalid Flight No./Departure Date, please enter again.</strong>
						<br>
						<br>";
				}
			?>
                            <table cellpadding="5" style="padding-left: 20px;">
                                <tr>
                                    <td class="fix_table">Enter a valid Flight No.</td>
                                    <td class="fix_table">Enter the Departure Date</td>
                                </tr>
                                <tr>
                                    <td class="fix_table"><input type="text" name="flight_no" required></td>
                                    <td class="fix_table"><input type="date" name="departure_date" required></td>
                                </tr>
                            </table>
                            <br>
                            <div class="input-group mb-3">
                                <input type="submit" value="Delete" name="Delete">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
			if(isset($_POST['Delete']))
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
					$departure_date=trim($_POST['departure_date']);
				}

				if(empty($data_missing))
				{
					
					$query="DELETE FROM Flight_Details WHERE flight_no=? AND departure_date=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ss",$flight_no,$departure_date);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
					
					if($affected_rows==1)
					{
                        ?>
                        <script>
                        alert("Successfully Deleted");
						</script>
                        <?php
					}
					else
					{
                        ?>
                        <script>
                        alert("Submit Error");
						</script>
                        <?php
					}
				}
				else
				{
					?>
                    <script>
					alert("The following data fields were empty! ");
                    </script>
                    <?php
					foreach($data_missing as $missing)
					{
                        ?>
                        <script>
						alert($missing);
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