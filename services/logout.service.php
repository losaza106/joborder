<?php 
session_start();
if(isset($_SESSION['id'])){
    session_unset();
    session_destroy();
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php">';
    exit();
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php">';
?>