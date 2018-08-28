<?php ini_set('max_execution_time', 0); ?>
<?php 
session_start();
$user_id = $_SESSION['id'];
require_once('../config/dbh.inc.php');
if(isset($_POST['request_date']) AND $_POST['request_date'] != ""){
	$request_date = $_POST['request_date'];
	$request_date_FIELD = true;
}else{
    $request_date_FIELD = false;
}

if(isset($_POST['due_date']) AND $_POST['due_date'] != ""){
	$due_date = $_POST['due_date'];
	$due_date_FIELD = true;
}else{
    $due_date_FIELD = false;
}


if(isset($_POST['part_name']) AND $_POST['part_name'] != ""){
	$part_name_ar = $_POST['part_name'];
	$lastElement = end($part_name_ar);
	$part_name = "";
	for($i = 0;$i<count($part_name_ar);$i++){
		if($part_name_ar[$i] == $lastElement){
			$part_name .= $part_name_ar[$i];
		}else{
			$part_name .= $part_name_ar[$i].",";
		}
	}
	$part_name_FIELD = true;
}else{
    $part_name_FIELD = false;
}

if(isset($_POST['part_id']) AND $_POST['part_id'] != ""){
	$part_id_ar = $_POST['part_id'];
	$lastElement = end($part_id_ar);
	$part_id = "";
	for($i = 0;$i<count($part_id_ar);$i++){
		if($part_id_ar[$i] == $lastElement){
			$part_id .= $part_id_ar[$i];
		}else{
			$part_id .= $part_id_ar[$i].",";
		}
	}
	$part_id_FIELD = true;
}else{
    $part_id_FIELD = false;
}

if(isset($_POST['tool_name']) AND $_POST['tool_name'] != ""){
	$tool_name = $_POST['tool_name'];
	$tool_name_FIELD = true;
}else{
    $tool_name_FIELD = false;
}


if(isset($_POST['asset_id']) AND $_POST['asset_id'] != ""){
	$asset_id = $_POST['asset_id'];
	$asset_id_FIELD = true;
}else{
    $asset_id_FIELD = false;
}

if(isset($_POST['tool_type']) AND $_POST['tool_type'] != ""){
	$tool_type = $_POST['tool_type'];
	$tool_type_FIELD = true;
}else{
    $tool_type_FIELD = false;
}

if(isset($_POST['other_type']) AND $_POST['other_type'] != ""){
	$other_type = $_POST['other_type'];
	$other_type_FIELD = true;
}else{
    $other_type_FIELD = false;
}


if(isset($_POST['wt_new']) AND $_POST['wt_new'] != ""){
	$wt_new = $_POST['wt_new'];
	$wt_new_FIELD = true;
}else{
    $wt_new_FIELD = false;
}

if(isset($_POST['wt_replace']) AND $_POST['wt_replace'] != ""){
	$wt_replace = $_POST['wt_replace'];
	$wt_replace_FIELD = true;
}else{
    $wt_replace_FIELD = false;
}

if(isset($_POST['wt_other']) AND $_POST['wt_other'] != ""){
	$wt_other = $_POST['wt_other'];
	$wt_other_FIELD = true;
}else{
    $wt_other_FIELD = false;
}

if(isset($_POST['other_wt_form']) AND $_POST['other_wt_form'] != ""){
	$other_wt_form = $_POST['other_wt_form'];
	$other_wt_form_FIELD = true;
}else{
    $other_wt_form_FIELD = false;
}

if(isset($_POST['wt_modify']) AND $_POST['wt_modify'] != ""){
	$wt_modify = $_POST['wt_modify'];
	$wt_modify_FIELD = true;
}else{
    $wt_modify_FIELD = false;
}

if(isset($_POST['wt_sample']) AND $_POST['wt_sample'] != ""){
	$wt_sample = $_POST['wt_sample'];
	$wt_sample_FIELD = true;
}else{
    $wt_sample_FIELD = false;
}

if(isset($_POST['wt_sample_form']) AND $_POST['wt_sample_form'] != ""){
	$wt_sample_form = $_POST['wt_sample_form'];
	$wt_sample_form_FIELD = true;
}else{
    $wt_sample_form_FIELD = false;
}

if(isset($_POST['wt_repair']) AND $_POST['wt_repair'] != ""){
	$wt_repair = $_POST['wt_repair'];
	$wt_repair_FIELD = true;
}else{
    $wt_repair_FIELD = false;
}

if(isset($_POST['wt_pd']) AND $_POST['wt_pd'] != ""){
	$wt_pd = $_POST['wt_pd'];
	$wt_pd_FIELD = true;
}else{
    $wt_pd_FIELD = false;
}

if(isset($_POST['wt_pd_form']) AND $_POST['wt_pd_form'] != ""){
	$wt_pd_form = $_POST['wt_pd_form'];
	$wt_pd_form_FIELD = true;
}else{
    $wt_pd_form_FIELD = false;
}

if(isset($_POST['estimated']) AND $_POST['estimated'] != ""){
	$estimated = $_POST['estimated'];
	$estimated_FIELD = true;
}else{
    $estimated_FIELD = false;
}

