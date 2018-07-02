<?php 
require_once('../config/dbh.inc.php');
$sql = "SELECT * FROM mainjob ORDER BY no_id DESC";
if(isset($_POST['action']) && $_POST['action'] == 1){
	$result = $conn->query($sql);
	$data = [];
	while($row = mysqli_fetch_assoc($result)){
        $request_by = $row['request_by'];
        $sql = "SELECT fullname FROM member WHERE Id_member=$request_by";
        $result2 = $conn->query($sql);
        $row2 = $result2->fetch_assoc();
		$name_request = $row2['fullname'];
		
		$received = $row['received'];
		$sql = "SELECT fullname FROM member WHERE Id_member=$received";
        $result3 = $conn->query($sql);
        $row3 = $result3->fetch_assoc();
		$name_received = $row3['fullname'];
		
		$row['request_by'] = $name_request;
		$row['received'] = $name_received;
        array_push($data,$row);
    }
	
	echo json_encode($data);
}
?>