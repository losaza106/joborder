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
if(isset($_GET['session_id'])){
    include "config/dbh.inc.php";
    $session_id = $_GET['session_id'];
    $sql = "SELECT * FROM mainjob WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search PartID</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-inline">
          <label for="">Search By :</label>
          <select class="form-control" name="Search_by" id="Search_by">
            <option value="0">PARTID</option>
            <option value="1">DESCRIPTION 1</option>
          </select>
          <input type="text" class="form-control" name="text_search" id="text_search">
          <button class="btn-danger btn" type="button" id="button_search">
            <i class="fa fa-search" id="loading" aria-hidden="true"></i> Search</button>

        </div>
        <table class="table table-bordered" style="margin-top:10px;">
          <thead>
            <tr>
              <th>PARTID</th>
              <th>DESCRIPTION 1</th>
              <th style="width: 50px">#</th>
            </tr>
          </thead>
          <tbody id="MIANPART">

          </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-dark pull-left">บันทึกเวลาการทำงาน (WORKING TIME RECORD)</h1>
          <span style="display:none;" id="no_id"><?php echo (isset($row['no_id']) ? $row['no_id'] : "")?></span>
          <button class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">SEARCH JOBORDER.</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">SEARCH JOBORDER</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>

                        <th>เลขที่</th>
                        <th>วันที่ร้องขอ</th>
                        <th>วันที่ต้องการเสร็จ</th>
                        <th>ผู้ส่ง</th>
                        <th>ผู้รับ</th>
                        <th style="width: 40px">#</th>
                      </tr>
                      <tr>
                    </thead>
                    <tbody id="data_table">



                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
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
              <h5 class="m-0 pull-left">WORKING TIME RECORD</h5>
              <?php 
              if(isset($row['no_id'])){
                echo '<span class="pull-right" id="have_ref">REF : '.$row['no_id'].'</span>';
              }
              
              ?>
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
                          <?php echo ($session_id==""? "" : "disabled")?> value="6">อื่นๆ (Other) <input type="text" class="form-control" id="tool_type_other" value="<?php echo (isset($_GET['session_id']) && isset($row['tool_type_other']) ? $row['tool_type_other'] : "") ?>"></td>
                          
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
                                                    'wt_sample']=='Y' ? $row['wt_sample_form']." ชิ้น/(Pieces)" : ""); ?> <span id="sample_text"></span><input type="text" id="wt_sample_form" class="form-control btn-sm" value="<?php echo (isset($_GET['session_id']) && $row[ 'wt_sample']=='Y' ? $row['wt_sample_form'] : "")?>"></td>
                        <td rowspan="2">
                          <input type="checkbox" <?php echo ($row[ 'wt_other']=='Y' ? "Checked" : ""); ?> id="wt_other"
                          <?php echo ($session_id==""? "" : "disabled")?> value="Y">อื่นๆ (Other) <input type="text" id="wt_other_form" class="form-control btn-sm" value="<?php echo (isset($_GET['session_id']) && $row['wt_other']=='Y' ? $row['other_wt_form'] : "")?>"></td>
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
                                                ? $row['wt_pd_form']." ชิ้น/(Pieces)" : ""); ?><span id="pd_text"></span><input type="text" id="wt_pd_form" class="form-control btn-sm" value="<?php echo (isset($_GET['session_id']) && $row['wt_pd']=='Y' ? $row['wt_pd_form'] : "")?>"></td>
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
                                echo '<tr>
                                <td>
                                  <input class="tall" type="date" id="Date_'.$i.'" style="font-size:8px;" name="field1">
                                </td>
                                <td>
                                  <input class="tall" type="date" id="From_'.$i.'" style="font-size:8px;" name="field2">
                                </td>
                                <td>
                                  <input class="tall" type="date" id="To_'.$i.'" style="font-size:8px;" name="field3">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="CNC_Milling_'.$i.'" name="field4">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="EDM_'.$i.'" name="field5">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Drilling_'.$i.'" name="field6">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Grinding_'.$i.'" name="field7">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Lathe_'.$i.'" name="field8">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Milling_'.$i.'" name="field9">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Other_'.$i.'" name="field10">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_1_'.$i.'" name="field11">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_1_'.$i.'" name="field12">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_2_'.$i.'" name="field13">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_2_'.$i.'" name="field14">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_3_'.$i.'" name="field15">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_3_'.$i.'" name="field16">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_4_'.$i.'" name="field17">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_4_'.$i.'" name="field18">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_5_'.$i.'" name="field19">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_5_'.$i.'" name="field20">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_6_'.$i.'" name="field21">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_6_'.$i.'" name="field22">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_7_'.$i.'" name="field23">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_7_'.$i.'" name="field24">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Remark_'.$i.'" name="field25">
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
            <div class="card-footer clearfix">
                <button type="button" class="btn btn-success float-right" id="btn_record"><i class="fa fa-plus"></i> Save</button>
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