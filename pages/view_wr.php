<style>
  .rotate {
    display: inline-block;
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    -webkit-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
  }

  .tblborder,
  .tblborder td,
  .tblborder th {
    border-collapse: collapse;
    border: 1px solid #000;
  }

  .tblborder td,
  .tblborder th {
    padding: 10px 10px;
  }

  td {
    padding: 0px !important;
  }

  td.tall {
    height: 100px;
    padding: 0;
  }

  input.tall {
    margin: 0;
    height: 100%;
    display: inline-block;
    width: 100%;
    font-size: 15px;
    padding: 0;
  }
</style>
<?php 
error_reporting(0);
if(isset($_GET['id_w_record'])){
    include "config/dbh.inc.php";
    $session_id = $_GET['id_w_record'];
    $sql = "SELECT * FROM working_record WHERE id_w_record='$session_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-dark pull-left">บันทึกเวลาการทำงาน (WORKING TIME RECORD)</h1>
          <span style="display:none;" id="no_id"><?php echo (isset($row['no_id']) ? $row['no_id'] : "")?></span>
         
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col-md-6 -->
        <div class="col-lg-12">


          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0 pull-left">WORKING TIME RECORD ID:<?=$session_id?></h5>
              <span class="pull-right" id="ref_doc"></span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <small>
                    <b>ประเภทของทูล (Tool Type)</b>
                  </small>
                  <table class="table table-bordered">

                    <tbody>
                      <tr>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==1 ? "Checked" : ""); ?> id="wt_1"
                          <?php echo ($session_id==""? "" : "disabled")?> value="1"> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</td>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==5 ? "Checked" : ""); ?> id="wt_5"
                          <?php echo ($session_id==""? "" : "disabled")?> value="5">โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</td>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==4 ? "Checked" : ""); ?> id="wt_4"
                          <?php echo ($session_id==""? "" : "disabled")?> value="4">จิ๊กและฟิกเจอร์ (Jig & Fixture)</td>
                      </tr>
                      <tr>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==3 ? "Checked" : ""); ?> id="wt_3"
                          <?php echo ($session_id==""? "" : "disabled")?> value="3">โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</td>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==2 ? "Checked" : ""); ?> id="wt_2"
                          <?php echo ($session_id==""? "" : "disabled")?> value="2">แม่พิมพ์ปั๊มโลหะ (Punch & Die)</td>
                        <td>
                          <input name="tool_type" type="checkbox" <?php echo ($row[ 'tool_type']==6 ? "Checked" : ""); ?> id="wt_6"
                          <?php echo ($session_id==""? "" : "disabled")?> value="6">อื่นๆ (Other) <input type="text" class="form-control" id="tool_type_other" value="<?php echo (isset($_GET['id_w_record']) && isset($row['tool_type_other']) ? $row['tool_type_other'] : "") ?>"></td>
                          
                      </tr>

                    </tbody>
                  </table>
                  <small>
                    <b>ลักษณะของงาน (Work Type)</b>
                  </small>
                  <table class="table table-bordered">

                    <tbody>
                      <tr>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_new']=='Y' ? "Checked" : ""); ?> id="wt_new"
                          <?php echo ($session_id=="" ? "" : "disabled")?> value="Y"> ทำใหม่ (New)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_replace']=='Y' ? "Checked" : ""); ?> id="wt_replace"
                          <?php echo ($session_id==""? "" : "disabled")?> value="Y"> ทำใหม่เพื่อแทนของเดิม (Replace)</td>
                        <td>
                          <input type="checkbox"  <?php echo ($row[ 'wt_sample']=='Y' ? "Checked" : ""); ?> id="wt_sample"
                          <?php echo ($session_id==""? "" : "disabled")?> value="Y"> ตัวอย่าง (Sample)
                          <?php echo ($row[
                                                    'wt_sample']=='Y' ? $row['wt_sample_form']." ชิ้น/(Pieces)" : ""); ?> <span id="sample_text"></span><input type="text" id="wt_sample_form" class="form-control btn-sm" value="<?php echo (isset($_GET['id_w_record']) && $row['wt_sample']=='Y' ? $row['wt_sample_form'] : "")?>"></td>
                        <td rowspan="2">
                          <input type="checkbox" <?php echo ($row[ 'wt_other']=='Y' ? "Checked" : ""); ?> id="wt_other"
                          <?php echo ($session_id==""? "" : "disabled")?> value="Y">อื่นๆ (Other) <input type="text" id="wt_other_form" class="form-control btn-sm" value="<?php echo (isset($_GET['id_w_record']) && $row['wt_other']=='Y' ? $row['wt_other_form'] : "")?>"></td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_modify']=='Y' ? "Checked" : ""); ?> id="wt_modify"
                          <?php echo ($session_id==""? "" : "disabled")?> value="Y">ดัดแปลง (Modify)</td>
                        <td>
                          <input value="Y" type="checkbox" <?php echo ($row['wt_repair']=='Y' ? "Checked" : ""); ?> id="wt_repair"
                          <?php echo ($session_id==""? "" : "disabled")?>>ซ่อม (Repair)</td>
                        <td>
                          <input value="Y" type="checkbox" <?php echo ($row[ 'wt_pd']=='Y' ? "Checked" : ""); ?> id="wt_production"
                          <?php echo ($session_id==""? "" : "disabled")?>> ผลิต (Production)
                          <?php echo ($row['wt_pd']=='Y'
                                                ? $row['wt_pd_form']." ชิ้น/(Pieces)" : ""); ?><span id="pd_text"></span><input type="text" id="wt_pd_form" class="form-control btn-sm" value="<?php echo (isset($_GET['id_w_record']) && $row['wt_pd']=='Y' ? $row['wt_pd_form'] : "")?>"></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <div class="col-lg-6 mt-1">
                  <div class="form-group">
                    <label>ชื่อทูล (Tool Name)</label>
                    <input type="text" class="form-control" id="tool_name" placeholder="" value="<?=$row['tool_name']?>" <?php echo ($session_id==""
                      ? "" : "disabled")?>>
                  </div>
                </div>
                <div class="col-lg-6 mt-1">
                  <div class="form-group">
                    <?php 
                    if($session_id == ""){
                      echo '<button id="btn_search_part" class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#exampleModal1">
                      <i class="fa fa-search" aria-hidden="true"></i> Search</button>
                      <button type="button" class="btn btn-success btn-sm pull-right" id="add_partid">
                                                <i class="fa fa-plus" aria-hidden="true"></i> ADD</button>';
                    }
                    ?>
                    <label>ชื่อชิ้นงาน (Part Name)</label>
                    <p style="display:none;" id="part_name_get"><?php if($row['part_name'] == ""){echo"No";
                    }else{
                      echo $row['part_name'];
                    }?></p>

                    <span id="g_partname"></span>
                  </div>
                </div>
                <div class="col-lg-6 mt-1">
                  <div class="form-group">
                    <label>หมายเลขทูล (Asset ID)</label>
                    <input type="text" id="asset_id" class="form-control" placeholder="" value="<?=$row['asset_id']?>" <?php echo ($session_id==""
                      ? "" : "disabled")?>>
                  </div>
                </div>
                <div class="col-lg-6 mt-1">
                  <div class="form-group">
                    <label>หมายเลขชิ้นงาน (Part ID)</label>
                    <p style="display:none;" id="part_id_get"><?php echo ($row['part_id'] == "" ? "No" : $row['part_id']);?></p>
                    <span id="g_part_id"></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="card card-primary card-outline">

            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table tblborder">
                      <thead>
                        <tr style="font-size:10px;">
                          <th>
                            <div class="">Date</div>
                          </th>
                          <th>
                            <div class="">From</div>
                          </th>
                          <th>
                            <div class="">To</div>
                          </th>
                          <th>
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
                      </thead>
                      <tbody>
                        <?php 
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
                                echo '<tr>
                                <td>
                                  <input class="tall" type="date" id="Date_'.$i.'" style="font-size:8px;" name="field1" disabled value='.$row[$date_working].'>
                                </td>
                                <td>
                                  <input class="tall" type="date" id="From_'.$i.'" style="font-size:8px;" name="field2" disabled value='.$row[$from_working].'>
                                </td>
                                <td>
                                  <input class="tall" type="date" id="To_'.$i.'" style="font-size:8px;" name="field3" disabled value='.$row[$to_working].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="CNC_Milling_'.$i.'" name="field4" disabled value='.$row[$CNC_Milling].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="EDM_'.$i.'" name="field5" disabled value='.$row[$E_D_M_1].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Drilling_'.$i.'" name="field6" disabled value='.$row[$Drilling].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Grinding_'.$i.'" name="field7" disabled value='.$row[$Grinding].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Lathe_'.$i.'" name="field8" disabled value='.$row[$Lathe].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Milling_'.$i.'" name="field9" disabled value='.$row[$Milling].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Other_'.$i.'" name="field10" disabled value='.$row[$Other].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_1_'.$i.'" name="field11" disabled value='.$row[$W_T_1].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_1_'.$i.'" name="field12" disabled value='.$row[$O_T_1].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_2_'.$i.'" name="field13" disabled value='.$row[$W_T_2].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_2_'.$i.'" name="field14" disabled value='.$row[$O_T_2].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_3_'.$i.'" name="field15" disabled value='.$row[$W_T_3].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_3_'.$i.'" name="field16" disabled value='.$row[$O_T_3].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_4_'.$i.'" name="field17" disabled value='.$row[$W_T_4].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_4_'.$i.'" name="field18" disabled  value='.$row[$O_T_4].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_5_'.$i.'" name="field19" disabled value='.$row[$W_T_5].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_5_'.$i.'" name="field20" disabled  value='.$row[$O_T_5].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_6_'.$i.'" name="field21" disabled value='.$row[$W_T_6].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_6_'.$i.'" name="field22" disabled value='.$row[$O_T_6].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_7_'.$i.'" name="field23" disabled value='.$row[$W_T_7].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_7_'.$i.'" name="field24" disabled value='.$row[$O_T_7].'>
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Remark_'.$i.'" name="field25" disabled value='.$row[$Remark].'>
                                </td>
                              
                              </tr>';
                            }
                            ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
            

        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>