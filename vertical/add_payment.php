<?php
require "connection.php";

session_start();

$request_id = $_GET['id'];

if($request_id != null){}
{
    $query = "SELECT * from users where user_id = $request_id";
    $result = mysqli_query($conn, $query);
    
    
    while($data = mysqli_fetch_assoc($result))
    {
                $username = $data['username'];
                $user_id = $data['user_id'];
                $pay_status = "unpaid";
                $amount = 15000;

                $query = "INSERT INTO payments(username, user_id, amount, pay_status) values('$username','$user_id','$amount','$pay_status')";
                $result = mysqli_query($conn, $query);

            if($result)
            {
                header("location:payment.php");
            }
            else{
                echo "<script>alert('Payment not added'); </script>";
                header("location:users.php");
            }
        
    }
   
}



?>