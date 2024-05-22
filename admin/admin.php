<?php
      include '../conn.php';
      
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Administration</title>
    <link rel="stylesheet" href="style.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <link rel="stylesheet" href="../homecss/a.css">
    <link rel="stylesheet" href="../s.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='fas fa-users-cog'></i>
            <span class="logo_name">Administration</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="admin.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class="app-menu__icon fa fa-subway"></i>
                        <span class="link_name">Train</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Train</a></li>
                    <li><a href="admin.php?page=dynamic"><i class="icon fa fa-calendar"></i>Schedule</a></li>
                    <li><a href="admin.php?page=route"><i class="icon fa fa-route"></i>Routes</a></li>
                    <li><a href="admin.php?page=train"><i class="icon fa fa-train"></i>Trains</a></li>
                    <li><a href="admin.php?page=report"><i class="icon fa fa-file-pdf"></i>Report</a></li>
                    <li><a href="admin.php?page=payment"><i class="icon fa fa-dollar-sign"></i>Payments</a></li>
                    <li><a href="admin.php?page=search"><i class="icon fa fa-search"></i>Search</a></li>
                    <li><a href="admin.php?page=feedback"><i class="icon fa fa-comments"></i>Feedback</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='fa fa-plane'></i>
                        <span class="link_name">AIRLINES</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">AIRLINES</a></li>
                    <li><a href="admin.php?page=allflight"><i class="bx bxs-detail"></i>All Flight & AIRCRAFTS Details</a></li>
                    <li><a href="admin.php?page=add"><i class="icon fa fa-plus"></i>Add Flight Schedule Details</a></li>
                    <li><a href="admin.php?page=sub"><i class="icon fa fa-minus"></i>Delete Flight Schedule Details</a></li>
                    <li><a href="admin.php?page=jetadd"><i class="icon fa fa-plane"></i>Add Aircrafts Details</a></li>
                    <li><a href="admin.php?page=jetact"><i class="icon fas fa-lock-open"></i>Activate Aircraft</a></li>
                    <li><a href="admin.php?page=jetdea"><i class="icon fa fa-lock"></i>Deactivate Aircraft</a></li>
                    <li><a href="admin.php?page=view"><i class="icon fa fa-search"></i> View List of Booked Tickets for a Flight</a></li>
                </ul>
            </li>
            <li>
                <a href="admin.php?page=users">
                    <i class="app-menu__icon fas fa-users"></i>
                    <span class="link_name">Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Users</a></li>
                </ul>
            </li>
            
            <li>
                <a href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="link_name">Log Out</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../logout.php">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>


    <section class="home-section">

        <?php
            if (!isset($_GET['page']))
                include 'index.php';
            elseif ($_GET['page'] == 'route')
                include 'train/route.php';
            elseif ($_GET['page'] == 'dynamic')
                include 'train/dynamic_schedule.php';
            elseif ($_GET['page']=='users')
                include 'users.php';
            elseif ($_GET['page']=='train')
                include 'train/train.php';
            elseif($_GET['page']=='report')
                include 'train/report.php';
            elseif($_GET['page']=="payment")
                include 'train/sales.php';
            elseif($_GET['page']=='feedback')
                include 'train/feedback.php';
            elseif ($_GET['page'] == 'search')
                include 'train/search.php';
                //air
            elseif ($_GET['page'] == 'add')
                include 'air/add_flight_details.php';
            elseif($_GET['page']=='jetadd')
                include 'air/add_jet_details.php';
            elseif($_GET['page']=='jetact')
                include 'air/activate_jet_details.php';
            elseif($_GET['page']=='jetdea')
                include 'air/deactivate_jet_details.php';
            elseif($_GET['page']=='view')
                include 'air/admin_view_booked_tickets.php';
            elseif($_GET['page']=='allflight')
                include 'air/all_flight_details.php';
            elseif($_GET['page']=='alljet')
                include 'air/all_jet_details.php';
            elseif($_GET['page']=='sub')
                include 'air/delete_flight_details.php';
            elseif($_GET['page']=='busm')
                include 'bus/manageBuses.php';
            
                
        ?>


    </section>


    <script src="script.js"></script>
    <script scr="../bootstrap/js/bootstrap.js"></script>
    <script scr="../bootstrap/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(function() {
        $("#example1").DataTable();
    });
    </script>
    
</body>

</html>