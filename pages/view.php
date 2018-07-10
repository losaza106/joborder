<?php
    include "config/dbh.inc.php";
    session_start();
    $session_id = $_GET['session_id'];
    $sql = "SELECT * FROM  mainjob WHERE session_id='$session_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user_id = $_SESSION['id'];
    session_write_close();
    
?>
<div class="content-wrapper">
    <!-- Main content -->
    <span id="no_id" style="display:none;"><?php echo $row['no_id']; ?></span>
    <span id="received" style="display:none;"><?php echo $row['request_by']; ?></span> <!-- ID ของคนที่ เจ้าของเอกสาร -->
	<span id="req" style="display:none;"><?php echo $user_id; ?></span> <!-- ID ของคนที่ Login อยู่ -->
	<span id="true_received" style="display:none;"><?php echo $row['received']; ?></span>
    <section class="content mt-3">
        <div class="container-fluid">
        
            <!-- Small boxes (Stat box) -->
            

        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">
                            <i class="fa fa-bell" aria-hidden="true"></i> สถานะ</h3>
                        </div>
                        <div class="card-body text-center">
                           <?php 
                           if($row['status'] == 0){
                            echo "รอ Manager ของผู้ส่ง Approved";
                           }else if($row['status'] == 1){
                            echo "รอผู้รับ Approved";
                           }else if($row['status'] == 2){
                            echo "Reject โดย Manager ของผู้ส่ง";
                           }else if($row['status'] == 3){
                            echo "Reject โดย ผู้ส่ง";
                           }else if($row['status'] == 4){
                            echo "รอ Manager ของผู้รับ Approved";
                           }else if($row['status'] == 5){
                            echo "Reject โดย Manager ของผู้รับ";
                           }else{
                            echo "Success.";
                           }
                           ?>
                        </div>
                        
                    </div>
                </div>
				 
            </div>
			
			<div class="row" id="if_status_renew">
                <div class="col-md-12 text-center">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-center">
                            <i class="fa fa-repeat" aria-hidden="true"></i> ขอกำหนดวันที่เสร็จใหม่</h3>
                        </div>
                        <div class="card-body">
						<?php 
						if($row['status_renew'] == 1){
							echo "ส่งคำขอไปแล้ว รอ Approved จากผู้ส่ง";
						}else{
							echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-repeat" aria-hidden="true"></i> กำหนดวันที่เสร็จใหม่</button>';
						}
						?>
                           
						   
						   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">กำหนดวันที่เสร็จใหม่</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group text-left">
            <label for="due_date_renew" class="col-form-label">กำหนดวันที่เสร็จใหม่ :</label>
			
			<input type="date" id="due_date_renew" class="form-control"> 
			<label for="message-text" class="col-form-label">หมายเหตุ :</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" id="send_renew">ส่ง</button>
      </div>
    </div>
  </div>
