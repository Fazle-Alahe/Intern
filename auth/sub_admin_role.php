<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$sub_admin = "UPDATE user SET roll=2 WHERE id=$id";
mysqli_query($db_connect, $sub_admin);

$_SESSION['sub_admin_role'] = 'User has given Sub Admin role!';
header("location:dashboard.php");
?>