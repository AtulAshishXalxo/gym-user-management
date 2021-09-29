<?php
require "connection.php";

session_start();

$request_id = $_GET['id'];

if($request_id != null){}
{
    $query = "SELECT * from approvals where user_id = $request_id";
    $result = mysqli_query($conn, $query);
    
    
    while($data = mysqli_fetch_assoc($result))
    {
        $username = $data['username'];
        $age = $data['age'];
        $phone = $data['phone'];
        $gender = $data['gender'];
        $mail = $data['mail'];
        $address = $data['uaddress'];
    
        $query = "INSERT INTO users(username, age, phone, gender, mail, uaddress) values('$username','$age','$phone','$gender','$mail','$address')";
        $result = mysqli_query($conn, $query);
 
 /* 
           $query1 = "SELECT * FROM users WHERE user_id = '$request_id'";
            $result1 = mysqli_query($conn, $query1);

            
            while($data = mysqli_fetch_assoc($result1))
            {
                $username = $data['username'];
                $user_id = $data['user_id'];
                $pay_status = "unpaid";
                $amount = 15000;

                $query = "INSERT INTO payments(username, user_id, amount, pay_date, expiry, pay_status) values('$username','$user_id','$amount')";
                $result = mysqli_query($conn, $query);

                
            } */
            

            $query = "Delete from approvals where user_id = $request_id";

            $result = mysqli_query($conn, $query);

            if($result)
            {
                header("location:users.php");
            }
            else{
                echo "<script>alert('Approval not deleted'); </script>";
                header("location:payment.php");
            }
        
    }


    
$query = "delete from approvals where id = $request_id";

$result = mysqli_query($conn, $query);

if($result)
{
    header("location:users.php");
}
else{
    echo "<script>alert('Approval not deleted'); </script>";
}

   
}



?>