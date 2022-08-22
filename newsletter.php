<?php
session_start();
include "connect.php";

$fullName = $_POST['fullName'];
$email = $_POST['email'];

$stmt = "INSERT INTO `newsletter`(`id`, `fullName`, `email`) VALUES (null,'$fullName','$email')";
$s=mysqli_query ($conn, $stmt);

$stmt = "SELECT * FROM `newsletter` WHERE email ='$email'  ";
$s=mysqli_query ($conn, $stmt);

if(mysqli_num_rows($s)>0){
    header("Location: index.html?error=The Email Is Already In Use ");
}

?>