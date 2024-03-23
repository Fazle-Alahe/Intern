<?php
session_start();
require "db.php";

$candidate_id = $_GET['candidate_id'];

$select_status = "SELECT * FROM candidates WHERE id = $candidate_id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);

$candidate_photo ="uploads/marka/".$select_status_assoc['marka'] ;
unlink($candidate_photo);

$delete = "DELETE FROM candidates WHERE id = $candidate_id";
mysqli_query($db_connect,$delete);
$_SESSION["delete"] = 'Candidate deleted!' ;
header("location:can_soft_delete_list.php");
?>