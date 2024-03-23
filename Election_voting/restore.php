<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$restore = "UPDATE voter SET deleted_at=0 WHERE id=$id";
mysqli_query($db_connect, $restore);

$_SESSION['restore'] = 'Voter Restored!';
header("location:soft_delete_list.php");
?>