if(isset($_POST['detail_work']) AND $_POST['detail_work'] != ""){
	$detail_work = $_POST['detail_work'];
	$detail_work_FIELD = true;
}else{
    $detail_work_FIELD = false;
}


if(isset($_POST['remark']) AND $_POST['remark'] != ""){
	$remark = $_POST['remark'];
	$remark_FIELD = true;
}else{
    $remark_FIELD = false;
}

if($_FILES['detail_file']['name'][0] != null){
    $filenaja = "";
	$lastElement = end($_FILES['detail_file']['name']);
    if(is_array($_FILES))  
    {  
		foreach($_FILES['detail_file']['name'] as $name => $value)  
        {  
			if($_FILES['detail_file']['name'][$name] == $lastElement){
				$file_name = explode(".", $_FILES['detail_file']['name'][$name]);  
				$new_name = $file_name[0] .'__'.rand().'.'. $file_name[1];  
				$sourcePath = $_FILES["detail_file"]["tmp_name"][$name];  
				$targetPath = "../upload/".$new_name;  
				move_uploaded_file($sourcePath, $targetPath); 
				$filenaja .= $new_name;
			}else{
				$file_name = explode(".", $_FILES['detail_file']['name'][$name]);  
				$new_name = $file_name[0] .'__'.rand().'.'. $file_name[1];  
				$sourcePath = $_FILES["detail_file"]["tmp_name"][$name];  
				$targetPath = "../upload/".$new_name;  
				move_uploaded_file($sourcePath, $targetPath); 
				$filenaja .= $new_name.",";
			}
            
        }   
    }  
    $File_Field = true;
	}else{
    $File_Field = false;
}



if(isset($_POST['received']) AND $_POST['received'] != ""){
	$received = $_POST['received'];
	$received_FIELD = true;
}else{
    $received_FIELD = false;
}

if($_FILES['attachedfile']['name'][0] != null){
    $filenaja2 = "";
	$lastElement = end($_FILES['attachedfile']['name']);
    if(is_array($_FILES))  
    {  
		foreach($_FILES['attachedfile']['name'] as $name => $value)  
        {  
			if($_FILES['attachedfile']['name'][$name] == $lastElement){
				$file_name = explode(".", $_FILES['attachedfile']['name'][$name]);  
				$new_name = $file_name[0] .'__'.rand().'.'. $file_name[1];  
				$sourcePath = $_FILES["attachedfile"]["tmp_name"][$name];  
				$targetPath = "../upload/".$new_name;  
				move_uploaded_file($sourcePath, $targetPath); 
				$filenaja2 .= $new_name;
			}else{
				$file_name = explode(".", $_FILES['attachedfile']['name'][$name]);  
				$new_name = $file_name[0] .'__'.rand().'.'. $file_name[1];  
				$sourcePath = $_FILES["attachedfile"]["tmp_name"][$name];  
				move_uploaded_file($sourcePath, $targetPath); 
				$filenaja2 .= $new_name.",";
			}
            
        }   
    }  
    $File_Field2 = true;
	}else{
    $File_Field2 = false;
}
$nextID = nextID();
$rand_id = rand().rand();
$sql = "INSERT INTO mainjob (no_id,".($request_date_FIELD ? "request_date ," : null).($due_date_FIELD ? "due_date ," : null).($part_name_FIELD ? "part_name ," : null).($part_id_FIELD ? "part_id ," : null).($tool_name_FIELD ? "tool_name ," : null).($asset_id_FIELD ? "asset_id ," : null).($tool_type_FIELD ? "tool_type ," : null).($other_type_FIELD ? "tool_type_other ," : null).($wt_new_FIELD ? "wt_new ," : null).($wt_replace_FIELD ? "wt_replace ," : null).($wt_other_FIELD ? "wt_other ," : null).($other_wt_form_FIELD ? "other_wt_form ," : null).($wt_modify_FIELD ? "wt_modify ," : null).($wt_sample_FIELD ? "wt_sample ," : null).($wt_sample_form_FIELD ? "wt_sample_form ," : null).($wt_repair_FIELD ? "wt_repair ," : null).($wt_pd_FIELD ? "wt_pd ," : null).($wt_pd_form_FIELD ? "wt_pd_form ," : null).($estimated_FIELD ? "estimated ," : null).($File_Field ? "detail_file ," : null).($received_FIELD ? "received ," : null).($detail_work_FIELD ? "detail_work ," : null).($remark_FIELD ? "remark ," : null).($File_Field2 ? "attachedfile ," : null)." session_id,request_by,status) VALUES ('".$nextID."',".($request_date_FIELD ? "'$request_date' ," : null).($due_date_FIELD ? "'$due_date' ," : null).($part_name_FIELD ? "'$part_name' ," : null).($part_id_FIELD ? "'$part_id' ," : null).($tool_name_FIELD ? "'$tool_name' ," : null).($asset_id_FIELD ? "'$asset_id' ," : null).($tool_type_FIELD ? "'$tool_type' ," : null).($other_type_FIELD ? "'$other_type' ," : null).($wt_new_FIELD ? "'$wt_new' ," : null).($wt_replace_FIELD ? "'$wt_replace' ," : null).($wt_other_FIELD ? "'$wt_other' ," : null).($other_wt_form_FIELD ? "'$other_wt_form' ," : null).($wt_modify_FIELD ? "'$wt_modify' ," : null).($wt_sample_FIELD ? "'$wt_sample' ," : null).($wt_sample_form_FIELD ? "'$wt_sample_form' ," : null).($wt_repair_FIELD ? "'$wt_repair' ," : null).($wt_pd_FIELD ? "'$wt_pd' ," : null).($wt_pd_form_FIELD ? "'$wt_pd_form' ," : null).($estimated_FIELD ? "'$estimated' ," : null).($File_Field ? "'$filenaja' ," : null).($received_FIELD ? "'$received' ," : null).($detail_work_FIELD ? "'$detail_work' ," : null).($remark_FIELD ? "'$remark' ," : null).($File_Field2 ? "'$filenaja2' ," : null)." $rand_id , $user_id,0)";

