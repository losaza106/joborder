<?php 
require_once('../config/dbh.inc.php');

if(isset($_POST['action']) && $_POST['action'] == 1){
	if($_POST['search_by'] == 1){
		$sql = "SELECT * FROM mainjob WHERE no_id NOT LIKE '%TEMP%' ORDER BY no_id DESC";
	}else{
		$sql = "SELECT * FROM mainjob WHERE no_id LIKE '%TEMP%' ORDER BY no_id DESC";
	}
	$result = $conn->query($sql);
	$data = [];
	$td = '<thead>
	<tr>

	  <th>เลขที่</th>
	  <th>วันที่ร้องขอ</th>
	  <th>วันที่ต้องการเสร็จ</th>
	  <th>ผู้ส่ง</th>
	  <th>ผู้รับ</th>
	  <th>สถานะ</th>
	  <th style="width: 40px">#</th>
	</tr>
	<tr>
  </thead><tbody>';
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
			$td .= "<td>รอ Manager ของผู้รับ Approved</td>";
		}else if($row['status'] == 3){
			$td .= "<td>กำลังทำ</td>";
		}else if($row['status'] == 4){
			$td .= "<td>เสร็จแล้ว</td>";
		}else if($row['status'] == 5){
			$td .= "<td>ปิด</td>";
		}else{
			$td .= "<td>Reject</td>";
		}
		$session_id =$row['session_id'];
		$td .= "<td><a href='?p=view&session_id=$session_id' class='btn btn-info btn-sm'><i class='fa fa-eye' aria-hidden='true'></i> View</a><a target='_blank' href='pages/pdf.php?session_id=$session_id' class='btn btn-danger btn-sm'><i class='fa fa-file-pdf-o' aria-hidden='true'></i> PDF</a></td>";
		$td .= "</tr></tbody>";
	}
	echo $td;
}

if(isset($_POST['action']) && $_POST['action'] == 2){
	$sql = "SELECT * FROM mainjob WHERE no_id NOT LIKE '%TEMP%' ORDER BY no_id DESC";
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
		$session_id =$row['session_id'];
		$tool_type = $row['tool_type'];
		$tool_type_other = $row['tool_type_other'];
		$wt_new = $row['wt_new'];
		$wt_replace = $row['wt_replace'];
		$wt_other = $row['wt_other'];
		$wt_sample = $row['wt_sample'];
		$no_id = $row['no_id'];
		$wt_modify= $row['wt_modify'];
		$wt_sample_form = $row['wt_sample_form'];
		$wt_repair = $row['wt_repair'];
		$wt_pd =$row['wt_pd'];
		$other_wt_form= $row['other_wt_form'];
		$wt_pd_form = $row['wt_pd_form'];
		$tool_name=$row['tool_name'];
		$asset_id= $row['asset_id'];
		$part_id = $row['part_id'];
		$part_name =$row['part_name'];
		$td .= "<td><button tool_type='$tool_type' tool_type_other='$tool_type_other' wt_new='$wt_new' wt_replace='$wt_replace' wt_other='$wt_other' wt_modify='$wt_modify' wt_sample='$wt_sample' wt_sample_form='$wt_sample_form' wt_repair='$wt_repair' wt_pd='$wt_pd' other_wt_form='$other_wt_form' wt_pd_form='$wt_pd_form' tool_name='$tool_name' part_name='$part_name' asset_id='$asset_id' part_id='$part_id' no_id='$no_id' id='selectjob' class='btn btn-info'> <i class='fa fa-check' aria-hidden='true'></i></button></td>";
		$td .= "</tr>";
	}
	$table .= $td;
	echo $table;
}

if(isset($_POST['action']) && $_POST['action'] == 3){
	$sql22 = "SELECT working_record.create_by,working_record.id_w_record FROM working_record";
	$result22 = $conn->query($sql22);
	$tr = '<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username ที่สร้าง</th>
      <th scope="col">ชื่อผู้สร้าง</th>
      <th scope="col"></th>
    </tr>
  </thead><tbody>';
	if($result22){
        $i = 1;
        while($row22 = $result22->fetch_assoc()){
            $id_create =  $row22['create_by'];
            $sql23 = "SELECT username,fullname FROM member WHERE Id_member=$id_create";
            $result23 = $conn->query($sql23);
            $row23 = $result23->fetch_assoc();
            $username_create = $row23['username'];
            $fullname_create = $row23['fullname'];
            $id_w_record = $row22['id_w_record'];
            $tr .= "<tr>
            <th scope='row'>$i</th>
            <td>$username_create</td>
            <td>$fullname_create</td>
            <td><a href='?p=view_wr&id_w_record=$id_w_record' class='btn btn-info btn-sm'><i class='fa fa-eye' aria-hidden='true'></i> View</a><a href='pages/pdf_wr.php?session_id=$id_w_record' class='btn btn-danger btn-sm' target='_blank'><i class='fa fa-file-pdf-o' aria-hidden='true'></i> PDF</a></td>
          </tr></tbody>";
          $i++;
        }
	}
	echo $tr;
}
?>