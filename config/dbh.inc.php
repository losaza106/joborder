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

    $username_email = "poiuytrewqq1061@gmail.com"; // Username Email
    $password_email = "023892138a"; // Password Eamil
    $smtp_mail = "smtp.gmail.com"; // Host SMTP
    $port_mail = 587; // PORT SMTP
?>