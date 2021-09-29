<?php
include "connection.php";
include "count-request.php";

session_start();
if(isset($_SESSION['admin_user']))
{


 /*    error_reporting(0); */

 $query = "select * from approvals";

 $result = mysqli_query($conn, $query);

 $rows = mysqli_num_rows($result);


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
                                    <h4 class="page-title">Approvals</h4>
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Approvals</li>
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

                       
                        <!-- end row -->



                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">All Requests</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered m-0">

                                            <thead>
                                            <tr>
                                                <!-- <th>Profile</th> -->
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                
                                                <th>Address</th>
                                                
                                                <th>Approval</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                
                                                while( $data = mysqli_fetch_assoc($result))
                                                {

                                                
                                            ?>
                                                <tr>
                                                   <!--  <td>
                                                        <img src="assets/images/users/avatar-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                                                    </td> -->
    
                                                    <td>
                                                        <?php echo $data['user_id'] ?>
                                                    </td>

                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">
                                                            <?php echo $data['username'] ?>
                                                        </h5>
                                                       
                                                    </td>
    
                                                    <td>
                                                        <?php echo $data['age'] ?>
                                                    </td>
    
                                                    <td>
                                                         <?php echo $data['gender'] ?>
                                                    </td>

                                                <td>
                                                    <?php echo $data['phone'] ?>
                                                </td>
                                                <td>
                                                        <?php echo $data['mail'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data['uaddress'] ?>
                                                </td>
                                                <td>
                                                    <a href="approve_request.php?id=<?php echo $data['user_id'] ?>" class="btn btn-sm btn-custom"><i class=" mdi mdi-checkbox-multiple-marked-outline"></i></a>
                                                    <a href="delete_request.php?id=<?php echo $data['user_id'] ?>" class="btn btn-sm btn-danger"><i class="mdi mdi-close-box-outline "></i></a>
                                                </td>
                                            </tr>

                                            <?php
                                                }
                                            ?>
                                         

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                           
                        </div>
                        <!-- end row -->




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