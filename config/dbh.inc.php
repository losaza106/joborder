<?php
    $host = "localhost"; // ชื่อ Host
    $user = "root"; // username ของ host
    $pass = ""; // password ของ host
    $dbname = "joborder"; // ชื่อฐานข้อมูล
    
    $conn = new mysqli($host,$user,$pass,$dbname);

    if(mysqli_connect_error()){
        echo 'เชื่อมต่อข้อมูลไม่สำเร็จ'.mysqli_connect_error();
    }else{
        
    }

    $path = "jo";

    $username_email = "info@local.com"; // Username Email
    $password_email = "1234"; // Password Eamil
    $smtp_mail = "192.168.100.21"; // Host SMTP
    $port_mail = 25; // PORT SMTP
?>