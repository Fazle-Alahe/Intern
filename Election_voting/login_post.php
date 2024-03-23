<?php
session_start();
include 'db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];


$name_check = "SELECT COUNT(*) AS total FROM voter WHERE name='$name' AND phone='$phone'";
$name_check_result = mysqli_query($db_connect, $name_check);
$name_assoc = mysqli_fetch_assoc($name_check_result);


$getID = "SELECT * FROM voter WHERE phone='$phone'";
$getID_result = mysqli_query($db_connect, $getID);
$getID_assoc = mysqli_fetch_assoc($getID_result);
// echo $name_assoca['id'];
// die;

// phone number check
$phone_code = '+88';
$cnct_phone = $phone_code.$phone;
$phone_check = "SELECT COUNT(*) AS total FROM voter WHERE phone='$phone'||phone='$cnct_phone'";
$phone_check_result = mysqli_query($db_connect, $phone_check);
$after_assoc = mysqli_fetch_assoc($phone_check_result);

$auth = false;

if(!$name){
    $auth = true;
    $_SESSION['name_err'] = 'Enter your name.';
}
else{
    if($name_assoc['total'] == 0){
        $auth = true;
        $_SESSION['name_exist'] = 'Name does not exists,Please enter the same name with which you registered.';
        $_SESSION['old_name'] = $name;
    }
}


if(!$phone){
    $auth = true;
    $_SESSION['phone_err'] = 'Enter your phone.';
}
else{
    if($after_assoc['total'] == 0){
        $auth =true;
        $_SESSION['phone_exist'] = 'Phone number does not exists.';
        $_SESSION['old_phone'] = $phone;
    }
}


if($auth){
    header('location:login.php');
}
else{
    $_SESSION['loged_in'] = 'You are logged in successfully.';
    $_SESSION['id'] = $getID_assoc['id'];
    header('location:dashboard.php');
}
?>