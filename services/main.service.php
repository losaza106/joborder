<?php 
require_once('../config/dbh.inc.php');
$sql = "SELECT * FROM mainjob ORDER BY no_id DESC";
if(isset($_POST['action']) && $_POST['action'] == 1){
	$result = $conn->query($sql);
	
	$data = [];
	$table = "";
	$td = "";
	while($row = mysqli_fetch_assoc($result)){
		$td .= "<tr>";
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
		$td .= "<td>".$row['no_id']."</td>";
		$td .= "<td>".$row['request_date']."</td>";
		$td .= "<td>".$row['due_date']."</td>";
		$td .= "<td>".$row['request_by']."</td>";
		$td .= "<td>".$row['received']."</td>";
		if($row['status'] == 0){
			$td .= "<td>รอ MANAGER APPROVED (ผู้ส่ง)</td>";
		}else if($row['status'] == 1){
			$td .= "<td>รอผู้รับ APPROVED</td>";
		}else if($row['status'] == 2){
			$td .= "<td>ปฎิเสธ</td>";
		}else if($row['status'] == 3){
			$td .= "<td>รอ MANAGER APPROVED (ผู้รับ)</td>";
		}else{
			$td .= "<td>สำเร็จ</td>";
		}
		$td .= "<td><button class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i> View</button></td>";
		$td .= "</tr>";
	}
	$table .= $td;
	echo $table;
}
?>