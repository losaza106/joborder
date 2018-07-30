<?php 
$data = json_decode(file_get_contents('php://input'), true);
var_dump($data);
if($data["tool_tpye"] != ""){
    require_once('../config/dbh.inc.php');
}
?>