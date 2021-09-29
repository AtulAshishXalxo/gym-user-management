<?php

require 'connection.php';

session_start();




if(isset($_POST['submit']))
{

    $user_id = $_GET['id'];

    $username = $_REQUEST['username'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    $phone = $_REQUEST['phone'];
    $mail = $_REQUEST['mail'];
    $address = $_REQUEST['address'];

    $query = "UPDATE users SET username ='$username', age='$age', phone='$phone', gender ='$gender', mail='$mail', uaddress='$address' where user_id ='$user_id'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        header('location:users.php');
    }
    else
    {
        echo 'not inserted';
    }

}
 

?>