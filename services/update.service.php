<?php 
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

$session_id = $_POST['session'];

$sql = "UPDATE mainjob SET ".($due_date_FIELD ? "due_date = $due_date ," : null)." session_id='$session_id'"." WHERE session_id='$session_id'";

echo $sql;
?>