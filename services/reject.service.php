<?php 
require_once('../config/dbh.inc.php');
if(isset($_POST['action']) && $_POST['action'] == 1){
	session_start();
	$user_id = $_SESSION['id'];
	session_write_close();
    $session_id = $_POST['session_id'];
    $message = $_POST['message'];
    $sql = "UPDATE mainjob SET status=2,comment='".$message."',approved_order=$user_id WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    if($result){
        $response = [
            "success"=>true,
            "message"=>"Success."
        ];
    }else{
        $response = [
            "success"=>false,
            "message"=>"Failed."
        ];
    }
    echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 2){
    $session_id = $_POST['session_id'];
    session_start();
	$user_id = $_SESSION['id'];
	session_write_close();
    $sql = "UPDATE mainjob SET status=3 WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    if($result){
        $response = [
            "success"=>true,
            "message"=>"Success."
        ];
    }else{
        $response = [
            "success"=>false,
            "message"=>"Failed."
        ];
    }
    echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 3){
	session_start();
	$user_id = $_SESSION['id'];
	session_write_close();
    $session_id = $_POST['session_id'];
    $message = $_POST['message'];
    $sql = "UPDATE mainjob SET status=5,comment2='".$message."',approved_received=$user_id WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    if($result){
        $response = [
            "success"=>true,
            "message"=>"Success."
        ];
    }else{
        $response = [
            "success"=>false,
            "message"=>"Failed."
        ];
    }
    echo json_encode($response);
}
?>