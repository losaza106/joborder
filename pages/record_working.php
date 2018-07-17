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
if(isset($_GET['session_id'])){
    include "config/dbh.inc.php";
    $session_id = $_GET['session_id'];
    $sql = "SELECT * FROM mainjob WHERE session_id='$session_id'";
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
              <button class="btn btn-info pull-right">SEARCH</button>
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
                              <input type="checkbox" disabled <?php echo ($row[
                                                'tool_type']==1 ? "Checked" : ""); ?>> โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[
                                                'tool_type']==5 ? "Checked" : ""); ?>>โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[
                                                'tool_type']==4 ? "Checked" : ""); ?>>จิ๊กและฟิกเจอร์ (Jig & Fixture)</td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[
                                                'tool_type']==3 ? "Checked" : ""); ?>>โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'tool_type']==2
                                                ? "Checked" : ""); ?>>แม่พิมพ์ปั๊มโลหะ (Punch & Die)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'tool_type']==6 ? "Checked" : ""); ?>>อื่นๆ (Other)_____________________</td>
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
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_new']=='Y' ? "Checked" : "");
                                                ?>> ทำใหม่ (New)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_replace']=='Y' ?
                                                "Checked" : ""); ?>> ทำใหม่เพื่อแทนของเดิม (Replace)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[
                                                'wt_sample']=='Y' ? "Checked" : ""); ?>> ตัวอย่าง (Sample) <?php echo ($row[
                                                    'wt_sample']=='Y' ? $row['wt_sample_form'] : ""); ?> ชิ้น/(Pieces)</td>
                            <td rowspan="2">
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_other']=='Y'
                                                ? "Checked" : ""); ?>>อื่นๆ (Other)</td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_modify']=='Y' ?
                                                "Checked" : ""); ?>>ดัดแปลง (Modify)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_repair']=='Y' ?
                                                "Checked" : ""); ?>>ซ่อม (Repair)</td>
                            <td>
                              <input type="checkbox" disabled <?php echo ($row[ 'wt_pd']=='Y'
                                                ? "Checked" : ""); ?>> ผลิต (Production) <?php echo ($row[ 'wt_pd']=='Y'
                                                ? $row['wt_pd_form'] : ""); ?> ชิ้น/(Pieces)</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-6 mt-1">
                      <div class="form-group">
                        <label>ชื่อทูล (Tool Name)</label>
                        <input type="text" class="form-control" placeholder="" disabled value="<?=$row['tool_name']?>">
                      </div>
                    </div>
                    <div class="col-lg-6 mt-1">
                      <div class="form-group">
                        <label>ชื่อชิ้นงาน (Part Name)</label>
                        <p style="display:none;" id="part_name_get">
                                                <?php echo $row['part_name'];?>
                                            </p>
                        
                        <span id="g_partname"></span>
                      </div>
                    </div>
                    <div class="col-lg-6 mt-1">
                      <div class="form-group">
                        <label>หมายเลขทูล (Asset ID)</label>
                        <input type="text" class="form-control" placeholder="" disabled value="<?=$row['asset_id']?>">
                      </div>
                    </div>
                    <div class="col-lg-6 mt-1">
                      <div class="form-group">
                        <label>หมายเลขชิ้นงาน (Part ID)</label>
                        <p style="display:none;" id="part_id_get">
                                                <?php echo $row['part_id'];?>
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