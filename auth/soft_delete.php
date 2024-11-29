
<?php
session_start();
require 'db.php'; 

date_default_timezone_set("Asia/Dhaka");
$deleted_at = date("Y-m-d h:i:s");

$id = $_GET['id'];
$soft_delete = "UPDATE user SET status=1, deleted_at='$deleted_at' WHERE id=$id";
mysqli_query($db_connect, $soft_delete);


$_SESSION['soft_delete'] = 'User moved to trash!';
header("location:dashboard.php");
?>