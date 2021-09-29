<?php
include "connection.php";

session_start();

$request_id = $_GET['id'];

$query = "delete from users where user_id = $request_id";

$result = mysqli_query($conn, $query);

if($result)
{
    header("location:users.php");
}
else{
    echo "<script>alert('Approval not deleted'); </script>";
}



?>