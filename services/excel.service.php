<?php
$text_search = strtoupper($_POST['text_search']);
$objCSV = fopen("member.csv", "r");
$i = 0;
$array_obj = array(); 
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
    $serachBy = $_POST['Search_by'];
    $data = $objArr[$serachBy];
    
    if(strstr( $data , $text_search)){
        $serachBy = true;
    }else{
        $serachBy = false;
    }
    
    if($serachBy){
        $array_obj [$i]["PARTID"]= $objArr[0];
        $array_obj [$i]["D1"]= $objArr[1];
        $array_obj [$i]["D2"]= $objArr[2];
        $array_obj [$i]["ND"]= $objArr[3];
        $i++;
    }
}
?>

<?php

fclose($objCSV);

if(isset($array_obj) AND $array_obj != []){
    echo json_encode($array_obj);
}else{
    $response = [
        "success"=>false
    ];
    echo json_encode($response);
}
?>