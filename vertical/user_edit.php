<?php

require 'connection.php';
include "count-request.php";

session_start();
if(isset($_SESSION['admin_user']))
{

$user_Id = $_GET['id'];

$query = "SELECT * FROM users where user_id = $user_Id";

$result = mysqli_query($conn, $query);

       
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>AMK-FITNESS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/akm_logo_small.png">
        
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.php" class="logo">
                            <span>
                                <img src="assets/images/amk_logo1.png" alt="" height="40">
                            </span>
                            <i>
                                <img src="assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="assets/images/dp.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5>
                        <?php 

                            $admin = $_SESSION['admin_user'];
                            $query1 = "SELECT * FROM admin where Mail = '$admin'";

                            $result1 = mysqli_query($conn, $query1);
                         while($data = mysqli_fetch_assoc($result1))
                        {
                            echo $data['Name'];
                        }
                         
                    ?>
                    
                    </h5>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="index.php">
                                    <i class="fi-air-play"></i> <span> Dashboard </span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="users.php">
                                    <i class="fi-share"></i> <span>Users</span>
                                </a>
                            </li>

                            <li>
                                <a href="payment.php">
                                    <i class="fi-layers"></i> <span> Payments </span>
                                </a>
                            </li>

                            <li>
                                <a href="request.php">
                                    <i class=" mdi mdi-file-document-box"></i> 
                                    
                                    <?php 
                                        if($rows_count)
                                        {
                                    ?>
                                    <span class="badge badge-danger badge-pill float-right">

                                    <!-- request count-->
                                    <?php 
                                        echo $rows_count;
                                        }
                                        else
                                        {}
                                    ?>        
                                    
                                    </span> 
                                    
                                    <span> Approvals </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                           <!--  <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li> -->

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/dp.jpg" alt="user" class="rounded-circle"> <span class="ml-1">
                                        
                                    <?php 

                                                $admin = $_SESSION['admin_user'];
                                                $query1 = "SELECT * FROM admin where Mail = '$admin'";

                                                $result1 = mysqli_query($conn, $query1);
                                                 while($data = mysqli_fetch_assoc($result1))
                                                {
                                                    echo $data['Name'];
                                                }
                                                 
                                            ?>
                                    
                                    
                                    <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                   
                                    <!-- item-->
                                    <a href="logout_check.php" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">User</h4>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="home">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Users</li>
                                                <li class="breadcrumb-item active">Edit User</li>
                                            </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col d-flex justify-content-end">

                        <?php 
                        
                            $query1 = "SELECT * from payments where user_id = '$user_Id'";
    
                            $result1 = mysqli_query($conn,$query1);
                            $row = mysqli_num_rows($result1);
                            
                            if($row == 0) {
                                ?>
                                <a href="add_payment.php?id=<?php echo $user_Id ?>"> Add Payment </a>


                                <?php
                            }
                            else{

                                ?>
                                <a href="payment.php"> <i class="text-secondary">Payment Details available</i> </a>
                                <?php
                            }



                                        ?>
                        </div>
                    </div>
                    


                    <form class="form-horizontal"  action="update_user.php?id=<?php echo $user_Id ?>" method="post">
                    <?php 
                        while($data = mysqli_fetch_assoc($result))
                        {
                    ?>

                            


                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="username">User Name</label>
                                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $data['username']?>">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="age">Age</label>
                                    <input class="form-control" type="number" name="age" id="age"  value="<?php echo $data['age']?>">
                                </div>
                            </div>

                            <input type="hidden" name="gender" value="<?php echo $data['gender']?>">


                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="phone">Phone </label>
                                    <input class="form-control" type="phone" name="phone" id="phone"  value="<?php echo $data['phone']?>">
                                </div> 
                            </div>
                            
                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" name="mail" id="emailaddress"  value="<?php echo $data['mail']?>">
                                </div>
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="address">Address</label>
                                    <input class="form-control" type="text" name="address" id="address"  value="<?php echo $data['uaddress']?>">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" name="submit" type="submit">Update User</button>
                                </div>
                            </div>

                            
                        <?php
                        }
                        ?>

                            

                        </form>
                        



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                    2021 © AMK-FITNESS. 
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="../plugins/flot-chart/curvedLines.js"></script>
        <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>

<?php
}
else{
    header("location:login.php");
}
?>