$result = $conn->query($sql);
if($result){
	require("phpmailer/PHPMailerAutoload.php");
	$sql = "SELECT * FROM temp_part ORDER BY temp_part DESC LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$lastTemp = $row['temp_part'];
	$sql = "DELETE FROM temp_part WHERE temp_part != '$lastTemp'";
	$result = $conn->query($sql);
	$sql = "SELECT MGR1,MGR2 FROM member WHERE id_member=$user_id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$mgr1 = $row['MGR1'];
	$mgr2 = $row['MGR2'];
	$sql = "SELECT email,id_member FROM member WHERE username='$mgr1' OR username='$mgr2'";
	$result = $conn->query($sql);
	if($result){
		while($row = $result->fetch_assoc()){
			$mail = new PHPMailer;
            $mail->CharSet = "utf-8";
            $mail->Port = $port_mail;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->isSMTP();
            $mail->Host = $smtp_mail;
            $gmail_username = $username_email; // Email
            $gmail_password = $password_email; // Password

            $sender = "SSS_SYSTEM"; // ชื่อผู้ส่ง
            $email_sender = ""; // เมล์ผู้ส่ง
            $email_receiver = $row['email']; // เมล์ผู้รับ
            $email_eiei = $row['email'];
                
            $subject = "REQUEST APPROVED JOBORDER ID : $nextID"; // หัวข้อเมล์ ... $nextId คือ รหัสของ Document
                 
            $mail->Username = $gmail_username;
            $mail->Password = $gmail_password;
            $mail->setFrom($email_sender, $sender);
            $mail->AddAddress($email_receiver);
            $mail->Subject = $subject;
            $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
            $email_content = "
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset=utf-8'/>
                        <title>APPROVED</title>
                    </head>
                    <body>
						<meta charset=utf-8'/>
						<h1 style='color:black; font-size: 18px; font-family: verdana;'>REQUEST APPROVED JOBORDER</h1>
						<br>
                        <h3 style='font-size: 14px; font-family: verdana;'><a style='font-size: 14px; font-family:verdana;'><a style='background-color: #008CBA;
                            border: none;
                            color: #FFFFFF;
                            padding: 15px 32px;
                            text-align: center;
                            -webkit-transition-duration: 0.4s;
                            transition-duration: 0.4s;
                            margin: 16px 0 !important;
                            text-decoration: none;
                            font-size: 16px;
                            cursor: pointer;' href='{$root}{$path}/index.php?p=approved&session_id={$rand_id}'>Please click to process</a></h3>
                    </body>
                </html>
            "; // ข้างบน คือข้อมูลที่จะส่งไปในเมล์ ในการส่งให้ APPROVED
            if($email_receiver){
                $mail->msgHTML($email_content);
                if (!$mail->send()) {  // สั่งให้ส่ง email
                    $response = [
                        "success"=>false,
                        "message"=>"Failed."
                    ];
                }else{
                    $response = $nextID;
                }   
            }
		}
	}
	$response = $nextID;
}else{
	$response = [
		"success"=>false,
		"message"=>"Failed."
	];
}

function extract_int($str){
    preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
    return (intval($regs[1]));
}
function nextId(){
    include "../config/dbh.inc.php";
    $sql = "SELECT no_id FROM mainjob ORDER BY no_id DESC LIMIT 1";
    $result = $conn->query($sql);
    $sid = "TEMP";
    if($temp_id = $result->fetch_assoc()){
        $n = extract_int($temp_id['no_id'])+1;
        $count_n = strlen($n);
        if($count_n == 1){
            $sid = "TEMP00".$n;
            $nextId = $sid;
        }else if($count_n == 2){
            $sid = "TEMP0".$n;
            $nextId = $sid;
        }else{
            $nextId = $sid.$n;
        }
        return $nextId;
    }else{
        $nextId = "TEMP001"; // ตั้งค่าเริ่มต้น TEMP
        return $nextId;
    }
}

echo $response;
?>