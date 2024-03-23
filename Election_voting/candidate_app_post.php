<?php
session_start();
require "db.php";

$name = $_POST['name'];
$district = $_POST['district'];
$marka_name = $_POST['marka'];

$photo = $_FILES['photo'];
$after_explode =explode('.', $photo['name']);
$extension =end($after_explode);
$allowed_ext =array('jpg','JPG','jpeg', 'png', 'gif', 'webp');

$flag = false;

if(!$name){
  $flag = true;
  $_SESSION["name_err"]="Please enter candidate name";
}else{
  $_SESSION["old_name"]=$name;
}

if(!$district){
  $flag = true;
  $_SESSION["district_err"]="Please enter district name";
}else{
  $_SESSION["old_district"]=$district;
}
if(!$marka_name){
  $flag = true;
  $_SESSION["marka_err"]="Please enter marka name";
}else{
  $_SESSION["old_marka"]=$marka_name;
}
if(!$_FILES['photo']['name']){
  $flag = true;
  $_SESSION["photo_err"]="Please enter Marka Photo";
}


if($flag){
  header("location:candidate_application.php");
}
else{
  $_SESSION["old_name"]='';
  $_SESSION["old_district"]='';
  $_SESSION["old_marka"]='';

  if(in_array($extension, $allowed_ext)){
    $remove = array("@", "#" , "(", ")", '"' ,":","*", "'", "/" , " ") ;
    $file_name = str_replace($remove, '-',$name).".".$extension;
    $new_location ="uploads/marka/".$file_name ;
    move_uploaded_file($photo['tmp_name'], $new_location);
}

  $insert = "INSERT INTO candidates(name,district,marka_name,marka) VALUES('$name','$district','$marka_name', '$file_name')";
  mysqli_query($db_connect, $insert);
  $_SESSION["success"]= "Candidate registered successfully";
  header("location:candidate_application.php");

}




?>