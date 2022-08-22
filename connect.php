<?php
    $sname ="localhost";
    $email ="root";
    $password ="";

    $db_name ="steakrestaurant";

    $conn = mysqli_connect($sname,$email,$password,$db_name);

    if (!$conn){
        echo "connection failed";
    }