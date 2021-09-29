<?php
include "connection.php";

session_start();

$request_id = $_GET['id'];

$query = "Delete from payments where user_id = $request_id";

$result = mysqli_query($conn, $query);

if($result)
{
    header("location:payment.php");
}
else{
    echo "<script>alert('Approval not deleted'); </script>";
    header("location:payment.php");
}



?>