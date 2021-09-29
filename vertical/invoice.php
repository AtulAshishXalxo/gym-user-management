<?php

include "connection.php";
include "count-request.php";

session_start();
if(isset($_SESSION['admin_user']))
{

    $user_id = $_REQUEST['id'];

    $query = "SELECT * from payments where user_id = '$user_id'";

    $result = mysqli_query($conn, $query);
   
    $rows = mysqli_num_rows($result);
    while( $data = mysqli_fetch_assoc($result))
    {
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
                        <h5><a href="#"></a> 
                    
                        <?php 

                        $admin = $_SESSION['admin_user'];
                        $query1 = "SELECT * FROM admin where Mail = '$admin'";

                        $result1 = mysqli_query($conn, $query1);
                                                 while($rows = mysqli_fetch_assoc($result1))
                                                {
                                                    echo $rows['Name'];
                                                }
                                                 
                                            ?>
                    </h5>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
   <!--- Sidemenu -->
   <div id="sidebar-menu">

<ul class="metismenu" id="side-menu">

    <!--<li class="menu-title">Navigation</li>-->

    <li>
        <a href="index.php">
            <i class="fi-air-play"></i><span> Dashboard </span>
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
                                        while($da = mysqli_fetch_assoc($result1))
                                        {
                                            echo $da['Name'];
                                        }
                                        
                                    ?>
                                    
                                    <i class="mdi mdi-chevron-down"></i> </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                   
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
                                    <h4 class="page-title">Invoice </h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#">Payments</a></li>
                                        <li class="breadcrumb-item active">Invoice</li>
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
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="clearfix">
                                        <div class="float-left mb-3">
                                            <img src="assets/images/amk_logo1.png" alt="" height="32">
                                        </div>
                                        <div class="float-right">
                                            <h4 class="m-0 d-print-none">Invoice</h4>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="float-left mt-3">
                                                <p><b>Hello, <?php echo $data['username'] ?></b></p>
                                                <p class="text-muted">Thanks a lot because you keep using our service. Our gym
                                                    promises to provide high quality service for you as well as outstanding
                                                    customer service for every transaction. </p>
                                            </div>

                                        </div><!-- end col -->
                                        <div class="col-4 offset-2">
                                            <div class="mt-3 float-right">
                                            
                                                <p class="m-b-10"><strong>Order Date: </strong> <?php echo $data['pay_date']?></p>
                                                <p class="m-b-10"><strong>Order Status: </strong> <span class="badge badge-success"><?php echo $data['pay_status']?></span></p>
                                                <p class="m-b-10"><strong>Order ID: </strong><?php echo $data['payment_id'] ?></p>
                                              
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                   <!--  <div class="row mt-3">
                                        <div class="col-6">
                                            <h6>Billing Address</h6>

                                            <address class="line-h-24">
                                                Stanley Jones<br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>

                                        </div> -->
<!-- 
                                        <div class="col-6">
                                            <h6>Shipping Address</h6>

                                            <address class="line-h-24">
                                                Stanley Jones<br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>

                                        </div> -->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                    <tr><th>#</th>
                                                        <th>Product</th>
                                                        <th>Amount</th>
                                                        <th class="text-right">Total</th>
                                                    </tr></thead>
                                                    <tbody>

                                                    
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <b>Service</b> <br/>
                                                            <h6><?php echo $_SESSION['admin_user'] ?></h6>
                                                        </td>
                                                        <td class=""> <i class="mdi text-primary">&#8377; <?php echo $data['amount'] ?></i> </td>
                                                        <td class="text-right"> <i class="mdi text-primary">&#8377; <?php echo $data['amount'] ?></i> </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="clearfix pt-5">
                                                <h6 class="text-muted">Notes:</h6>

                                                <small>
                                                    All accounts are to be paid within 7 days from receipt of
                                                    invoice. To be paid by cheque or credit card or direct payment
                                                    online. If account is not paid within 7 days the credits details
                                                    supplied as confirmation of work undertaken will be charged the
                                                    agreed quoted fee noted above.
                                                </small>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <p><b>Sub-total</b></p>
                                                <h3> &#8377; <?php echo $data['amount'] ?></</h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="hidden-print mt-4 mb-4">
                                        <div class="text-right">
                                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                         <!--    <a href="#" class="btn btn-info waves-effect waves-light">Submit</a> -->
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                    2018 © Highdmin. - Coderthemes.com
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>

<?php
    }
}
else{
    header("location:login.php");
}
?>