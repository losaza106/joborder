<?php 
$id= "WORK".date("ym")."1000";
$id_int= substr($id , -4)+1;
$id_string =(string)$id_int;
if(strlen($id_string) == 1){
	$id= "WORK".date("ym")."000".$id_int;
}else if(strlen($id_string) == 2){
	$id= "WORK".date("ym")."00".$id_int;
}else if(strlen($id_string) == 3){
	$id= "WORK".date("ym")."0".$id_int;
}else{
	$id= "WORK".date("ym").$id_int;
}
echo $id;
?>