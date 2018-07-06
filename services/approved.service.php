<?php 
	require_once('../config/dbh.inc.php');
	if(isset($_POST['action']) && $_POST['action'] == 1){
		session_start();
		$user_id = $_SESSION['id'];
		session_write_close();
		$session_id = $_POST['session_id'];
		$sql = "UPDATE mainjob SET status=1,approved_order='$user_id' WHERE session_id='$session_id'";
		$result = $conn->query($sql);
		if($result){
			// ส่งเมล์ไปหา คนรับด้วย....
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
	}
	echo json_encode($response);
?>