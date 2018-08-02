<?php
require_once __DIR__ . '/vendor/autoload.php';

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
<small>WE-EF LIGHTING Co Ltd</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>ISO9001:2008(E)</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>LIGHTGROUP Ltd</small>
<small>Document no.: <b>07F-TS/GEN01-1/1 Rev. 00</b></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Effctive Date : 2 Oct 2009</small><br><h2 class="thai" style="text-align:center;">ใบสั่งงาน<br><span style="font-size:16px">JOB ORDER</span></h2>
<div style="text-align:right;" class="thai 12">เลขที่ (No.)________</div>
<div class="thai 12">วันที่ร้องขอ (Request Date)_____________________________วันที่ต้องการเสร็จ (Due Date)_____________________________</div>
<div class="thai 12">ชื่อชิ้นงาน (Part Name)____________________________________หมายเลขชิ้นงาน (Part ID)____________________________</div><div class="thai 12">ชื่อทูล (Tool Name)_______________________________________หมายเลขทูล (Asset ID)_____________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ประเภทของทูล (Tool Type)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> แม่พิมพ์ปั๊มโลหะ (Punch & Die)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> จิ๊กและฟิกเจอร์ (Jig & Fixture)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> อื่นๆ (Other)________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ลักษณะงาน (Work Type)</div><div class="thai 12" style="float:left;"><input type="checkbox"> ทำใหม่ (New)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ทำใหม่เพื่อแทนของเดิม (Replace)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> อื่นๆ (Other)________________________</div><div class="thai 12" style="float:left;"><input type="checkbox"> ดัดแปลง (Modify)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ตัวอย่าง (Sample) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="float:left;"><input type="checkbox"> ซ่อม (Repair)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ผลิต (Production) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="">จำนวนที่ใช้ต่อปี: (estimated annual consumption) _______________________________</div><br>
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