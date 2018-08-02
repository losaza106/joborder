<?php
include "../config/dbh.inc.php";
require_once __DIR__ . '/vendor/autoload.php';
$session_id = $_GET['session_id'];
$sql = "SELECT * FROM mainjob WHERE session_id='$session_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('
<style>
.thai{
    font-family: "Garuda";
}
.12{
    font-size:12px;
}
</style>
<div style="position: fixed;bottom: 840;right: -2;font-size:12px;float:left;width:50;">'.($row['no_id'] != "" ? substr($row['no_id'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 817;right: 350;font-size:12px;float:left;width:180;">'.($row['request_date'] != "" ? substr($row['request_date'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 817;right: 6;font-size:12px;float:left;width:180;">'.($row['due_date'] != "" ? substr($row['due_date'],0,29) : null).'&nbsp;</div>

<div style="position: fixed;bottom: 760;right: 345;font-size:12px;float:left;width:210;border:1px solid black;height:50px;">&nbsp;</div>
<div style="position: fixed;bottom: 760;right: -5;font-size:12px;float:left;width:210;border:1px solid black;height:50px;">&nbsp;</div>
<div style="position: fixed;bottom: 765;right: -5;font-size:8px;float:left;width:210;height:45px;">'.($row['part_id'] != "" ? substr(str_replace(",","<br>",$row['part_id']),0,100) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 765;right: 345;font-size:8px;float:left;width:210;height:45px;">'.($row['part_name'] != "" ? substr(str_replace(",","<br>",$row['part_name']),0,100) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 740;right: 370;font-size:12px;float:left;width:200;">'.($row['tool_name'] != "" ? substr($row['tool_name'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 740;right: 26;font-size:12px;float:left;width:200;">'.($row['asset_id'] != "" ? substr($row['asset_id'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 636;right: 93;font-size:12px;float:left;width:200;">'.($row['tool_type'] == 6 ? $row['tool_type_other'] : null).'&nbsp;</div>
<div style="position: fixed;bottom: 585;right: 35;font-size:12px;float:left;width:200;">'.($row['wt_other'] == "Y" ? $row['other_wt_form'] : null).'&nbsp;</div>
<div style="position: fixed;bottom: 560;right: 345;font-size:12px;float:left;width:90;">'.($row['wt_sample'] == "Y" ? $row['wt_sample_form'] : null).'&nbsp;</div>
<div style="position: fixed;bottom: 535;right: 345;font-size:12px;float:left;width:90;">'.($row['wt_pd'] == "Y" ? $row['wt_pd_form'] : null).'&nbsp;</div>
<div style="position: fixed;bottom: 507;right: 230;font-size:12px;float:left;width:180;">'.($row['estimated'] != "" ? $row['estimated'] : null).'&nbsp;</div>
<div style="position: fixed;bottom: 410;right: 359;font-size:12px;float:left;width:300;height:60px;" >'.($row['detail_work'] != "" ? '<span class="thai">'.$row['detail_work'].'</span>' : null).'&nbsp;</div>
<div style="position: fixed;bottom: 395;right: 15;font-size:12px;float:left;width:340;height:85px;">'.($row['detail_file'] != "" ? str_replace(",","<br>",$row['detail_file']) : null).'&nbsp;</div>
<small>WE-EF LIGHTING Co Ltd</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>ISO9001:2008(E)</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>LIGHTGROUP Ltd</small>
<small>Document no.: <b>07F-TS/GEN01-1/1 Rev. 00</b></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Effctive Date : 2 Oct 2009</small><br><h3 class="thai" style="text-align:center;">ใบสั่งงาน<br><span style="font-size:16px">JOB ORDER</span></h3>
<div style="text-align:right;" class="thai 12">เลขที่ (No.)________</div>
<div class="thai 12">วันที่ร้องขอ (Request Date)_____________________________วันที่ต้องการเสร็จ (Due Date)_____________________________</div>
<div class="thai 12">ชื่อชิ้นงาน (Part Name)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายเลขชิ้นงาน (Part ID)</div><div class="thai 12"><br>ชื่อทูล (Tool Name)__________________________________หมายเลขทูล (Asset ID)__________________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ประเภทของทูล (Tool Type)</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['tool_type'] == 1 ? 'checked="checked"' : "").'> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['tool_type'] == 2 ? 'checked="checked"' : "").'> แม่พิมพ์ปั๊มโลหะ (Punch & Die)</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['tool_type'] == 3 ? 'checked="checked"' : "").'> โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['tool_type'] == 4 ? 'checked="checked"' : "").'> จิ๊กและฟิกเจอร์ (Jig & Fixture)</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['tool_type'] == 5 ? 'checked="checked"' : "").'> โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['tool_type'] == 6 ? 'checked="checked"' : "").'> อื่นๆ (Other)________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ลักษณะงาน (Work Type)</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['wt_new'] == "Y" ? 'checked="checked"' : "").'> ทำใหม่ (New)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['wt_replace'] == "Y" ? 'checked="checked"' : "").'> ทำใหม่เพื่อแทนของเดิม (Replace)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['wt_other'] == "Y" ? 'checked="checked"' : "").'> อื่นๆ (Other)________________________</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['wt_modify'] == "Y" ? 'checked="checked"' : "").'> ดัดแปลง (Modify)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['wt_sample'] == "Y" ? 'checked="checked"' : "").'> ตัวอย่าง (Sample) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="float:left;"><input type="checkbox" '.($row['wt_repair'] == "Y" ? 'checked="checked"' : "").'> ซ่อม (Repair)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" '.($row['wt_pd'] == "Y" ? 'checked="checked"' : "").'> ผลิต (Production) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="">จำนวนที่ใช้ต่อปี: (estimated annual consumption) _______________________________</div>
<table border="1" width="100%" cellpadding="1" cellspacing="0">
<tr>
	<td class="12 thai" colspan="4"><br>&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียดของงาน (Description of Work Required)<br><br><br><br><br><br><br><br></td>
</tr>
<tr>
	<td class="12 thai" colspan="4"><br>&nbsp;&nbsp;&nbsp;&nbsp;หมายเหตุ (Remark)<br><br><br><br><br><br><br></td>
</tr>
<tr>
<td class="12 thai" colspan="2"><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;ผู้ส่ง (Ordered by)_________________________________</div><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;แผนก (DIV.)_____________________________________</div><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;ผู้รับรอง (Approved by DIVMGR/SENMGR)_____________</div><br><br></td>
<td class="12 thai" colspan="2"><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;ผู้รับ (Received by)_______________________________</div><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;แผนก (DIV.)____________________________________</div><div class="thai 12"><br>&nbsp;&nbsp;&nbsp;&nbsp;ผู้รับรอง (Approved by DIVMGR/SENMGR)_____________</div><br><br></td>
</tr>
<tr>
<td class="12 thai" colspan="4"><br>&nbsp;&nbsp;&nbsp;&nbsp;ไฟล์ที่แนบมาด้วย (Attached Document)<br><br><br><br><br><br><br></td>
</tr>
<tr>
<td class="12 thai" style="text-align:center;" width="20%">วันที่เสร็จใหม่</td>
<td class="12 thai" style="text-align:center;">เหตุผล</td>
<td class="12 thai" style="text-align:center;">ผู้แจ้ง</td>
<td class="12 thai" style="text-align:center;">ผู้รับรอง</td>
</tr>
<tr>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
</tr>
<tr>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
<td class="12 thai" style="text-align:center;">&nbsp;</td>
</tr>
</table>');
$mpdf->Output();
?>