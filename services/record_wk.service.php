<?php 
$data = json_decode(file_get_contents('php://input'), true);
/* var_dump($data); */
require_once('../config/dbh.inc.php');

// Create Variable
$tool_type= $data["tool_tpye"];
$tool_type_other = $data["tool_type_other"];
$wt_new = $data["wt_new"];
$wt_replace = $data["wt_replace"];
$wt_sample = $data["wt_sample"];
$wt_sample_form = $data["wt_sample_form"];
$wt_other = $data["wt_other"];
$wt_other_form = $data["wt_other_form"];
$wt_modify = $data["wt_modify"];
$wt_repair = $data["wt_repair"];
$wt_production = $data["wt_production"];
$wt_pd_form = $data["wt_pd_form"];
$tool_name = $data["tool_name"];
$part_id = $data["part_id"];
$asset_id = $data["asset_id"];
$part_name = $data["part_name"];
$no_id = $data["no_id"];

if($no_id == ""){
	$sql = "SELECT no_id FROM working_record WHERE no_id LIKE 'WORK%'";
	$result = $conn->query($sql);
	if($num_row = $result->num_rows > 0){
		$row = $result->fetch_assoc();
		$no_id_get = $row['no_id'];
		$id_int= substr($no_id_get , -4)+1;
		$id_string =(string)$id_int;
if(strlen($id_string) == 1){
	$no_id = "WORK".date("ym")."000".$id_int;
}else if(strlen($id_string) == 2){
	$no_id = "WORK".date("ym")."00".$id_int;
}else if(strlen($id_string) == 3){
	$no_id = "WORK".date("ym")."0".$id_int;
}else{
	$no_id = "WORK".date("ym").$id_int;
}
}else{
	$no_id = "WORK".date("ym")."0000";
}
//Record Working #1
$Date_1 = $data["Date_1"];
$From_1 = $data["From_1"];
$To_1 = $data["To_1"];
$CNC_Milling_1 = $data["CNC_Milling_1"];
$EDM_1 = $data["EDM_1"];
$Drilling_1 = $data["Drilling_1"];
$Grinding_1 = $data["Grinding_1"];
$Lathe_1 = $data["Lathe_1"];
$Milling_1 = $data["Milling_1"];
$Other_1 = $data["Other_1"];
$W_T_1_1 = $data["W_T_1_1"];
$O_T_1_1 = $data["O_T_1_1"];
$W_T_2_1 = $data["W_T_2_1"];
$O_T_2_1 = $data["O_T_2_1"];
$W_T_3_1 = $data["W_T_3_1"];
$O_T_3_1 = $data["O_T_3_1"];
$W_T_4_1 = $data["W_T_4_1"];
$O_T_4_1 = $data["O_T_4_1"];
$W_T_5_1 = $data["W_T_5_1"];
$O_T_5_1 = $data["O_T_5_1"];
$W_T_6_1 = $data["W_T_6_1"];
$O_T_6_1 = $data["O_T_6_1"];
$W_T_7_1 = $data["W_T_7_1"];
$O_T_7_1 = $data["O_T_7_1"];
$Remark_1=  $data["Remark_1"];
// #1

//Record Working #2
$Date_2 = $data["Date_2"];
$From_2 = $data["From_2"];
$To_2 = $data["To_2"];
$CNC_Milling_2 = $data["CNC_Milling_2"];
$EDM_2 = $data["EDM_2"];
$Drilling_2 = $data["Drilling_2"];
$Grinding_2 = $data["Grinding_2"];
$Lathe_2 = $data["Lathe_2"];
$Milling_2 = $data["Milling_2"];
$Other_2 = $data["Other_2"];
$W_T_1_2 = $data["W_T_1_2"];
$O_T_1_2 = $data["O_T_1_2"];
$W_T_2_2 = $data["W_T_2_2"];
$O_T_2_2 = $data["O_T_2_2"];
$W_T_3_2 = $data["W_T_3_2"];
$O_T_3_2 = $data["O_T_3_2"];
$W_T_4_2 = $data["W_T_4_2"];
$O_T_4_2 = $data["O_T_4_2"];
$W_T_5_2 = $data["W_T_5_2"];
$O_T_5_2 = $data["O_T_5_2"];
$W_T_6_2 = $data["W_T_6_2"];
$O_T_6_2 = $data["O_T_6_2"];
$W_T_7_2 = $data["W_T_7_2"];
$O_T_7_2 = $data["O_T_7_2"];
$Remark_2=  $data["Remark_2"];
// #2

//Record Working #3
$Date_3 = $data["Date_3"];
$From_3 = $data["From_3"];
$To_3 = $data["To_3"];
$CNC_Milling_3 = $data["CNC_Milling_3"];
$EDM_3 = $data["EDM_3"];
$Drilling_3 = $data["Drilling_3"];
$Grinding_3 = $data["Grinding_3"];
$Lathe_3 = $data["Lathe_3"];
$Milling_3 = $data["Milling_3"];
$Other_3 = $data["Other_3"];
$W_T_1_3 = $data["W_T_1_3"];
$O_T_1_3 = $data["O_T_1_3"];
$W_T_2_3 = $data["W_T_2_3"];
$O_T_2_3 = $data["O_T_2_3"];
$W_T_3_3 = $data["W_T_3_3"];
$O_T_3_3 = $data["O_T_3_3"];
$W_T_4_3 = $data["W_T_4_3"];
$O_T_4_3 = $data["O_T_4_3"];
$W_T_5_3 = $data["W_T_5_3"];
$O_T_5_3 = $data["O_T_5_3"];
$W_T_6_3 = $data["W_T_6_3"];
$O_T_6_3 = $data["O_T_6_3"];
$W_T_7_3 = $data["W_T_7_3"];
$O_T_7_3 = $data["O_T_7_3"];
$Remark_3=  $data["Remark_3"];
// #3

//Record Working #4
$Date_4 = $data["Date_4"];
$From_4 = $data["From_4"];
$To_4 = $data["To_4"];
$CNC_Milling_4 = $data["CNC_Milling_4"];
$EDM_4 = $data["EDM_4"];
$Drilling_4 = $data["Drilling_4"];
$Grinding_4 = $data["Grinding_4"];
$Lathe_4 = $data["Lathe_4"];
$Milling_4 = $data["Milling_4"];
$Other_4 = $data["Other_4"];
$W_T_1_4 = $data["W_T_1_4"];
$O_T_1_4 = $data["O_T_1_4"];
$W_T_2_4 = $data["W_T_2_4"];
$O_T_2_4 = $data["O_T_2_4"];
$W_T_3_4 = $data["W_T_3_4"];
$O_T_3_4 = $data["O_T_3_4"];
$W_T_4_4 = $data["W_T_4_4"];
$O_T_4_4 = $data["O_T_4_4"];
$W_T_5_4 = $data["W_T_5_4"];
$O_T_5_4 = $data["O_T_5_4"];
$W_T_6_4 = $data["W_T_6_4"];
$O_T_6_4 = $data["O_T_6_4"];
$W_T_7_4 = $data["W_T_7_4"];
$O_T_7_4 = $data["O_T_7_4"];
$Remark_4=  $data["Remark_4"];
// #4

//Record Working #5
$Date_5 = $data["Date_5"];
$From_5 = $data["From_5"];
$To_5 = $data["To_5"];
$CNC_Milling_5 = $data["CNC_Milling_5"];
$EDM_5 = $data["EDM_5"];
$Drilling_5 = $data["Drilling_5"];
$Grinding_5 = $data["Grinding_5"];
$Lathe_5 = $data["Lathe_5"];
$Milling_5 = $data["Milling_5"];
$Other_5 = $data["Other_5"];
$W_T_1_5 = $data["W_T_1_5"];
$O_T_1_5 = $data["O_T_1_5"];
$W_T_2_5 = $data["W_T_2_5"];
$O_T_2_5 = $data["O_T_2_5"];
$W_T_3_5 = $data["W_T_3_5"];
$O_T_3_5 = $data["O_T_3_5"];
$W_T_4_5 = $data["W_T_4_5"];
$O_T_4_5 = $data["O_T_4_5"];
$W_T_5_5 = $data["W_T_5_5"];
$O_T_5_5 = $data["O_T_5_5"];
$W_T_6_5 = $data["W_T_6_5"];
$O_T_6_5 = $data["O_T_6_5"];
$W_T_7_5 = $data["W_T_7_5"];
$O_T_7_5 = $data["O_T_7_5"];
$Remark_5=  $data["Remark_5"];
// #5

//Record Working #6
$Date_6 = $data["Date_6"];
$From_6 = $data["From_6"];
$To_6 = $data["To_6"];
$CNC_Milling_6 = $data["CNC_Milling_6"];
$EDM_6 = $data["EDM_6"];
$Drilling_6 = $data["Drilling_6"];
$Grinding_6 = $data["Grinding_6"];
$Lathe_6 = $data["Lathe_6"];
$Milling_6 = $data["Milling_6"];
$Other_6 = $data["Other_6"];
$W_T_1_6 = $data["W_T_1_6"];
$O_T_1_6 = $data["O_T_1_6"];
$W_T_2_6 = $data["W_T_2_6"];
$O_T_2_6 = $data["O_T_2_6"];
$W_T_3_6 = $data["W_T_3_6"];
$O_T_3_6 = $data["O_T_3_6"];
$W_T_4_6 = $data["W_T_4_6"];
$O_T_4_6 = $data["O_T_4_6"];
$W_T_5_6 = $data["W_T_5_6"];
$O_T_5_6 = $data["O_T_5_6"];
$W_T_6_6 = $data["W_T_6_6"];
$O_T_6_6 = $data["O_T_6_6"];
$W_T_7_6 = $data["W_T_7_6"];
$O_T_7_6 = $data["O_T_7_6"];
$Remark_6=  $data["Remark_6"];
// #6

//Record Working #7
$Date_7 = $data["Date_7"];
$From_7 = $data["From_7"];
$To_7 = $data["To_7"];
$CNC_Milling_7 = $data["CNC_Milling_7"];
$EDM_7 = $data["EDM_7"];
$Drilling_7 = $data["Drilling_7"];
$Grinding_7 = $data["Grinding_7"];
$Lathe_7 = $data["Lathe_7"];
$Milling_7 = $data["Milling_7"];
$Other_7 = $data["Other_7"];
$W_T_1_7 = $data["W_T_1_7"];
$O_T_1_7 = $data["O_T_1_7"];
$W_T_2_7 = $data["W_T_2_7"];
$O_T_2_7 = $data["O_T_2_7"];
$W_T_3_7 = $data["W_T_3_7"];
$O_T_3_7 = $data["O_T_3_7"];
$W_T_4_7 = $data["W_T_4_7"];
$O_T_4_7 = $data["O_T_4_7"];
$W_T_5_7 = $data["W_T_5_7"];
$O_T_5_7 = $data["O_T_5_7"];
$W_T_6_7 = $data["W_T_6_7"];
$O_T_6_7 = $data["O_T_6_7"];
$W_T_7_7 = $data["W_T_7_7"];
$O_T_7_7 = $data["O_T_7_7"];
$Remark_7=  $data["Remark_7"];
// #7

//Record Working #8
$Date_8 = $data["Date_8"];
$From_8 = $data["From_8"];
$To_8 = $data["To_8"];
$CNC_Milling_8 = $data["CNC_Milling_8"];
$EDM_8 = $data["EDM_8"];
$Drilling_8 = $data["Drilling_8"];
$Grinding_8 = $data["Grinding_8"];
$Lathe_8 = $data["Lathe_8"];
$Milling_8 = $data["Milling_8"];
$Other_8 = $data["Other_8"];
$W_T_1_8 = $data["W_T_1_8"];
$O_T_1_8 = $data["O_T_1_8"];
$W_T_2_8 = $data["W_T_2_8"];
$O_T_2_8 = $data["O_T_2_8"];
$W_T_3_8 = $data["W_T_3_8"];
$O_T_3_8 = $data["O_T_3_8"];
$W_T_4_8 = $data["W_T_4_8"];
$O_T_4_8 = $data["O_T_4_8"];
$W_T_5_8 = $data["W_T_5_8"];
$O_T_5_8 = $data["O_T_5_8"];
$W_T_6_8 = $data["W_T_6_8"];
$O_T_6_8 = $data["O_T_6_8"];
$W_T_7_8 = $data["W_T_7_8"];
$O_T_7_8 = $data["O_T_7_8"];
$Remark_8=  $data["Remark_8"];
// #8

//Record Working #9
$Date_9 = $data["Date_9"];
$From_9 = $data["From_9"];
$To_9 = $data["To_9"];
$CNC_Milling_9 = $data["CNC_Milling_9"];
$EDM_9 = $data["EDM_9"];
$Drilling_9 = $data["Drilling_9"];
$Grinding_9 = $data["Grinding_9"];
$Lathe_9 = $data["Lathe_9"];
$Milling_9 = $data["Milling_9"];
$Other_9 = $data["Other_9"];
$W_T_1_9 = $data["W_T_1_9"];
$O_T_1_9 = $data["O_T_1_9"];
$W_T_2_9 = $data["W_T_2_9"];
$O_T_2_9 = $data["O_T_2_9"];
$W_T_3_9 = $data["W_T_3_9"];
$O_T_3_9 = $data["O_T_3_9"];
$W_T_4_9 = $data["W_T_4_9"];
$O_T_4_9 = $data["O_T_4_9"];
$W_T_5_9 = $data["W_T_5_9"];
$O_T_5_9 = $data["O_T_5_9"];
$W_T_6_9 = $data["W_T_6_9"];
$O_T_6_9 = $data["O_T_6_9"];
$W_T_7_9 = $data["W_T_7_9"];
$O_T_7_9 = $data["O_T_7_9"];
$Remark_9=  $data["Remark_9"];
// #9

//Record Working #10
$Date_10 = $data["Date_10"];
$From_10 = $data["From_10"];
$To_10 = $data["To_10"];
$CNC_Milling_10 = $data["CNC_Milling_10"];
$EDM_10 = $data["EDM_10"];
$Drilling_10 = $data["Drilling_10"];
$Grinding_10 = $data["Grinding_10"];
$Lathe_10 = $data["Lathe_10"];
$Milling_10 = $data["Milling_10"];
$Other_10 = $data["Other_10"];
$W_T_1_10 = $data["W_T_1_10"];
$O_T_1_10 = $data["O_T_1_10"];
$W_T_2_10 = $data["W_T_2_10"];
$O_T_2_10 = $data["O_T_2_10"];
$W_T_3_10 = $data["W_T_3_10"];
$O_T_3_10 = $data["O_T_3_10"];
$W_T_4_10 = $data["W_T_4_10"];
$O_T_4_10 = $data["O_T_4_10"];
$W_T_5_10 = $data["W_T_5_10"];
$O_T_5_10 = $data["O_T_5_10"];
$W_T_6_10 = $data["W_T_6_10"];
$O_T_6_10 = $data["O_T_6_10"];
$W_T_7_10 = $data["W_T_7_10"];
$O_T_7_10 = $data["O_T_7_10"];
$Remark_10=  $data["Remark_10"];
// #10

//Record Working #11
$Date_11 = $data["Date_11"];
$From_11 = $data["From_11"];
$To_11 = $data["To_11"];
$CNC_Milling_11 = $data["CNC_Milling_11"];
$EDM_11 = $data["EDM_11"];
$Drilling_11 = $data["Drilling_11"];
$Grinding_11 = $data["Grinding_11"];
$Lathe_11 = $data["Lathe_11"];
$Milling_11 = $data["Milling_11"];
$Other_11 = $data["Other_11"];
$W_T_1_11 = $data["W_T_1_11"];
$O_T_1_11 = $data["O_T_1_11"];
$W_T_2_11 = $data["W_T_2_11"];
$O_T_2_11 = $data["O_T_2_11"];
$W_T_3_11 = $data["W_T_3_11"];
$O_T_3_11 = $data["O_T_3_11"];
$W_T_4_11 = $data["W_T_4_11"];
$O_T_4_11 = $data["O_T_4_11"];
$W_T_5_11 = $data["W_T_5_11"];
$O_T_5_11 = $data["O_T_5_11"];
$W_T_6_11 = $data["W_T_6_11"];
$O_T_6_11 = $data["O_T_6_11"];
$W_T_7_11 = $data["W_T_7_11"];
$O_T_7_11 = $data["O_T_7_11"];
$Remark_11=  $data["Remark_11"];
// #11

//Record Working #12
$Date_12 = $data["Date_12"];
$From_12 = $data["From_12"];
$To_12 = $data["To_12"];
$CNC_Milling_12 = $data["CNC_Milling_12"];
$EDM_12 = $data["EDM_12"];
$Drilling_12 = $data["Drilling_12"];
$Grinding_12 = $data["Grinding_12"];
$Lathe_12 = $data["Lathe_12"];
$Milling_12 = $data["Milling_12"];
$Other_12 = $data["Other_12"];
$W_T_1_12 = $data["W_T_1_12"];
$O_T_1_12 = $data["O_T_1_12"];
$W_T_2_12 = $data["W_T_2_12"];
$O_T_2_12 = $data["O_T_2_12"];
$W_T_3_12 = $data["W_T_3_12"];
$O_T_3_12 = $data["O_T_3_12"];
$W_T_4_12 = $data["W_T_4_12"];
$O_T_4_12 = $data["O_T_4_12"];
$W_T_5_12 = $data["W_T_5_12"];
$O_T_5_12 = $data["O_T_5_12"];
$W_T_6_12 = $data["W_T_6_12"];
$O_T_6_12 = $data["O_T_6_12"];
$W_T_7_12 = $data["W_T_7_12"];
$O_T_7_12 = $data["O_T_7_12"];
$Remark_12=  $data["Remark_12"];
// #12

// End Create Variable

// if($data["tool_tpye"] != ""){
    
    $sql = "INSERT INTO working_record (no_id,tool_type,tool_type_other,wt_new,wt_replace,wt_sample,wt_sample_form,wt_other,wt_other_form,wt_modify,wt_repair,wt_pd,wt_pd_form,tool_name,asset_id,part_id,part_name,date_working_1,from_working_1,to_working_1,CNC_Milling_1,E_D_M_1,Drilling_1,Grinding_1,Lathe_1,Milling_1,Other_1,W_T_1_1,O_T_1_1,W_T_2_1,O_T_2_1,W_T_3_1,O_T_3_1,W_T_4_1,O_T_4_1,W_T_5_1,O_T_5_1,W_T_6_1,O_T_6_1,W_T_7_1,O_T_7_1,Remark_1,date_working_2,from_working_2,to_working_2,CNC_Milling_2,E_D_M_2,Drilling_2,Grinding_2,Lathe_2,Milling_2,Other_2,W_T_1_2,O_T_1_2,W_T_2_2,O_T_2_2,W_T_3_2,O_T_3_2,W_T_4_2,O_T_4_2,W_T_5_2,O_T_5_2,W_T_6_2,O_T_6_2,W_T_7_2,O_T_7_2,Remark_2,date_working_3,from_working_3,to_working_3,CNC_Milling_3,E_D_M_3,Drilling_3,Grinding_3,Lathe_3,Milling_3,Other_3,W_T_1_3,O_T_1_3,W_T_2_3,O_T_2_3,W_T_3_3,O_T_3_3,W_T_4_3,O_T_4_3,W_T_5_3,O_T_5_3,W_T_6_3,O_T_6_3,W_T_7_3,O_T_7_3,Remark_3,date_working_4,from_working_4,to_working_4,CNC_Milling_4,E_D_M_4,Drilling_4,Grinding_4,Lathe_4,Milling_4,Other_4,W_T_1_4,O_T_1_4,W_T_2_4,O_T_2_4,W_T_3_4,O_T_3_4,W_T_4_4,O_T_4_4,W_T_5_4,O_T_5_4,W_T_6_4,O_T_6_4,W_T_7_4,O_T_7_4,Remark_4,date_working_5,from_working_5,to_working_5,CNC_Milling_5,E_D_M_5,Drilling_5,Grinding_5,Lathe_5,Milling_5,Other_5,W_T_1_5,O_T_1_5,W_T_2_5,O_T_2_5,W_T_3_5,O_T_3_5,W_T_4_5,O_T_4_5,W_T_5_5,O_T_5_5,W_T_6_5,O_T_6_5,W_T_7_5,O_T_7_5,Remark_5,date_working_6,from_working_6,to_working_6,CNC_Milling_6,E_D_M_6,Drilling_6,Grinding_6,Lathe_6,Milling_6,Other_6,W_T_1_6,O_T_1_6,W_T_2_6,O_T_2_6,W_T_3_6,O_T_3_6,W_T_4_6,O_T_4_6,W_T_5_6,O_T_5_6,W_T_6_6,O_T_6_6,W_T_7_6,O_T_7_6,Remark_6,date_working_7,from_working_7,to_working_7,CNC_Milling_7,E_D_M_7,Drilling_7,Grinding_7,Lathe_7,Milling_7,Other_7,W_T_1_7,O_T_1_7,W_T_2_7,O_T_2_7,W_T_3_7,O_T_3_7,W_T_4_7,O_T_4_7,W_T_5_7,O_T_5_7,W_T_6_7,O_T_6_7,W_T_7_7,O_T_7_7,Remark_7,date_working_8,from_working_8,to_working_8,CNC_Milling_8,E_D_M_8,Drilling_8,Grinding_8,Lathe_8,Milling_8,Other_8,W_T_1_8,O_T_1_8,W_T_2_8,O_T_2_8,W_T_3_8,O_T_3_8,W_T_4_8,O_T_4_8,W_T_5_8,O_T_5_8,W_T_6_8,O_T_6_8,W_T_7_8,O_T_7_8,Remark_8,date_working_9,from_working_9,to_working_9,CNC_Milling_9,E_D_M_9,Drilling_9,Grinding_9,Lathe_9,Milling_9,Other_9,W_T_1_9,O_T_1_9,W_T_2_9,O_T_2_9,W_T_3_9,O_T_3_9,W_T_4_9,O_T_4_9,W_T_5_9,O_T_5_9,W_T_6_9,O_T_6_9,W_T_7_9,O_T_7_9,Remark_9,date_working_10,from_working_10,to_working_10,CNC_Milling_10,E_D_M_10,Drilling_10,Grinding_10,Lathe_10,Milling_10,Other_10,W_T_1_10,O_T_1_10,W_T_2_10,O_T_2_10,W_T_3_10,O_T_3_10,W_T_4_10,O_T_4_10,W_T_5_10,O_T_5_10,W_T_6_10,O_T_6_10,W_T_7_10,O_T_7_10,Remark_10,date_working_11,from_working_11,to_working_11,CNC_Milling_11,E_D_M_11,Drilling_11,Grinding_11,Lathe_11,Milling_11,Other_11,W_T_1_11,O_T_1_11,W_T_2_11,O_T_2_11,W_T_3_11,O_T_3_11,W_T_4_11,O_T_4_11,W_T_5_11,O_T_5_11,W_T_6_11,O_T_6_11,W_T_7_11,O_T_7_11,Remark_11,date_working_12,from_working_12,to_working_12,CNC_Milling_12,E_D_M_12,Drilling_12,Grinding_12,Lathe_12,Milling_12,Other_12,W_T_1_12,O_T_1_12,W_T_2_12,O_T_2_12,W_T_3_12,O_T_3_12,W_T_4_12,O_T_4_12,W_T_5_12,O_T_5_12,W_T_6_12,O_T_6_12,W_T_7_12,O_T_7_12,Remark_12) VALUES ('$no_id',$tool_type,'$tool_type_other','$wt_new','$wt_replace','$wt_sample','$wt_sample_form','$wt_other','$wt_other_form','$wt_modify','$wt_repair','$wt_production','$wt_pd_form','$tool_name','$asset_id','$part_id','$part_name','$Date_1','$From_1','$To_1','$CNC_Milling_1','$EDM_1','$Drilling_1','$Grinding_1','$Lathe_1','$Milling_1','$Other_1','$W_T_1_1','$O_T_1_1','$W_T_2_1','$O_T_2_1','$W_T_3_1','$O_T_3_1','$W_T_4_1','$O_T_4_1','$W_T_5_1','$O_T_5_1','$W_T_6_1','$W_T_6_1','$W_T_7_1','$O_T_7_1','$Remark_1','$Date_2','$From_2','$To_2','$CNC_Milling_2','$EDM_2','$Drilling_2','$Grinding_2','$Lathe_2','$Milling_2','$Other_2','$W_T_1_2','$O_T_1_2','$W_T_2_2','$O_T_2_2','$W_T_3_2','$O_T_3_2','$W_T_4_2','$O_T_4_2','$W_T_5_2','$O_T_5_2','$W_T_6_2','$W_T_6_2','$W_T_7_2','$O_T_7_2','$Remark_2','$Date_3','$From_3','$To_3','$CNC_Milling_3','$EDM_3','$Drilling_3','$Grinding_3','$Lathe_3','$Milling_3','$Other_3','$W_T_1_3','$O_T_1_3','$W_T_2_3','$O_T_2_3','$W_T_3_3','$O_T_3_3','$W_T_4_3','$O_T_4_3','$W_T_5_3','$O_T_5_3','$W_T_6_3','$W_T_6_3','$W_T_7_3','$O_T_7_3','$Remark_3','$Date_4','$From_4','$To_4','$CNC_Milling_4','$EDM_4','$Drilling_4','$Grinding_4','$Lathe_4','$Milling_4','$Other_4','$W_T_1_4','$O_T_1_4','$W_T_2_4','$O_T_2_4','$W_T_3_4','$O_T_3_4','$W_T_4_4','$O_T_4_4','$W_T_5_4','$O_T_5_4','$W_T_6_4','$W_T_6_4','$W_T_7_4','$O_T_7_4','$Remark_4','$Date_5','$From_5','$To_5','$CNC_Milling_5','$EDM_5','$Drilling_5','$Grinding_5','$Lathe_5','$Milling_5','$Other_5','$W_T_1_5','$O_T_1_5','$W_T_2_5','$O_T_2_5','$W_T_3_5','$O_T_3_5','$W_T_4_5','$O_T_4_5','$W_T_5_5','$O_T_5_5','$W_T_6_5','$W_T_6_5','$W_T_7_5','$O_T_7_5','$Remark_5','$Date_6','$From_6','$To_6','$CNC_Milling_6','$EDM_6','$Drilling_6','$Grinding_6','$Lathe_6','$Milling_6','$Other_6','$W_T_1_6','$O_T_1_6','$W_T_2_6','$O_T_2_6','$W_T_3_6','$O_T_3_6','$W_T_4_6','$O_T_4_6','$W_T_5_6','$O_T_5_6','$W_T_6_6','$W_T_6_6','$W_T_7_6','$O_T_7_6','$Remark_6','$Date_7','$From_7','$To_7','$CNC_Milling_7','$EDM_7','$Drilling_7','$Grinding_7','$Lathe_7','$Milling_7','$Other_7','$W_T_1_7','$O_T_1_7','$W_T_2_7','$O_T_2_7','$W_T_3_7','$O_T_3_7','$W_T_4_7','$O_T_4_7','$W_T_5_7','$O_T_5_7','$W_T_6_7','$W_T_6_7','$W_T_7_7','$O_T_7_7','$Remark_7','$Date_8','$From_8','$To_8','$CNC_Milling_8','$EDM_8','$Drilling_8','$Grinding_8','$Lathe_8','$Milling_8','$Other_8','$W_T_1_8','$O_T_1_8','$W_T_2_8','$O_T_2_8','$W_T_3_8','$O_T_3_8','$W_T_4_8','$O_T_4_8','$W_T_5_8','$O_T_5_8','$W_T_6_8','$W_T_6_8','$W_T_7_8','$O_T_7_8','$Remark_8','$Date_9','$From_9','$To_9','$CNC_Milling_9','$EDM_9','$Drilling_9','$Grinding_9','$Lathe_9','$Milling_9','$Other_9','$W_T_1_9','$O_T_1_9','$W_T_2_9','$O_T_2_9','$W_T_3_9','$O_T_3_9','$W_T_4_9','$O_T_4_9','$W_T_5_9','$O_T_5_9','$W_T_6_9','$W_T_6_9','$W_T_7_9','$O_T_7_9','$Remark_9','$Date_10','$From_10','$To_10','$CNC_Milling_10','$EDM_10','$Drilling_10','$Grinding_10','$Lathe_10','$Milling_10','$Other_10','$W_T_1_10','$O_T_1_10','$W_T_2_10','$O_T_2_10','$W_T_3_10','$O_T_3_10','$W_T_4_10','$O_T_4_10','$W_T_5_10','$O_T_5_10','$W_T_6_10','$W_T_6_10','$W_T_7_10','$O_T_7_10','$Remark_10','$Date_11','$From_11','$To_11','$CNC_Milling_11','$EDM_11','$Drilling_11','$Grinding_11','$Lathe_11','$Milling_11','$Other_11','$W_T_1_11','$O_T_1_11','$W_T_2_11','$O_T_2_11','$W_T_3_11','$O_T_3_11','$W_T_4_11','$O_T_4_11','$W_T_5_11','$O_T_5_11','$W_T_6_11','$W_T_6_11','$W_T_7_11','$O_T_7_11','$Remark_11','$Date_12','$From_12','$To_12','$CNC_Milling_12','$EDM_12','$Drilling_12','$Grinding_12','$Lathe_12','$Milling_12','$Other_12','$W_T_1_12','$O_T_1_12','$W_T_2_12','$O_T_2_12','$W_T_3_12','$O_T_3_12','$W_T_4_12','$O_T_4_12','$W_T_5_12','$O_T_5_12','$W_T_6_12','$W_T_6_12','$W_T_7_12','$O_T_7_12','$Remark_12')";
    $result = $conn->query($sql);
    if($result){
        $response = 1;
    }else{
        $response = 2;
    }

    echo $response;
}
?>