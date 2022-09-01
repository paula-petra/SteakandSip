<?php
session_start();
include "connect.php";

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if(!empty($_POST['confirmBtn'])){
    echo"<script> alert('CHOSEN SLOT NOT AVAILABLE'); </script>";
    $firstName =$_GET['firstName'];
    // $lastName =$_POST['lastName'];
    // $phoneNumber =$_POST['phoneNumber'];
    // $email =$_POST['email'];
    // $occasion =$_POST['occasion'];
    // $specialRequests =$_POST['request'];
    // $date =$_POST['date3'];
    // $time =$_POST['time3'];
    // $no_ofGuests =$_POST['guests3'];

    echo $firstName;
    // echo $lastName;
    // echo $phoneNumber;
    // echo $email;
    // echo $occasion;
    // echo $specialRequests;
    // echo $date;
    // echo $time;
    // echo $no_ofGuests;
    // $firstName =$_GET['firstName'];
    // $lastName =$_GET['lastName'];
    // $phoneNumber =$_GET['phoneNumber'];
    // $email =$_GET['email'];
    // $occasion =$_GET['occasion'];
    // $specialRequests =$_GET['request'];
    // $date =$_GET['date3'];
    // $time =$_GET['time3'];
    // $no_ofGuests =$_GET['guests3'];

//     console_log($firstName);

    // $check1 = mysqli_query($conn, "SELECT * FROM booking WHERE `date`='$date' AND `time` = '$time' ");

    // if(mysqli_num_rows($check1)!=0){
    //     echo"<script> alert('CHOSEN SLOT NOT AVAILABLE'); </script>";
    // }else{
    //     echo"<script> alert('CHOSEN SLOT IS AVAILABLE'); </script>";


    // extract($_POST);
    
    $sql01 = mysqli_query($conn, "SELECT * FROM booking  ORDER BY id DESC LIMIT 1");
    if($sql01){
    $sql02 = mysqli_fetch_assoc($sql01);
    $number = $sql02['id'];}else{$number=1;}
    $bookingid = 'RS'.(strval($number +1));

    $sql03 = mysqli_query($conn, "SELECT * FROM users  ORDER BY id DESC LIMIT 1");
    if($sql03){
    $sql04 = mysqli_fetch_assoc($sql03);
    $num = $sql04['id'];}else{$num=1;}
    $userid = 'user'.(strval($num +1));

    console_log($user_id);

    // $stmt = "INSERT INTO `booking`(`id`, `booking_id`, `user_id`, `date`, `time`, `no_ofGuests`, `occasion`, `special_requests`) VALUES (null, '$bookingid', '$user_id', '$date','$time','$no_ofGuests', '$occasion', '$specialRequests')";

    $stmt = "INSERT INTO `booking`(`id`, `booking_id`, `user_id`, `date`, `time`, `no_ofGuests`, `occasion`, `special_requests`) VALUES (null, '$user_id', 'j34', '2022-09-05','14:00','2 guests', 'None', 'nill')";
    mysqli_query ($conn, $stmt);

    // $stmt2 = mysqli_query($conn, "INSERT INTO `users`(`id`, `user_id`, `firstName`, `lastName`, `phoneNo`, `email`) VALUES (null,'$userid','$firstName','$lastName','$phoneNumber','$email')");

    $stmt2 = mysqli_query($conn, "INSERT INTO `users`(`id`, `user_id`, `firstName`, `lastName`, `phoneNo`, `email`) VALUES (null,'$user_id','Paula','Petra','12345','pen@gmail.com')");


    echo 'operation complete';

}
?>

