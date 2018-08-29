<?php 
$id_pic = $_POST['id_pic'].',';
$session_id= $_POST['session_id'];
$id_pic_del = $_POST['id_pic'];
include "../config/dbh.inc.php";
$sql = "SELECT attachedfile FROM mainjob WHERE session_id='$session_id'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$pic_name = $data['attachedfile'];

$new_pic= str_replace($id_pic , '' , $pic_name);
$file = '../upload/'.$id_pic_del;
if (unlink($file))
{
$sql = "UPDATE mainjob SET attachedfile='$new_pic' WHERE session_id='$session_id'";
$result = $conn->query($sql);
if($result){
    $response = [
        "success" => true,
        "message" => "Success."
    ];
}else{
    $response = [
        "success" => false,
        "message" => "Failed."
    ];
}
}
else
{
    $response = [
        "success" => false,
        "message" => "Failed."
    ];
}

echo json_encode($response);
?>