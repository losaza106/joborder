<?php ini_set('max_execution_time', 0); ?>
<?php 

function get_data($DATA){
    if(isset($DATA) AND $DATA != ""){
        return $DATA;
    }else{
        return false;
    }
}

function get_true_field($DATA){
    if(isset($DATA) AND $DATA != ""){
        return true;
    }else{
        return false;
    }
}

$request_date = get_data($_POST['request_date']);
$request_date_field = get_true_field($_POST['request_date']);

$due_date = get_data($_POST['due_date']);
$due_date_field = get_true_field($_POST['due_date']);

$part_name = get_data($_POST['part_name']);
$part_name_field = get_true_field($_POST['part_name']);

$part_id = get_data($_POST['part_id']);
$part_id_field = get_true_field($_POST['part_id']);

$tool_name = get_data($_POST['tool_name']);
$tool_name_field = get_true_field($_POST['tool_name']);

$asset_id = get_data($_POST['asset_id']);
$asset_id_field = get_true_field($_POST['asset_id']);

$tool_type = get_data($_POST['tool_type']);
$tool_type_field = get_true_field($_POST['tool_type']);

$other_type = get_data($_POST['other_type']);
$other_type_field = get_true_field($_POST['other_type']);

$wt_new = get_data($_POST['wt_new']);
$wt_new_field = get_true_field($_POST['wt_new']);

$wt_replace = get_data($_POST['wt_replace']);
$wt_replace_field = get_true_field($_POST['wt_replace']);
 
$wt_other = get_data($_POST['wt_other']);
$wt_other_field = get_true_field($_POST['wt_other']);

$other_wt_form = get_data($_POST['other_wt_form']);
$other_wt_form_field = get_true_field($_POST['other_wt_form']);

$wt_modify = get_data($_POST['wt_modify']);
$wt_modify_field = get_true_field($_POST['wt_modify']);

$wt_sample = get_data($_POST['wt_sample']);
$wt_sample_field = get_true_field($_POST['wt_sample']);

$wt_sample_form = get_data($_POST['wt_sample_form']);
$wt_sample_form_field = get_true_field($_POST['wt_sample_form']);

$wt_repair = get_data($_POST['wt_repair']);
$wt_repair_field = get_true_field($_POST['wt_repair']);

$wt_pd = get_data($_POST['wt_pd']);
$wt_pd_field = get_true_field($_POST['wt_pd']);

$wt_pd_form = get_data($_POST['wt_pd_form']);
$wt_pd_form_field = get_true_field($_POST['wt_pd_form']);

$estimated = get_data($_POST['estimated']);
$estimated_field = get_true_field($_POST['estimated']);

$detail_work = get_data($_POST['detail_work']);
$detail_work_field = get_true_field($_POST['detail_work']);

/////ไฟล์ detail_file array

$remark = get_data($_POST['remark']);
$remark_field = get_true_field($_POST['remark']);

$received = get_data($_POST['received']);
$received_field = get_true_field($_POST['received']);

/////ไฟล์ attachedfile array
?>