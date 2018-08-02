<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$mpdf->AddPage('L');
	$tr = '';
                            for($i = 1;$i<=12;$i++){
                                $tr .= '<tr>
                                <td>
                                  &nbsp;
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
                                </td>
                                <td>
                                  
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
<small>WE-EF LIGHTING Co Ltd</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>ISO9001:2008(E)</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>LIGHTGROUP Ltd</small>
<small>Document no.: <b>07F-TS/GEN01-1/1 Rev. 00</b></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Effctive Date : 2 Oct 2009</small><h3 class="thai" style="text-align:center;">บันทึกเวลาการทำงาน<br><span style="font-size:16px">WORKING TIME RECORD</span></h3><div class="thai 12">ประเภทของทูล (Tool Type)</div><table border="1" width="100%" cellpadding="2" cellspacing="0"><tr>
<td><div class="thai 12"><input type="checkbox"/> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/> โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/> จิ๊กและฟิกเจอร์ (Jig & Fixture)</div></td>
</tr><tr>
<td><div class="thai 12"><input type="checkbox"/> โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</div></td>
<td><div class="thai 12"><input type="checkbox"/> แม่พิมพ์ปั๊มโลหะ (Punch & Die)</div></td>
<td><div class="thai 12"><input type="checkbox"/> อื่นๆ (Other)__________________________</div></td>
</tr></table><div class="thai 12">ประเภทของทูล (Tool Type)</div><table border="1" width="100%" cellpadding="2" cellspacing="0"><tr>
<td><div class="thai 12"><input type="checkbox"/> ทำใหม่ (New)</div></td>
<td style="text-align:center;"><div class="thai 12"><input type="checkbox"/> ทำใหม่เพื่อแทนของเดิม (Replace)</div></td>
<td><div class="thai 12"><input type="checkbox"/> ตัวอย่าง (Sample) _____________ ชิ้น/(Pieces)</div></td>
<td rowspan="2"><div class="thai 12"><input type="checkbox"/> อื่นๆ (Other)__________________________</div></td>
</tr><tr>
<td><div class="thai 12"><input type="checkbox"/> ดัดแปลง (Modify)</div></td>
<td style="text-align:center;"><div class="thai 12"><input type="checkbox"/> ซ่อม (Repair)</div></td>
<td><div class="thai 12"><input type="checkbox"/> ผลิต (Production) _____________ ชิ้น/(Pieces)</div></td>
</tr></table><br><div class="thai 12">ชื่อทูล (Tool Name)__________________________________________________________ชื่อชิ้นงาน (Part Name)___________________________________________________________</div><div class="thai 12">หมายเลขทูล (Asset ID)__________________________________________________________หมายเลขชิ้นงrt ID)____________________________________________________________</div><br><table class="10" border="1" width="100%" cellpadding="2" cellspacing="0">
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