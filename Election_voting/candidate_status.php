<?php
session_start();
require "db.php";

$candidate_id = $_GET['candidate_id'];

$status_check = "SELECT * FROM candidates WHERE id = $candidate_id";
$status_check_result = mysqli_query($db_connect, $status_check);
$status_assoc = mysqli_fetch_assoc($status_check_result);

if($status_assoc['status'] == 0){
  $update = "UPDATE candidates SET status = 1 WHERE id=$candidate_id";
  mysqli_query($db_connect, $update);
  header('location:candidate_application.php');
}else{
  $update = "UPDATE candidates SET status = 0 WHERE id=$candidate_id";
  mysqli_query($db_connect, $update);
  header('location:candidate_application.php');

}