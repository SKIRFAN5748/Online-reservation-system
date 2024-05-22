<?php
session_start();
include 'conn.php';
?>
<?php
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $cpassword = $_POST['cpassword'];
  $password = $_POST['password'];
  if (!isset($name, $phone, $email, $password, $cpassword) || ($password != $cpassword)) {  ?>
        <script>
                alert("Ensure you fill the form properly.");
        </script>
  <?php
  }else
  {
    //Check if email exists
  $sql2 = mysqli_query($conn,"SELECT * from users where email = '$_POST[email]'");
  if(mysqli_num_rows($sql2)>0){
  ?>
<script>
alert("Email already exists!");
</script>
<?php
}
elseif  ($_POST['password']!=$_POST['cpassword']){?>

  <script>
alert("Password does not match.");
</script>
<?php
}
else
{ 
   $sql = mysqli_query($conn,"INSERT INTO users(name,email,password,phone) values ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[phone]')");
  {
    ?><script>
  alert("Congratulations.\nYou are now registered.");
  window.location = 'login.php';
  </script>
  <?php
  }
    }
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
    <title>Signup</title>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4" method="post">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" class="form-control" required  name="name"  />
                            <label class="form-label" for="form3Example1c">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" id="form3Example3c" class="form-control"required  name="email"   />
                            <label class="form-label" for="form3Example3c">Your Email</label>
                          </div>
                        </div>
                        
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example4c" class="form-control"required name="phone" />
                            <label class="form-label" for="form3Example4c">Contact Number</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4c" class="form-control"required  name="password"  />
                            <label class="form-label" for="form3Example4c">Password</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4cd" class="form-control" required name="cpassword" />
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                          </div>
                        </div>

      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" id="btn-signup" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script scr="bootstrap/js/jquery.js"></script>
      <script scr="bootstrap/js/bootstrap.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="bootstrap/js/mdb.min.js"></script>
</body>
</html>