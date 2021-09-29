<?php

require 'connection.php';
include "count-request.php";

session_start();
if(isset($_SESSION['admin_user']))
{

    $user_id = $_REQUEST['id'];

    if(isset($_POST['submit']))
    {
        $username = $_REQUEST['username'];
        $amount = $_REQUEST['amount'];
        $status = $_REQUEST['status'];
        $pay_date = $_REQUEST['pay_date'];
        $expiry = $_REQUEST['expiry'];

        $query = "UPDATE payments SET username ='$username', amount='$amount', pay_date='$pay_date', expiry='$expiry', pay_status='$status' where user_id ='$user_id'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header("location: payment.php");
        }
        else
        {
            header("location: payment_edit.php");
        }
    }


    $query = "SELECT * from payments WHERE user_id = $user_id";

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

        <!-- Modal -->
        <link href="../plugins/custombox/css/custombox.min.css" rel="stylesheet">

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
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <!-- <li class="hide-phone app-search">
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
                                    <h4 class="page-title">Payments</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Payments</li>
                                        <li class="breadcrumb-item active">Edit Payment</li>
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


                 <form class="form-horizontal mt-5" method="post" >

                    <?php

                    while($data = mysqli_fetch_assoc($result)) {


                    ?>


                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <label for="username">User Name</label>
                                    <input class="form-control" type="text" name="username" id="username" required="" value="<?php echo $data['username']?>">
                                </div>
                            </div> 

                            <div class="form-group row m-b-20 mt-3">
                                <div class="col-12">
                                    <label for="amount">Amount</label>
                                    <input class="form-control" name="amount" type="numer" id="amount" required="" value="<?php echo $data['amount']?>">
                                </div>
                            </div> 

                            <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="status">Payment Status</label>
                                    </div>
                                    <div class="col-12">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="paid">
                                            <label class="form-check-label" for="inlineRadio1">Paid</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="unpaid">
                                            <label class="form-check-label" for="inlineRadio2">Unpaid</label>
                                          </div>
                                    </div>
                                </div>

                            <div class="form-group row m-b-20 mt-3">
                                <div class="col-12">
                                    <label for="pay_date">Payment Date</label>
                                    <input class="form-control" name="pay_date" type="date" id="pay_date" required="" value="<?php echo $data['pay_date']?>">
                                </div>
                            </div> 

                            <div class="form-group row m-b-20 mt-3">
                                <div class="col-12">
                                    <label for="expiry">Expiry Date</label>
                                    <input class="form-control" name="expiry" type="date" id="expiry" required="" value="<?php echo $data['expiry']?>">
                                </div>
                            </div> 
                            
                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" name="submit" type="submit">Update Payment</button>
                                </div>
                            </div>

                            <?php
}
                            ?>
                        </form>


                      

                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer">
                  2018 © AMK-FITNESS. 
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Modal -->
        <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Add Members</h4>
            <div class="custom-modal-text text-left">
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" placeholder="Enter position">
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" placeholder="Enter company">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
                    </div>
                </form>
            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>


        <!-- Modal-Effect -->
        <script src="../plugins/custombox/js/custombox.min.js"></script>
        <script src="../plugins/custombox/js/legacy.min.js"></script>

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