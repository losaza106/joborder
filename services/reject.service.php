<?php 
require_once('../config/dbh.inc.php');
if(isset($_POST['action']) && $_POST['action'] == 1){
    $session_id = $_POST['session_id'];
    $message = $_POST['message'];
    $sql = "UPDATE mainjob SET status=2,comment='".$message."' WHERE session_id='$session_id'";
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