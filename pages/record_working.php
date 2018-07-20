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
              <span class="pull-right">REF : 001</span>
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
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==1 ? "Checked" : ""); ?> id="wt_1"
                          <?php echo ($session_id==""? "" : "disabled")?>> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==5 ? "Checked" : ""); ?> id="wt_5"
                          <?php echo ($session_id==""? "" : "disabled")?>>โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==4 ? "Checked" : ""); ?> id="wt_4"
                          <?php echo ($session_id==""? "" : "disabled")?>>จิ๊กและฟิกเจอร์ (Jig & Fixture)</td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==3 ? "Checked" : ""); ?> id="wt_3"
                          <?php echo ($session_id==""? "" : "disabled")?>>โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==2 ? "Checked" : ""); ?> id="wt_2"
                          <?php echo ($session_id==""? "" : "disabled")?>>แม่พิมพ์ปั๊มโลหะ (Punch & Die)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'tool_type']==6 ? "Checked" : ""); ?> id="wt_6"
                          <?php echo ($session_id==""? "" : "disabled")?>>อื่นๆ (Other)_____________________</td>
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
                          <?php echo ($session_id=="" ? "" : "disabled")?>> ทำใหม่ (New)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_replace']=='Y' ? "Checked" : ""); ?> id="wt_replace"
                          <?php echo ($session_id==""? "" : "disabled")?>> ทำใหม่เพื่อแทนของเดิม (Replace)</td>
                        <td>
                          <input type="checkbox"  <?php echo ($row[ 'wt_sample']=='Y' ? "Checked" : ""); ?> id="wt_sample"
                          <?php echo ($session_id==""? "" : "disabled")?>> ตัวอย่าง (Sample)
                          <?php echo ($row[
                                                    'wt_sample']=='Y' ? $row['wt_sample_form'] : ""); ?> ชิ้น/(Pieces)</td>
                        <td rowspan="2">
                          <input type="checkbox" <?php echo ($row[ 'wt_other']=='Y' ? "Checked" : ""); ?> id="wt_other"
                          <?php echo ($session_id==""? "" : "disabled")?>>อื่นๆ (Other)</td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_modify']=='Y' ? "Checked" : ""); ?> id="wt_modify"
                          <?php echo ($session_id==""? "" : "disabled")?>>ดัดแปลง (Modify)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_repair']=='Y' ? "Checked" : ""); ?> id="wt_repair"
                          <?php echo ($session_id==""? "" : "disabled")?>>ซ่อม (Repair)</td>
                        <td>
                          <input type="checkbox" <?php echo ($row[ 'wt_pd']=='Y' ? "Checked" : ""); ?> id="wt_production"
                          <?php echo ($session_id==""? "" : "disabled")?>> ผลิต (Production)
                          <?php echo ($row[ 'wt_pd']=='Y'
                                                ? $row['wt_pd_form'] : ""); ?> ชิ้น/(Pieces)</td>
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
                      echo '<button class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#exampleModal1">
                      <i class="fa fa-search" aria-hidden="true"></i> Search</button>
                      <button type="button" class="btn btn-success btn-sm pull-right" id="add_partid">
                                                <i class="fa fa-plus" aria-hidden="true"></i> ADD</button>';
                    }
                    ?>
                    <label>ชื่อชิ้นงาน (Part Name)</label>
                    <p style="display:none;" id="part_name_get"><?php if($row['part_name'] == ""){echo"No";
                    }else{
                      echo $row['part_name'];
                    }?>
                    </p>

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
                    <p style="display:none;" id="part_id_get"><?php if($row['part_id'] == ""){
                      echo "No";
                    }else{
                      echo $row['part_id'];
                    }?>
                    </p>
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
                                  <input class="tall" type="date" id="Date_'.$i.'" style="font-size:8px;">
                                </td>
                                <td>
                                  <input class="tall" type="date" id="From_'.$i.'" style="font-size:8px;">
                                </td>
                                <td>
                                  <input class="tall" type="date" id="To_'.$i.'" style="font-size:8px;">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="CNC_Milling_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="EDM_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Drilling_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Grinding_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Lathe_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Milling_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Other_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_1_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_1_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_2_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_2_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_3_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_3_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_4_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_4_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_5_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_5_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_6_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_6_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="W_T_7_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="O_T_7_'.$i.'">
                                </td>
                                <td>
                                  <input class="tall" type="text" id="Remark_'.$i.'">
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

        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>