<?php
session_start();
require_once '../conn.php';

?>

<?php

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (!isset($email, $password)) {
?>
<script>
alert("Ensure you fill the form properly.");
</script>
<?php
    } else {    
  
    
    /*$uname = mysqli_real_escape_string($conn,$email);
    $pwd = mysqli_real_escape_string($conn, $password);*/

    $sql0 =  "SELECT * FROM admin WHERE email='$email' AND password ='$password'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    
    if (($result->num_rows) > 0) {
      $id = $row['id'];
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $email;

        ?>
        <script>
        alert("Access Granted!");
        window.location = "admin.php";
        </script>
        <?php
    }
  
  else {
       ?>
        <script>
        alert("Access Denied.");
        </script>
        <?php
        }

      }
}
        ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    
    <link rel="stylesheet" href="css/main.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Administration Log In</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Administration</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post" role="form" id="signup-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" id="email" placeholder="Email" required name="email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" id="password" name="password">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" id="btn-signup"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
      </div>
    </section>
    
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>