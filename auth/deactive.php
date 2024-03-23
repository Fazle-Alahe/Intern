<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$deactive = "UPDATE user SET roll=0 WHERE id=$id";
mysqli_query($db_connect, $deactive);

$_SESSION['deactive'] = 'User Role Deactivated!';
header("location:dashboard.php");
?>