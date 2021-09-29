<?php

$localhost = "localhost";
$user = "root";
$password = "";
$db = "amk_fitness_db";

$conn = mysqli_connect($localhost,$user,$password,$db);

if($conn == false) 
{
    die ("<script>alert('error:cannot connect')</script>" );
}



?>