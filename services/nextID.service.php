<?php 
function extract_int($str){
    preg_match('/[^0-9]*([0-9]+)[^0-9]*/', $str, $regs);
    return (intval($regs[1]));
}
function nextId(){
    include "../config/dbh.inc.php";
    $sql = "SELECT * FROM temp_part ORDER BY temp_part DESC LIMIT 1";
    $result = $conn->query($sql);
    $sid = "TEMP";
    if($temp_id = $result->fetch_assoc()){
        $n = extract_int($temp_id['temp_part'])+1;
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
        $sql = "INSERT INTO `temp_part` (temp_part) VALUES ('$nextId')";
        $result = $conn->query($sql);
        $sql = "SELECT temp_part FROM temp_part ORDER BY temp_part DESC LIMIT 1";
        $result = $conn->query($sql);
        $nextTempID = $result->fetch_assoc();
        echo $nextTempID['temp_part'];
    }else{
        $nextId = "TEMP001"; // ตั้งค่าเริ่มต้น TEMP
        $sql = "INSERT INTO `temp_part` (temp_part) VALUES ('$nextId')";
        $result = $conn->query($sql);
        $sql = "SELECT temp_part FROM temp_part ORDER BY temp_part DESC LIMIT 1";
        $result = $conn->query($sql);
        $nextTempID = $result->fetch_assoc();
        echo $nextTempID['temp_part'];
    }
}
nextId();
?>