<?php
session_start();
require 'db.php';

$name = $_POST['name'];
$fathers_name = $_POST['fathers_name'];
$mothers_name = $_POST['mothers_name'];
$email = $_POST['email'];
// $password = $_POST['password'];
$phone = $_POST['phone'];
$division = $_POST['division'];
$district = $_POST['district'];
$sub_district = $_POST['sub_district'];
$date = $_POST['date'];
$gender = $_POST['gender'];
// photo
$photo = $_FILES['photo'];
$explode = explode('.', $photo['name']);
$extension = end($explode);

// nid_no
$nid_no = str_replace('-','',($date.rand(1000,9999)));
// echo $nid_no;

// phone number check
$phone_code = '+88';
$cnct_phone = $phone_code.$phone;
$phone_check = "SELECT COUNT(*) AS total FROM voter WHERE phone='$phone'||phone='$cnct_phone'";
$phone_check_result = mysqli_query($db_connect, $phone_check);
$after_assoc = mysqli_fetch_assoc($phone_check_result);

// email & name check
$user_check = "SELECT COUNT(*) AS total FROM voter WHERE email='$email'";
$user_check_result = mysqli_query($db_connect, $user_check);
$user_assoc = mysqli_fetch_assoc($user_check_result);
// echo $after_assoc['total'];
// die;
$flag = false;
// name
if(isset($_SESSION['loged_in'])){
    $flag = true;
    $_SESSION['logout_frst'] = 'Please back to dashboard.You have to logout first.';
}
if(!$name){
    $flag = true;
    $_SESSION['name_err'] = 'Enter your name.';
}
else{
    $_SESSION['old_name'] = $name;
}

// fathers_name
if(!$fathers_name){
    $flag = true;
    $_SESSION['fname_err'] = "Enter your father's name.";
}
else{
    $_SESSION['old_fname'] = $fathers_name;
}

// mothers_name
if(!$mothers_name){
    $flag = true;
    $_SESSION['mname_err'] = "Enter your mother's name.";
}
else{
    $_SESSION['old_mname'] = $mothers_name;
}

// email
if(!$email){
    $flag = true;
    $_SESSION['email_err'] = "Enter your email.";
}
else{
    if($user_assoc['total']==1){
        $flag = true;
        $_SESSION['email_exist'] = "This email account is already registered!";
    }
    $_SESSION['old_email'] = $email;
}


// phone
if(!$phone){
    $flag = true;
    $_SESSION['phone_err'] = "Enter your phone number.";
}
else{
    if($after_assoc['total']==1){
        $flag = true;
        $_SESSION['phone_exist'] = "This phone number is already registered!";
    }
    $_SESSION['old_phone'] = $phone;
}


// division
if(!$division){
    $flag = true;
    $_SESSION['division_err'] = "Enter your division name.";
}
else{
    $_SESSION['old_division'] = $division;
}


// district
if(!$district){
    $flag = true;
    $_SESSION['district_err'] = "Enter your district name.";
}
else{
    $_SESSION['old_district'] = $district;
}


// sub_district
if(!$sub_district){
    $flag = true;
    $_SESSION['sub_district'] = "Enter your sub_district/upazila name.";
}
else{
    $_SESSION['old_sub_district'] = $sub_district;
}


// date
if(!$date){
    $flag = true;
    $_SESSION['date_err'] = "Enter your birth date.";
}
else{
    $_SESSION['old_date'] = $date;
}


// gender
if(!$gender){
    $flag = true;
    $_SESSION['gender_err'] = "Select your gender.";
}
else{
    $_SESSION['old_gender'] = $gender;
}


// photo
if(!$_FILES['photo']['name']){
    $flag = true;
    $_SESSION["photo_err"]="Please choose your Photo";
  }
  else{
    $file_name = $name.$date.'.'.$extension;
    $location = 'uploads/voter/'.$file_name;
    move_uploaded_file($photo['tmp_name'], $location);
  }

if($flag){
    header('location:registration.php');
}
else{
    $insert = "INSERT INTO voter(name, father_name, mother_name, email, phone, nid_no, division, district, sub_district, birth_date, gender, photo)
    VALUES('$name', '$fathers_name', '$mothers_name', '$email', '$phone', '$nid_no', '$division', '$district', '$sub_district', '$date', '$gender', '$file_name')";
    mysqli_query($db_connect, $insert);

    $_SESSION["success"]="Congratulations!!You are registered successfully";
    header('location:registration.php');

}
?>