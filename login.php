<?php
session_start();
require_once 'conn.php';

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
  

    $uname = mysqli_real_escape_string($conn,$email);
    $pwd = mysqli_real_escape_string($conn, $password);

    $sql0 =  "SELECT * FROM users WHERE email='".$uname."' AND password ='".$pwd."'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    if (($result->num_rows) > 0) {
      
      $_SESSION['user_id'] = $id;
      $_SESSION['email'] = $email;

        ?>
        <script>
        alert("Access Granted!");
        window.location = "customer_home.php";
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
    
    <link rel="stylesheet" href="admin/css/main.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Log In</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>User</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" autofocus required name="email">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password" required>
          </div>
         
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
          <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                      Registered? <a href="signup.php" class="text-dark fw-bold"> Create an
                        Account</a>
                    </div>
        </form>
        
    </section>
    

    <?php
          function login($username, $password)
          {
              $password = md5($password);
              $q = connect()->query("SELECT * FROM users WHERE email = '$username' AND password = '$password'")->num_rows;
              if ($q == 1) return 1;
              return 0;
          }
          ?>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>








          
        
          
  
