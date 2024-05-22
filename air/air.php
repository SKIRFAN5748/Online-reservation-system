<?php
include "../conn.php";
session_start();
$_SESSION['user_id'];

?>

<!DOCTYPE html> 
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Airlines booking </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../s.css">
     <link rel="stylesheet" href="../train/fstyle.css">
     <link rel="stylesheet" href="../train/style.css">
     <link rel="stylesheet" href="css/stylee.css">
   </head>
<body>
   <div class="sidebar">
     <div class="logo_content">
       <div class="logo">
         <div class="logo_name">AIRLINES TICKET BOOKING</div>
       </div>
       <i class='bx bx-menu' id="btn"></i>
     </div>
     <ul class="nav_list">
       <li>
        <a href="#">
            <i class='bx bx-home' ></i>
         <span class="links_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
       <li>
         <a href="air.php?page=book">
          <i class='bx bx-plus-circle'></i>
          <span class="links_name">Book Flight Tickets</span>
         </a>
         <span class="tooltip">Book Flight Tickets</span>
       </li>
       <li>
        <a href="air.php?page=view">
            <i class='bx bx-list-ul' ></i>
         <span class="links_name">View Booked Flight Tickets</span>
        </a>
        <span class="tooltip">View Booked Flight Tickets</span>
      </li>
      <li>
        <a href="air.php?page=cancel">
            <i class='bx bxs-conversation'></i>
         <span class="links_name">Cancel Booked Tickets</span>
        </a>
        <span class="tooltip">Cancel Booked Tickets</span>
      </li>
      <li>
        <a href="../customer_home.php">
            <i class='bx bx-arrow-back' ></i>
         <span class="links_name">Back</span>
        </a>
        <span class="tooltip">Back</span>
      </li>
     </ul>
   </div>

   <div class="home_content"style="background: url('../images/a2.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<?php

if (!isset($_GET['page']))
    include '../train/index.php';
elseif ($_GET['page'] == 'book')
    include 'book_tickets.php';
elseif ($_GET['page'] == 'availableflights')
    include 'view_flights_form_handler.php';
  elseif ($_GET['page'] == 'book2')
    include 'book_tickets2.php';
  elseif ($_GET['page'] == 'view')
    include 'view_booked_tickets.php';
  elseif ($_GET['page'] == 'cancel')
    include 'cancel_booked_tickets.php';
  elseif ($_GET['page'] == 'payment')
    include 'payment_details.php';

    
?>
</div>


   <script src="../train/main.js"></script>
    <script src="../train/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../train/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="..//train/dist/js/adminlte.min.js"></script>
    <script src="../trainplugins/jquery/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="../train/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../train/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../train/dist/js/demo.js"></script>
    <script src="../train/dist/js/pages/dashboard3.js"></script>



    <script>
    $(function(){
        $("#example1").DataTable();
    });
    </script>

   

</body>
</html>

