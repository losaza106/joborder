<?php 
session_start();
if(isset($_SESSION['id'])){
    session_unset();
    session_destroy();
    echo 'login.php?clear=1';
    exit();
}
?>