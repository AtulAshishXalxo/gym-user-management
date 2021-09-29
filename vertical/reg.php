<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    $username = $_REQUEST['username'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $phone = $_REQUEST['phone'];
    $mail = $_REQUEST['mail'];
    $address = $_REQUEST['address'];

    $query = "INSERT INTO approvals(username, age, phone, gender, mail, uaddress) values('$username','$age','$phone','$gender','$mail','$address')";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        header('location:request.php');
    }
    else
    {
        echo 'not inserted';
    }
    
}

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


    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('assets/images/fit5.jpg');background-size: cover;background-position: center;">
            <h2 class="text-uppercase pb-4 mt-4">
                <a href="index.php" class="text-success">
                    <span><img src="assets/images/amk_logo2.png" alt="" height="60"></span>
                </a>
            </h2>
        </div>

        <div class="wrapper-page account-page-full">

            <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box mt-3">
                            

                            <form class="form-horizontal" method="POST">

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="username">Full Name</label>
                                        <input class="form-control" type="text" name="username" id="username" required="" placeholder="Michael Zenaty">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="age">Age</label>
                                        <input class="form-control" type="number" name="age" id="age" required="" placeholder="28">
                                    </div>
                                </div>


                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="gender">Gender</label>
                                    </div>
                                    <div class="col-12">
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other">
                                            <label class="form-check-label" for="inlineRadio3">Other</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="phone">Phone </label>
                                        <input class="form-control" type="phone" name="phone" id="phone" placeholder="6286588887">
                                    </div>
                                </div>
                                
                               

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="mail" id="emailaddress" required="" placeholder="john@deo.com">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="address">Address</label>
                                        <input class="form-control" type="text" name="address" id="address" required="" placeholder="Shivajinagar, Bangaluru">
                                    </div>
                                </div>


                                <div class="form-group row ">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" name="submit" type="submit">Register</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>

                </div>
            </div>
            
            <div class="m-t-40 text-center">
                <p class="account-copyright">2021 © AMK-FITNESS. </p>
            </div>

        </div>



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