</div>
                        </div>
                        
                    </div>
                </div>
				 
            </div>
			
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-book" aria-hidden="true"></i> JOBORDER ID :
                            <?php echo $row['no_id'];?>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <form name="add_job" id="add_job" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="request_date">วันที่ร้องขอ (Request Date)</label>
                                        <input type="date" class="form-control" id="request_date" name="request_date" value="<?php echo $row['request_date']?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="due_date">วันที่ต้องการเสร็จ (Due Date)</label>
                                        <input type="date" class="form-control" id="due_date" name="due_date" required value="<?php echo $row['due_date'];?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p style="display:none;" id="part_name_get">
                                            <?php echo $row['part_name'];?>
                                        </p>
                                        <label for="part_name" id="add_part_name">ชื่อชิ้นส่วน (Part Name)</label>
                                        <span id="g_partname"></span>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p style="display:none;" id="part_id_get">
                                            <?php echo $row['part_id'];?>
                                        </p>
                                        <label for="part_id" id="add_part_id">หมายเลขชิ้นงาน (Part ID)</label>
                                        <span id="g_part_id"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="tool_name">ชื่อทูล (Tool Name)</label>
                                        <input type="text" class="form-control" id="tool_name" name="tool_name" placeholder="ชื่อทูล" value="<?php echo $row['tool_name'];?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="asset_id">หมายเลขทูล (Asset ID)</label>
                                        <input type="text" class="form-control" id="asset_id" name="asset_id" placeholder="หมายเลขทูล" value="<?php echo $row['asset_id'];?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <b style="text-decoration:underline;">ประเภทของทูล (Tool Type)</b>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" value="1" required disabled <?php echo ($row[
                                            'tool_type']==1 ? "Checked" : ""); ?>>
                                        <label class="form-check-label">โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" value="2" required <?php echo ($row[ 'tool_type']==2
                                            ? "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">แม่พิมพ์ปั๊มโลหะ (Punch & Die)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" value="3" required disabled <?php echo ($row[
                                            'tool_type']==3 ? "Checked" : ""); ?>>
                                        <label class="form-check-label">โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" value="4" required disabled <?php echo ($row[
                                            'tool_type']==4 ? "Checked" : ""); ?>>
                                        <label class="form-check-label">จิ๊กและฟิกเจอร์ (Jig & Fixture)</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" value="5" required disabled <?php echo ($row[
                                            'tool_type']==5 ? "Checked" : ""); ?>>
                                        <label class="form-check-label">โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input options" name="tool_type" type="checkbox" id="other_type_select" value="6" required disabled
                                            <?php echo ($row[ 'tool_type']==6 ? "Checked" : ""); ?>>
                                        <label class="form-check-label">อื่นๆ (Other)</label>

                                    </div>
                                    <input type="text" class="form-control" id="other_type" name="other_type" placeholder="ระบุ" readonly value="<?php echo $row['tool_type_other'];?>">
                                </div>
                                <div class="col-md-12 mb-2 mt-2">
                                    <b style="text-decoration:underline;">ลักษณะงาน (Work Type)</b>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_new" type="checkbox" value="Y" <?php echo ($row[ 'wt_new']=='Y' ? "Checked" : "");
                                            ?> disabled>
                                        <label class="form-check-label">ทำใหม่ (New)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_replace" type="checkbox" value="Y" <?php echo ($row[ 'wt_replace']=='Y' ?
                                            "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">ทำใหม่เพื่อแทนของเดิม (Replace)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_other" id="other_wt" type="checkbox" value="Y" <?php echo ($row[ 'wt_other']=='Y'
                                            ? "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">อื่นๆ (Other)</label>
                                    </div>
                                    <input type="text" class="form-control" id="other_wt_form" name="other_wt_form" placeholder="ระบุ" readonly value="<?php echo $row['other_wt_form'];?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_modify" type="checkbox" value="Y" <?php echo ($row[ 'wt_modify']=='Y' ?
                                            "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">ดัดแปลง (Modify)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_sample" id="wt_sample_select" type="checkbox" value="Y" <?php echo ($row[
                                            'wt_sample']=='Y' ? "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">ตัวอย่าง (Sample)</label>

                                    </div>
                                    <div class="mb-3" id="wt_sample_form" style="">
                                        <input type="text" class="form-control" name="wt_sample_form" placeholder="" value="<?php echo $row['wt_sample_form'];?>"
                                            disabled>

                                    </div>
                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_repair" type="checkbox" value="Y" <?php echo ($row[ 'wt_repair']=='Y' ?
                                            "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">ซ่อม (Repair)</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" name="wt_pd" id="wt_pd_select" type="checkbox" value="Y" <?php echo ($row[ 'wt_pd']=='Y'
                                            ? "Checked" : ""); ?> disabled>
                                        <label class="form-check-label">ผลิต (Production)</label>
                                    </div>
                                    <div class="mb-3" id="wt_pd_form">
                                        <input type="text" class="form-control" name="wt_pd_form" placeholder="" disabled value="<?php echo $row['wt_pd_form'];?>">

                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">

                                        <label for="estimated">จำนวนที่ใช้ต่อปี: (estimated annual consumption)</label>
                                        <input type="text" class="form-control" id="estimated" name="estimated" placeholder="จำนวนที่ใช้ต่อปี" value="<?php echo $row['estimated'];?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <b style="text-decoration:underline;">รายละเอียดของงาน: (Description of Work Required)</b>
                                    <textarea class="form-control" name="detail_work" rows="3" placeholder="ข้อความ" readonly><?php echo $row['detail_work'];?>
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detail_file" style="text-decoration:underline;">แนบไฟล์รายละเอียดงาน</label>

                                        <?php 
                                    
                                    if($row['detail_file'] == ""){
                                        echo '<ul class="list-group" style="">';
                                        echo '<li class="list-group-item">
                                        <span class="badge"></span>
                                        
                                        <a href="#">No Document.</a>
                                      </li>';
                                    }else{
                                        $array_file = explode(",",$row['detail_file']);
                                        for($i=0;$i<count($array_file);$i++){
                                            $arr_file_name = explode("__",$array_file[$i]);
                                            $arr_exten_name = explode(".",$arr_file_name[1]);
                                            $file_show = $arr_file_name[0].'.'.$arr_exten_name[1];
                                            echo '<li class="list-group-item">
                                            <a href="upload/'.$array_file[$i].'" target="_blank">'.$file_show.'</a>
                                      </li>';
                                    }
                                }
                                ?>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <b style="text-decoration:none;">หมายเหตุ (Remark)</b>
                                    <textarea class="form-control" name="remark" rows="3" placeholder="หมายเหตุ" readonly><?php echo $row['remark'];?>
                                    </textarea>

                                </div>
                                <div class="col-md-12">
                                    <?php 
                                        $sql = "SELECT id_member,username,position FROM member";
                                        $result = $conn->query($sql);
                                        ?>
                                    <b style="text-decoration:none;">ผู้รับ (Received by)</b>
                                    <select class="form-control" name="received" id="received" readonly>
                                        <option value="">เลือกผู้รับ</option>
                                        <?php 
                                                while($row2 = $result->fetch_assoc()){
                                                    echo '<option value="'.$row['id_member'].'" '.($row['received'] == $row2['id_member'] ? 'selected' : '').'>'.$row2['username'].' | '.$row2['position'].'</option>';
                                                }
                                                ?>
                                    </select>

                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label>ไฟล์ที่แนบมาด้วย (Attached Document)</label>


                                        <?php 
                                    
                                    if($row['attachedfile'] == ""){
                                        echo '<ul class="list-group" style="">';
                                        echo '<li class="list-group-item">
                                        <span class="badge"></span>
                                        
                                        <a href="#">No Document.</a>
                                      </li>';
                                    }else{
                                        $array_file = explode(",",$row['attachedfile']);
                                        for($i=0;$i<count($array_file);$i++){
                                            $arr_file_name = explode("__",$array_file[$i]);
                                            $arr_exten_name = explode(".",$arr_file_name[1]);
                                            $file_show = $arr_file_name[0].'.'.$arr_exten_name[1];
                                            echo '<li class="list-group-item">
                                            <a href="upload/'.$array_file[$i].'" target="_blank">'.$file_show.'</a>
                                      </li>';
                                    }
                                }
                                ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">


                            </div>
                        </div>

                    </form>

                    <!-- /.card-body -->

                </div>
            </div>

        </div>
        <!-- /.row -->

</div>
<!-- /.container-fluid -->