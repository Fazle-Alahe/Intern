<?php
session_start();
require 'db.php' ;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['confirm_password'];
    $after_hash = password_hash($password, PASSWORD_DEFAULT);

    // $select_all = "SELECT * FROM user";
    
    $email_exist ="SELECT COUNT(*) AS total FROM user WHERE email ='$email'";
    $email_exist_result = mysqli_query($db_connect ,$email_exist);
    $after_assoc = mysqli_fetch_assoc($email_exist_result);

    date_default_timezone_set("Asia/Dhaka");
    $created_at = date("Y-m-d h:i:s");

    if(!$name && !$email){
        $_SESSION['info_err']= 'Please input your information';
        header('location:dashboard.php');
        // if
    }
    else{
        if($password != $con_password){
            $_SESSION['wrong_pass'] = 'Wrong cradentials';
            header('location:dashboard.php');
        }
        else{
            if($after_assoc['total'] == 1){
                $_SESSION['exist'] = 'This Email already Registered Yet';
                header('location:dashboard.php');
            }
            else{
                $after_hash = password_hash($password, PASSWORD_DEFAULT);
                
                $insert = "INSERT INTO user(name, email, password, created_at) VALUES('$name', '$email', '$after_hash', '$created_at')";
                mysqli_query($db_connect, $insert);

                
                $_SESSION['reg_success'] = 'Your Registration is Successful';
                header('location:dashboard.php');
            }
        }
    }
?>