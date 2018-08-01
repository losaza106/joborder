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
<div class="thai 12">ชื่อชิ้นงาน (Part Name)____________________________________หมายเลขชิ้นงาน (Part ID)____________________________</div><div class="thai 12">ชื่อทูล (Tool Name)_______________________________________หมายเลขทูล (Asset ID)_____________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ประเภทของทูล (Tool Type)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> จิ๊กและฟิกเจอร์ (Jig & Fixture)</div><div class="thai 12" style="float:left;"><input type="checkbox"> โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> อื่นๆ (Other)________________________</div><div class="thai 12" style="font-weight:bold;text-decoration:underline;">ลักษณะงาน (Work Type)</div><div class="thai 12" style="float:left;"><input type="checkbox"> ทำใหม่ (New)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ทำใหม่เพื่อแทนของเดิม (Replace)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> อื่นๆ (Other)________________________</div><div class="thai 12" style="float:left;"><input type="checkbox"> ดัดแปลง (Modify)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ตัวอย่าง (Sample) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="float:left;"><input type="checkbox"> ซ่อม (Repair)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"> ผลิต (Production) _____________ ชิ้น/(Pieces)</div><div class="thai 12" style="">จำนวนที่ใช้ต่อปี: (estimated annual consumption) _______________________________</div>
<table border="1" width="100%" cellpadding="1" cellspacing="0"><tr>
<td style="font-size:12px;" width="70%">Document No.:
    <b>05F-LG/GEN0-1/1 Rev. 03</b>
</td>
<td style="font-size:12px;">Effective Date: 19 Jan 2018</td>
</tr>
<tr>
<td colspan="2" style="font-size:12px;">Doc. Title.:
    <b>SPCIAL PRODUCT ENQUIRY</b>
</td>

</tr></table>');
$mpdf->Output();
?>