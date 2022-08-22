<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$stmt = "INSERT INTO `contactForm`(`id`, `name`, `email`, `subject`, `message`) VALUES (null,'$name','$email', '$subject', '$message')";
$s=mysqli_query ($conn, $stmt);


?>