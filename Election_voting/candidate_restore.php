<?php
session_start();
require 'db.php'; 

$id = $_GET['candidate_id'];
$restore = "UPDATE candidates SET deleted_at=0 WHERE id=$id";
mysqli_query($db_connect, $restore);

$_SESSION['restore'] = 'Candidate Restored!';
header("location:can_soft_delete_list.php");
?>