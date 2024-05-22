<?php

include "conn.php";

    session_start();

    $id = $_SESSION['user_id'];
    
    
    $sql0 = "SELECT * FROM users WHERE id=".$id;

    $result0 = $conn->query($sql0);
    if($result0!==false && $result0->num_rows > 0)
    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $name = $row["name"];
            $email = $row["email"];
            $phno = $row["phone"];
            $users_id = $row["id"];
            $password= $row["password"];
        }
    }


    ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="homecss/home.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/color/themecolor.css">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
      	<center><h1>Online Ticket Reservation System</h1></center>
        <div class="row mb-3">
          <div class="col-md-6 site-animate">
          	
          	<p>Your Details</p>
        <table class="table table-striped">


		    <tr> 
				<th>User Id</th><td><?php echo $users_id;?></td>
                
			</tr>
			<tr> 
				<th>Name</th><td><?php echo $name;?></td>
                
			</tr>
			<tr>
				<th>Email ID</th><td><?php echo $email ;?></td>
			</tr>
			
			<tr>
				<th>Phone No</th><td><?php echo $phno ;?> </td>
			</tr>
            <tr>
				<th>Password</th><td><?php echo $password; ?></td>
			</tr>
		
        </table>
			
<section class="container">
	<div class="row lg-5">
		
        <div class="col-md-2">
	        <a href="edit.php" class="btn btn-success mr-4">Edit Profile</a>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
	        <a href="customer_home.php" class="btn btn-danger mr-4">Back</a>
        </div>
	</div>
</section>	








<script scr="bootstrap/js/jquery.js"></script>
    <script scr="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/mdb.min.js"></script>
</body>
</html>