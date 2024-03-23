<?php
    $hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'election';

    $db_connect = mysqli_connect($hostname, $db_username, $db_password, $db_name);

    
    
// if (!$db_connect) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
//   echo "Connected successfully";
?>