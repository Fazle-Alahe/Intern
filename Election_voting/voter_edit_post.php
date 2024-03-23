<?php
session_start();
require 'db.php';

$id = $_GET['id'];
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
// $gender = $_POST['gender'];
// photo
$photo = $_FILES['photo'];
$explode = explode('.', $photo['name']);
$extension = end($explode);

$nid_no =$_POST['nid'];



$select_status = "SELECT * FROM voter WHERE id = $id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);


if(!$_FILES['photo']['name']){

  $update = "UPDATE voter SET name = '$name' , father_name = '$fathers_name' , mother_name = '$mothers_name' , email = '$email' ,
   phone = '$phone' , nid_no = '$nid_no' , birth_date = '$date' , division = '$division' , district = '$district', sub_district = '$sub_district'  WHERE id = $id";
  mysqli_query($db_connect, $update);
  $_SESSION["update"]="Voter Info Updated ";
  header("location:voter_edit.php?id=$id");
}
else{

  $voter_photo ="/uploads/voter/".$select_status_assoc['photo'] ;
  unlink($voter_photo);

  $after_explode =explode('.', $photo['name']);
  $extension =end($after_explode);
  $allowed_ext =array('jpg','jpeg', 'png', 'gif', 'webp');

  if(in_array($extension, $allowed_ext)){
    $file_name = 'nid'.'-'.$nid.".".$extension;
    $new_location ="/uploads/voter/".$file_name ;
    move_uploaded_file($photo['tmp_name'], $new_location);
  }

  $update = "UPDATE voter SET name = '$name' , father_name = '$fathers_name' , mother_name = '$mothers_name' , email = '$email' ,
   phone = '$phone' , nid_no = '$nid_no' , birth_date = '$date' , division = '$division' , district = '$district', sub_district = '$sub_district', photo = '$file_name'  WHERE id = $id";
  mysqli_query($db_connect, $update);
  $_SESSION["update"]="Voter Info Updated ";
  header("location:voter_edit.php?id=$id");
}



?>