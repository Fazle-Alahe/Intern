
<?php
session_start();
require 'db.php'; 

$id = $_GET['id'];
$delete = "Delete FROM voter WHERE id=$id";
mysqli_query($db_connect, $delete);

$_SESSION['delete'] = 'Voter Deleted Permanently!';
header("location:dashboard.php");
?>