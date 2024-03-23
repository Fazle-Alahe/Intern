<?php
session_start();
include 'db.php';


$id = $_GET['candidate_id'];
$soft_delete = "UPDATE candidates SET deleted_at=1 , status=1 WHERE id=$id";
mysqli_query($db_connect, $soft_delete);


$_SESSION['soft_delete'] = 'Candidate Moved to soft delete section!';
header("location:candidate_application.php");
?>