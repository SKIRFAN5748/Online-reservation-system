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
        <h2>ENTER THE AIRCRAFT TO BE DEACTIVATED</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <form  method="post" class="mx-1 mx-md-4">

                        <div>
                            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Aircraft has been successfully deactivated.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>*Invalid Jet ID entered, please enter again.</strong>
						<br>
						<br>";
				}
			?>
                            <table cellpadding="5" style="padding-left: 20px;">
                                <tr>
                                    <td class="fix_table">Enter a valid Jet ID</td>
                                </tr>
                                <tr>
                                    <td class="fix_table"><input type="text" name="jet_id" required></td>
                                </tr>
                            </table>
                            <br>
                            <div class="input-group mb-3" >
                            <input type="submit" value="Deactivate" name="Deactivate">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
			if(isset($_POST['Deactivate']))
			{
				$data_missing=array();
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($data_missing))
				{
					
					$query="UPDATE Jet_Details SET active='No' WHERE jet_id=?";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"s",$jet_id);
					mysqli_stmt_execute($stmt);
					$affected_rows=mysqli_stmt_affected_rows($stmt);
					//echo $affected_rows."<br>";
					// mysqli_stmt_bind_result($stmt,$cnt);
					// mysqli_stmt_fetch($stmt);
					// echo $cnt;
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
					/*
					$response=@mysqli_query($dbc,$query);
					*/
					if($affected_rows==1)
					{
                        ?>
                        <script>
						alert("Successfully Deactvated");
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