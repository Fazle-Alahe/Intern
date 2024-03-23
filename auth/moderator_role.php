<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$moderator = "UPDATE user SET roll=3 WHERE id=$id";
mysqli_query($db_connect, $moderator);

$_SESSION['moderator_role'] = 'User has given Moderator role!';
header("location:dashboard.php");
?>