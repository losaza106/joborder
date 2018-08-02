<?php
include "../config/dbh.inc.php";
require_once __DIR__ . '/vendor/autoload.php';
$session_id = $_GET['session_id'];
$sql = "SELECT * FROM working_record WHERE id_w_record=$session_id";
mysqli_set_charset($conn,"utf8");
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$mpdf = new \Mpdf\Mpdf();

$mpdf->AddPage('L');
	$tr = '';
                            for($i = 1;$i<=12;$i++){
                              $date_working= "date_working_$i";
                                $from_working = "from_working_$i";
                                $to_working = "to_working_$i";
                                $CNC_Milling = "CNC_Milling_$i";
                                $E_D_M_1 = "E_D_M_$i";
                                $Drilling = "Drilling_$i";
                                $Grinding = "Grinding_$i";
                                $Lathe = "Lathe_$i";
                                $Milling = "Milling_$i";
                                $Other = "Other_$i";
                                $W_T_1 = "W_T_1_$i";
                                $O_T_1 = "O_T_1_$i";
                                $W_T_2 = "W_T_2_$i";
                                $O_T_2 = "O_T_2_$i";
                                $W_T_3 = "W_T_3_$i";
                                $O_T_3 = "O_T_3_$i";
                                $W_T_4 = "W_T_4_$i";
                                $O_T_4 = "O_T_4_$i";
                                $W_T_5 = "W_T_5_$i";
                                $O_T_5 = "O_T_5_$i";
                                $W_T_6 = "W_T_6_$i";
                                $O_T_6 = "O_T_6_$i";
                                $W_T_7 = "W_T_7_$i";
                                $O_T_7 = "O_T_7_$i";
                                $Remark = "Remark_$i";
                                $tr .= '<tr >
                                <td style="font-size:8px;">
                                '.$row[$date_working].'&nbsp;
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$from_working].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$to_working].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$CNC_Milling].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$E_D_M_1].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Drilling].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Grinding].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Lathe].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Milling].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Other].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_1].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_1].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_2].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_2].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_3].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_3].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_4].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_4].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_5].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_5].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_6].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_6].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$W_T_7].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$O_T_7].'
                                </td>
                                <td style="font-size:8px;">
                                '.$row[$Remark].'
                                </td>
                              
                              </tr>';
                            }
                           
