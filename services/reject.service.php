<?php ini_set('max_execution_time', 0); ?>
<?php 
require_once('../config/dbh.inc.php');
if(isset($_POST['action']) && $_POST['action'] == 1){
	session_start();
	$user_id = $_SESSION['id'];
	session_write_close();
    $session_id = $_POST['session_id'];
    $message = $_POST['message'];
    $sql = "UPDATE mainjob SET status=6,comment='".$message."',reject_order=$user_id WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    if($result){
        require("phpmailer/PHPMailerAutoload.php");
        $sql = "SELECT request_by,no_id FROM mainjob WHERE session_id='$session_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $no_id = $row['no_id'];
        $create_doc_by = $row['request_by'];
        $sql = "SELECT email FROM member WHERE Id_member=$create_doc_by";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $mail = new PHPMailer;
        $mail->CharSet = "utf-8";
        $mail->Port = $port_mail;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->isSMTP();
        $mail->Host = $smtp_mail;
        $gmail_username = $username_email; // Email
        $gmail_password = $password_email; // Password

        $sender = "JOBORDER_SYSTEM"; // ชื่อผู้ส่ง
        $email_sender = "JOBORDER_SYSTEM"; // เมล์ผู้ส่ง
        $email_receiver = $row['email']; // เมล์ผู้รับ
        $email_eiei = $row['email'];
            
        $subject = "REJECT DOCUMENT ID : $no_id";
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
                    <h1 style='color:black; font-size: 18px; font-family: verdana;'>REJECT DOCUMENT ID : $no_id</h1>
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
                        cursor: pointer;' href='{$root}{$path}/index.php?p=reject_job&session_id={$session_id}'>Please click to process</a></h3>
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
                    "message"=>"True."
                ];
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
        "message"=>"True."
    ];
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

if(isset($_POST['action']) && $_POST['action'] == 4){
	session_start();
	$user_id = $_SESSION['id'];
	session_write_close();
    $session_id = $_POST['session_id'];
    $message = $_POST['comment'];
    $id_renew = $_POST['id_renew'];
    $sql = "UPDATE `mainjob` SET `status_renew`=0 WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    if($result){
        $sql = "UPDATE renew_detail SET remark_reject='$message', status=2,approved_by=$user_id WHERE id_renew=$id_renew";
        $result = $conn->query($sql);
        if($result){
            $request_by = $_POST['request_by'];
            $sql = "SELECT email,id_member FROM member WHERE id_member=$request_by";
            $result = $conn->query($sql);
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
						
					$subject = "REJECT ขอกำหนดวันเสร็จใหม่";
						 
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
								<title>REJECT DUE DATE</title>
							</head>
							<body>
								<meta charset=utf-8'/>
                                <h1 style='color:black; font-size: 18px; font-family: verdana;'>REJECT เอกสาร ขอกำหนดวันที่เสร็จใหม่</h1>
                                <p>$message</p>
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
    }else{
        $response = [
            "success"=>false,
            "message"=>"Failed."
        ];
    }
    echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 5){
	require("phpmailer/PHPMailerAutoload.php");
	$session_id = $_POST['session_id'];
	$no_id = $_POST['no_id'];
	session_start();
	$mgr1 = $_SESSION['mgr1'];
	$mgr2 = $_SESSION['mgr2'];
	session_write_close();
	$sql = "UPDATE mainjob SET status=0 WHERE session_id='$session_id'";
	$conn->query($sql);
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

            $sender = "JOBORDER_SYSTEM"; // ชื่อผู้ส่ง
            $email_sender = ""; // เมล์ผู้ส่ง
            $email_receiver = $row['email']; // เมล์ผู้รับ
            $email_eiei = $row['email'];
                
            $subject = "REQUEST APPROVED JOBORDER ID : $no_id"; // หัวข้อเมล์ ... $nextId คือ รหัสของ Document
                 
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
                    $response = $no_id;
                }   
            }
		}
	}
	$response = $no_id;
	
	echo $response;
}
?>