<?php 
	require_once('../config/dbh.inc.php');
	if(isset($_POST['action']) && $_POST['action'] == 1){
		session_start();
		$user_id = $_SESSION['id'];
		session_write_close();
		$session_id = $_POST['session_id'];
		$no_id = $_POST['no_id'];
		$sql = "UPDATE mainjob SET status=1,approved_order='$user_id' WHERE session_id='$session_id'";
		$result = $conn->query($sql);
		if($result){
			$received = $_POST['received'];
			$sql = "SELECT email,id_member FROM member WHERE id_member=$received";
			$result = $conn->query($sql);
			if($result){
				require("phpmailer/PHPMailerAutoload.php");
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
						
					$subject = "REQUEST APPROVED JOBORDER ID : $no_id";
						 
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
									cursor: pointer;' href='{$root}{$path}/index.php?p=approved&session_id={$session_id}'>Please click to process</a></h3>
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
							$response = [
								"success"=>true,
								"message"=>"Success."
							];
						}  
						
					}
				}
			}
		}else{
			$response = [
                "success"=>false,
                "message"=>"Failed."
            ];
		}
		echo json_encode($response);
	}

	if(isset($_POST['action']) && $_POST['action'] == 2){
		require("phpmailer/PHPMailerAutoload.php");
		session_start();
		$user_id = $_SESSION['id'];
		session_write_close();
		$session_id = $_POST['session_id'];
		$no_id = $_POST['no_id'];
		$sql = "UPDATE mainjob SET status=2 WHERE session_id='$session_id'";
		$result = $conn->query($sql);
		if($result){
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
						
					$subject = "REQUEST APPROVED JOBORDER ID : $no_id";
						 
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
									cursor: pointer;' href='{$root}{$path}/index.php?p=approved&session_id={$session_id}'>Please click to process</a></h3>
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
							$response = [
								"success"=>true,
								"message"=>"Success."
							];
						}  
						
					}
				}
				
			}else{
				$response = [
					"success"=>false,
					"message"=>"Failed."
				];
			}
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
		$session_id = $_POST['session_id'];
		$no_id = $_POST['no_id'];
		$id = extract_int($no_id);
		session_start();
		$user_id = $_SESSION['id'];
		session_write_close();
		$sql = "UPDATE mainjob SET status=3,no_id='$id',approved_received=$user_id WHERE session_id='$session_id'";	
		$result = $conn->query($sql);
		if($result){
			$req = $_POST['req'];
			$sql = "SELECT email,id_member FROM member WHERE id_member=$req";
			$result = $conn->query($sql);
			if($result){
				require("phpmailer/PHPMailerAutoload.php");
				while($row = $result->fetch_assoc()){
					$mail = new PHPMailer;
					$mail->CharSet = "utf-8";
					$mail->Port = $port_mail;
					$mail->SMTPSecure = 'tls';
					$mail->SMTPAuth = true;
					$mail->isSMTP();
					$mail->Host = $smtp_mail;
					$gmail_username = $username_email;
					$gmail_password = $password_email; 
		
					$sender = "JOBORDER_SYSTEM"; 
					$email_sender = ""; 
					$email_receiver = $row['email'];
					$email_eiei = $row['email'];
						
					$subject = "CREATE DOCUMENT SUCCESS ID : $id";
						 
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
								<h1 style='color:black; font-size: 18px; font-family: verdana;'>CREATE DOCUMENT SUCCESS | ID : $id</h1>
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
									cursor: pointer;' href='{$root}{$path}/index.php?p=view&session_id={$session_id}'>View</a></h3>
							</body>
						</html>
					"; 
					if($email_receiver){
						$mail->msgHTML($email_content);
						if (!$mail->send()) {
							$response = [
								"success"=>false,
								"message"=>"Failed."
							];
						}else{
							$response = [
								"success"=>true,
								"message"=>"Success.",
								"id"=>$id
							];
						}  
						
					}
				}
			}else{
				$response = [
					"success"=>false,
					"message"=>"Failed."
				];
			}
		}else{
			$response = [
				"success"=>false,
				"message"=>"Failed."
			];
		}
		echo json_encode($response);
	}

	if(isset($_POST['action']) && $_POST['action'] == 4){
		$req = $_POST['req'];
		$no_id = $_POST['no_id'];
		$session_id = $_POST['session_id'];
		$sql = "UPDATE mainjob SET status=4 WHERE session_id='$session_id'";
		$result = $conn->query($sql);
		if($result){
			$sql = "SELECT email,id_member FROM member WHERE id_member=$req";
			$result = $conn->query($sql);
			if($result){
				require("phpmailer/PHPMailerAutoload.php");
				while($row = $result->fetch_assoc()){
					$mail = new PHPMailer;
					$mail->CharSet = "utf-8";
					$mail->Port = $port_mail;
					$mail->SMTPSecure = 'tls';
					$mail->SMTPAuth = true;
					$mail->isSMTP();
					$mail->Host = $smtp_mail;
					$gmail_username = $username_email;
					$gmail_password = $password_email; 
		
					$sender = "JOBORDER_SYSTEM"; 
					$email_sender = "";
					$email_receiver = $row['email'];
					$email_eiei = $row['email'];
						
					$subject = "[FINISH] DOCUMENT SUCCESS ID : $no_id";
						 
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
								<h1 style='color:black; font-size: 18px; font-family: verdana;'>[FINISH] DOCUMENT SUCCESS | ID : $no_id</h1>
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
									cursor: pointer;' href='{$root}{$path}/index.php?p=approved&session_id={$session_id}'>Click to Close Job.</a></h3>
							</body>
						</html>
					"; 
					if($email_receiver){
						$mail->msgHTML($email_content);
						if (!$mail->send()) {
							$response = [
								"success"=>false,
								"message"=>"Failed."
							];
						}else{
							$response = [
								"success"=>true,
								"message"=>"Success.",
								"id"=>$id
							];
						}  
						
					}
				}
			}
			
		}else{
			$response = [
				"success"=>false,
				"message"=>"Failed."
			];
		}
		echo json_encode($response);
	}
	
	function extract_int($str){
		preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
		$count_n = strlen((intval($regs[1])));
        if($count_n == 1){
            $sid = "J00".(intval($regs[1]));
            $nextId = $sid;
        }else if($count_n == 2){
            $sid = "J0".(intval($regs[1]));
            $nextId = $sid;
        }else{
            $nextId = "J".(intval($regs[1]));
        }
        return $nextId;
	}
?>