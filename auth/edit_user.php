
<?php
session_start();
require 'db.php';
$id = $_GET['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);


date_default_timezone_set("Asia/Dhaka");
$updated_at = date("Y-m-d h:i:s");

// echo $id,$name,$after_hash;
if(!$name || !$password){
    $_SESSION['info_err']= 'Please input your information';
    header('location:edit.php');

}
else{
    if($password != $confirm_password){
        $_SESSION['wrong_pass'] = 'Wrong cradentials';
        header("location:edit.php?id=$id");
    }
    else{
        $update = "UPDATE user SET name='$name',password='$after_hash', updated_at='$updated_at' WHERE id=$id";
        mysqli_query($db_connect, $update);

        $_SESSION['update'] = 'Profile updated successfully';
        header("location:edit.php?id=$id");
    }
}

?>