$mpdf->WriteHTML('
<style>
.thai{
    font-family: "Garuda";
}
.12{
    font-size:12px;
}
.10{
    font-size:10px;
}

</style>
<div style="position: fixed;bottom: 467;right: 40;font-size:12px;float:left;width:180;">'.($row['tool_type_other'] != "" ? substr($row['tool_type_other'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 420;right: 315;font-size:12px;float:left;width:100;">'.($row['wt_sample_form'] != "" ? substr($row['wt_sample_form'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 400;right: 315;font-size:12px;float:left;width:100;">'.($row['wt_pd_form'] != "" ? substr($row['wt_pd_form'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 410;right: 10;font-size:12px;float:left;width:160;">'.($row['wt_other_form'] != "" ? substr($row['wt_other_form'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 355;right:540;font-size:12px;float:left;width:350;">'.($row['tool_name'] != "" ? substr($row['tool_name'],0,29) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 358;right:27;font-size:9px;float:left;width:370;">'.($row['part_name'] != "" ? substr($row['part_name'],0,60) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 333;right:27;font-size:9px;float:left;width:370;">'.($row['part_id'] != "" ? substr($row['part_id'],0,60) : null).'&nbsp;</div>
<div style="position: fixed;bottom: 330;right:510;font-size:12px;float:left;width:370;">'.($row['asset_id'] != "" ? substr($row['asset_id'],0,60) : null).'&nbsp;</div>
<small>WE-EF LIGHTING Co Ltd</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>ISO9001:2008(E)</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>LIGHTGROUP Ltd</small>
<small>Document no.: <b>07F-TS/GEN01-1/1 Rev. 00</b></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Effctive Date : 2 Oct 2009</small><h3 class="thai" style="text-align:center;">บันทึกเวลาการทำงาน<br><span style="font-size:16px">WORKING TIME RECORD</span></h3><div class="thai 12">ประเภทของทูล (Tool Type)</div><table border="1" width="100%" cellpadding="2" cellspacing="0"><tr>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 1 ? 'checked="checked"' : "").'> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 5 ? 'checked="checked"' : "").'> โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 4 ? 'checked="checked"' : "").'> จิ๊กและฟิกเจอร์ (Jig & Fixture)</div></td>
</tr><tr>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 3 ? 'checked="checked"' : "").'> โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 2 ? 'checked="checked"' : "").'> แม่พิมพ์ปั๊มโลหะ (Punch & Die)</div></td>
<td><div class="thai 12"><input type="checkbox"/ '.($row['tool_type'] == 6 ? 'checked="checked"' : "").'> อื่นๆ (Other)__________________________</div></td>
</tr></table><div class="thai 12">ประเภทของทูล (Tool Type)</div><table border="1" width="100%" cellpadding="2" cellspacing="0"><tr>
<td><div class="thai 12"><input type="checkbox"/ '.($row['wt_new'] == "Y" ? 'checked="checked"' : "").'> ทำใหม่ (New)</div></td>
<td style="text-align:center;"><div class="thai 12"><input type="checkbox"/ '.($row['wt_replace'] == "Y" ? 'checked="checked"' : "").'> ทำใหม่เพื่อแทนของเดิม (Replace)</div></td>
<td><div class="thai 12"><input type="checkbox"/ '.($row['wt_sample'] == "Y" ? 'checked="checked"' : "").'> ตัวอย่าง (Sample) _____________ ชิ้น/(Pieces)</div></td>
<td rowspan="2"><div class="thai 12"><input type="checkbox" '.($row['wt_other'] == "Y" ? 'checked="checked"' : "").'/> อื่นๆ (Other)__________________________</div></td>
</tr><tr>
<td><div class="thai 12"><input type="checkbox" '.($row['wt_modify'] == "Y" ? 'checked="checked"' : "").'/> ดัดแปลง (Modify)</div></td>
<td style="text-align:center;"><div class="thai 12"><input type="checkbox" '.($row['wt_repair'] == "Y" ? 'checked="checked"' : "").'/> ซ่อม (Repair)</div></td>
<td><div class="thai 12"><input type="checkbox" '.($row['wt_pd'] == "Y" ? 'checked="checked"' : "").'/> ผลิต (Production) _____________ ชิ้น/(Pieces)</div></td>
</tr></table><br><div class="thai 12">ชื่อทูล (Tool Name)__________________________________________________________ชื่อชิ้นงาน (Part Name)___________________________________________________________</div><div class="thai 12">หมายเลขทูล (Asset ID)______________________________________________________หมายเลขชิ้นงาน(Part ID)__________________________________________________________</div><br><table class="10" border="1" width="100%" cellpadding="2" cellspacing="0">
                      <thead>
                        <tr style="font-size:10px;">
                          <th width="5%">
                            <div class="">Date</div>
                          </th>
                          <th width="5%">
                            <div class="">From</div>
                          </th>
                          <th width="5%">
                            <div class="">To</div>
                          </th>
                          <th width="5%">
                            <div class="rotate">CNC Milling</div>
                          </th>
                          <th>
                            <div class="rotate">E.D.M</div>
                          </th>
                          <th>
                            <div class="rotate">Drilling</div>
                          </th>
                          <th>
                            <div class="rotate">Grinding</div>
                          </th>
                          <th>
                            <div class="rotate">Lathe</div>
                          </th>
                          <th>
                            <div class="rotate">Milling</div>
                          </th>
                          <th>
                            <div class="rotate">Other</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">W.T</div>
                          </th>
                          <th>
                            <div class="">O.T</div>
                          </th>
                          <th>
                            <div class="">Remark</div>
                          </th>
                        </tr>
                      </thead><tbody>'.$tr.'</tbody></table><div class="thai 12">W.T (Normal Working Time) หมายถึงเวลาทำงานปกติ</div><div class="thai 12">O.T (Over Time) หมายถึงเวลาทำงานปกติ</div>');
$mpdf->Output();
?>