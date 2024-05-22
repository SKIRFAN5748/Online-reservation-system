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
    margin: 0px 60px
}
</style>
<div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text">
        <h2>ENTER THE AIRCRAFTS DETAILS</h2>
    </span>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card card-success">
                    <form class="mx-1 mx-md-4"  method="post">

                        <div>
                            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Aircraft has been successfully added.</strong>
						<br><br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>*Jet ID already exists, please enter a new Jet ID.</strong>
						<br><br>";
				}
			?>
            <pre></pre>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter a valid Jet ID</span>
                            </div>
                            <input type="text" name="jet_id" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter the Jet Type/Model</span>
                            </div>
                            <input type="text" name="jet_type" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Enter the total capacity of the Jet</span>
                            </div>
                            <input type="number" name="jet_capacity" required class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                       
                    
                           
                        <div class="input-group mb-3" style="justify-content: center;" >
                            <input type="submit" value="Submit" name="Submit" href= "">
                            </div>
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
				if(empty($_POST['jet_id']))
				{
					$data_missing[]='Jet ID';
				}
				else
				{
					$jet_id=trim($_POST['jet_id']);
				}

				if(empty($_POST['jet_type']))
				{
					$data_missing[]='Jet Type';
				}
				else
				{
					$jet_type=$_POST['jet_type'];
				}

				if(empty($_POST['jet_capacity']))
				{
					$data_missing[]='Jet Capacity';
				}
				else
				{
					$jet_capacity=$_POST['jet_capacity'];
				}

				if(empty($data_missing))
				{
					//require_once('Database Connection file/mysqli_connect.php');
					$query="INSERT INTO Jet_Details (jet_id,jet_type,total_capacity,active) VALUES (?,?,?,'Yes')";
					$stmt=mysqli_prepare($conn,$query);
					mysqli_stmt_bind_param($stmt,"ssi",$jet_id,$jet_type,$jet_capacity);
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
                        alert("Successfully Submitted");
						</script>
					<?php	
					}
					else
					{
                        ?>
                        <script>
						alert("Submit Error");
						//echo mysqli_error();
						</script>
                        <?php
					}
				}
				else
				{
                    ?>
                    <script>
                    Alert("The following data fields were empty!");
					</script>
                    <?php
					foreach($data_missing as $missing)
					{
                        ?>
                        <script>
						Alert($missing);
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