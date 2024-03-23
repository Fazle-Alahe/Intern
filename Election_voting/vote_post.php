<?php
session_start();
require "db.php";

$candidate_id = $_GET['candidate_id'];
$voter_id = $_GET['id'];
$name = $_GET['name'];
$marka_name = $_GET['marka_name'];
$marka = $_GET['marka'];
$district = $_GET['district'];



$candidate = "SELECT * FROM candidates WHERE id = $candidate_id";
$candidate_result = mysqli_query($db_connect,$candidate);
$candidate_assoc =mysqli_fetch_assoc($candidate_result);


$insert = "INSERT into votes(candidate_id,voter_id,name,marka_name,marka,district)VALUES('$candidate_id','$voter_id','$name','$marka_name','$marka','$district')";
mysqli_query($db_connect,$insert);

$votes = $candidate_assoc['vote']+1;

$update_vote = "UPDATE candidates SET vote = $votes WHERE id = $candidate_id";
mysqli_query($db_connect,$update_vote);

$update_voter = "UPDATE voter SET status = 1 WHERE id = $voter_id";
mysqli_query($db_connect,$update_voter);


header("location:dashboard.php?id=$voter_id")
?>