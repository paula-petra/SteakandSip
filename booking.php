<?php
session_start();
include "connect.php";


if(isset($_POST['submit'])){
    $date2 =$_POST['date'];
    $time =$_POST['time2'];
    $no_ofGuests =$_POST['guests2'];


    $check1 = mysqli_query($conn, "SELECT * FROM booking WHERE `date`='$date2' AND `time` = '$time' ");

    if($check1){
        echo"<script> alert('CHOSEN SLOT NOT AVAILABLE'); </script>";
    }else{
        echo"<script> alert('CHOSEN SLOT IS AVAILABLE'); </script>";
    }

    
    $sql01 = mysqli_query($conn, "SELECT * FROM booking  ORDER BY id DESC LIMIT 1");
    $sql02 = mysqli_fetch_assoc($sql01);
    $number = $sql02['id'];
    $bookingid = 'RS'.(strval($number +1));

    $stmt = "INSERT INTO `booking`(`id`, `booking_id`, `date`, `time`, `no_ofGuests`) VALUES (null, '$bookingid','$date2','$time','$no_ofGuests')";
    $s=mysqli_query ($conn, $stmt);

}
else{

    echo "lavalava";
}
?>