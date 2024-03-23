<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$admin = "UPDATE user SET roll=1 WHERE id=$id";
mysqli_query($db_connect, $admin);

$_SESSION['admin_role'] = 'User has given Admin role!';
header("location:dashboard.php");
?>