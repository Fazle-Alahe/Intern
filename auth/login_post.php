<?php
session_start();
require 'db.php' ;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_exist ="SELECT COUNT(*) AS total FROM user WHERE email ='$email'";
    $email_exist_result = mysqli_query($db_connect ,$email_exist);
    $after_assoc = mysqli_fetch_assoc($email_exist_result);
    

    if($after_assoc['total'] == 1){
        $_SESSION['old_email'] = $email;
        $user_pass = "SELECT * FROM user WHERE email='$email'";
        $user_pass_result = mysqli_query($db_connect, $user_pass);
        $after_assoc_pass = mysqli_fetch_assoc($user_pass_result);
        
        if(password_verify($password, $after_assoc_pass['password'])){
            $_SESSION['loged_in'] = 'Login Successfully';
            $_SESSION['id'] = $after_assoc_pass['id'];
            $_SESSION['roll'] = $after_assoc_pass['roll'];

            header('location:dashboard.php');
        }

        else{
            $_SESSION['wrong_pass'] = 'Wrong Password';
            $_SESSION['old_pass'] = $pass;
            header('location:login.php');
        }
        
        
        
        
        // header('location:dashboard.php');
        
    }
    else{
        $_SESSION['old_email'] = $email;
        $_SESSION['exist'] = 'Email does not Exist or Not Registered Yet';
        header('location:login.php');
    
    }
?>