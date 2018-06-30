<?php 
require_once('../config/dbh.inc.php');
$username = $_POST['username'];
$password = $_POST['password'];
$response = [];

$sql = "SELECT * FROM member WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$username);
$stmt->execute();
$result = $stmt->get_result();
$checkUser = $result->num_rows;
if($checkUser = $result->num_rows){
    $row = $result->fetch_assoc();
    $checkPwd = $password === $row['password'];
    if($checkPwd){
        $response = [
            "success"=>true,
            "message"=>"Welcome."
        ];
        session_start();
        $_SESSION['id'] = $row['id_member'];
		$_SESSION['fullname'] = $row['fullname'];
        echo json_encode($response);
    }else{
        $response = [
            "success"=>false,
            "message"=>"Password Wrong."
        ];
        echo json_encode($response);
    }
}else{
    $response = [
        "success"=>false,
        "message"=>"User Not Found."
    ];
    echo json_encode($response);
}

?>