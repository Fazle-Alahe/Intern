<?php
session_start();
include 'db.php';


$id = $_GET['id'];
$soft_delete = "UPDATE voter SET deleted_at=1 WHERE id=$id";
mysqli_query($db_connect, $soft_delete);


$_SESSION['soft_delete'] = 'Voter Moved to soft delete section!';
header("location:voter_list.php");
?>