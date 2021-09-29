<?php
include "connection.php";

session_start();

$request_id = $_GET['id'];

$query = "delete from approvals where id = $request_id";

$result = mysqli_query($conn, $query);

if($result)
{
    header("location:request.php");
}
else{
    echo "<script>alert('Approval not deleted'); </script>";
}



?>