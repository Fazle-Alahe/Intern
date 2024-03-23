
<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$restore = "UPDATE user SET status=0 WHERE id=$id";
mysqli_query($db_connect, $restore);

$_SESSION['restore'] = 'User Restored!';
header("location:dashboard.php");
?>