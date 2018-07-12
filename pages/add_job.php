<?php 
    include "config/dbh.inc.php";
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="?p=main" class="btn btn-sm btn-danger pull-right">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                            <h3 class="card-title">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Job Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <form name="add_job" id="add_job" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="request_date">วันที่ร้องขอ (Request Date)</label>
                                            <input type="date" class="form-control" id="request_date" name="request_date" value="<?php echo date('Y-m-d');?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="due_date">วันที่ต้องการเสร็จ (Due Date)</label>
                                            <input type="date" class="form-control" id="due_date" name="due_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="part_name" id="add_part_name">ชื่อชิ้นส่วน (Part Name)</label>
                                            <input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success btn-sm pull-right" id="add_partid">
                                                <i class="fa fa-plus" aria-hidden="true"></i> ADD</button>
                                            <button type="button" class="btn btn-primary btn-sm pull-right" id="search_partid" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <th style="width: 20px">PARTID</th>
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
                                            <label for="part_id" id="add_part_id">หมายเลขชิ้นงาน (Part ID)</label>
                                            <input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="tool_name">ชื่อทูล (Tool Name)</label>
                                            <input type="text" class="form-control" id="tool_name" name="tool_name" placeholder="ชื่อทูล">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="asset_id">หมายเลขทูล (Asset ID)</label>
                                            <input type="text" class="form-control" id="asset_id" name="asset_id" placeholder="หมายเลขทูล">
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
                                            <input class="form-check-input options" name="tool_type" type="checkbox" value="1" required>
                                            <label class="form-check-label">โมลด์หล่ออลูมิเนียม (Gravity Die Cast Mould)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input options" name="tool_type" type="checkbox" value="2" required>
                                            <label class="form-check-label">แม่พิมพ์ปั๊มโลหะ (Punch & Die)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input options" name="tool_type" type="checkbox" value="3" required>
                                            <label class="form-check-label">โมลด์ฉีดอลูมิเนียม (High Pressure Die Cast Mould)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input options" name="tool_type" type="checkbox" value="4" required>
                                            <label class="form-check-label">จิ๊กและฟิกเจอร์ (Jig & Fixture)</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input options" name="tool_type" type="checkbox" value="5" required>
                                            <label class="form-check-label">โมลด์เหวี่ยงพลาสติก (Plastic Rotational Mould)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input options" name="tool_type" type="checkbox" id="other_type_select" value="6" required>
                                            <label class="form-check-label">อื่นๆ (Other)</label>

                                        </div>
                                        <input type="text" class="form-control" id="other_type" name="other_type" placeholder="ระบุ">
                                    </div>
                                    <div class="col-md-12 mb-2 mt-2">
                                        <b style="text-decoration:underline;">ลักษณะงาน (Work Type)</b>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_new" type="checkbox" value="Y">
                                            <label class="form-check-label">ทำใหม่ (New)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_replace" type="checkbox" value="Y">
                                            <label class="form-check-label">ทำใหม่เพื่อแทนของเดิม (Replace)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_other" id="other_wt" type="checkbox" value="Y">
                                            <label class="form-check-label">อื่นๆ (Other)</label>
                                        </div>
                                        <input type="text" class="form-control" id="other_wt_form" name="other_wt_form" placeholder="ระบุ">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_modify" type="checkbox" value="Y">
                                            <label class="form-check-label">ดัดแปลง (Modify)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_sample" id="wt_sample_select" type="checkbox" value="Y">
                                            <label class="form-check-label">ตัวอย่าง (Sample)</label>
                                        </div>
                                        <div class="input-group mb-3" id="wt_sample_form">
                                            <input type="text" class="form-control" name="wt_sample_form" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ชิ้น/(Pieces)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_repair" type="checkbox" value="Y">
                                            <label class="form-check-label">ซ่อม (Repair)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="wt_pd" id="wt_pd_select" type="checkbox" value="Y">
                                            <label class="form-check-label">ผลิต (Production)</label>
                                        </div>
                                        <div class="input-group mb-3" id="wt_pd_form">
                                            <input type="text" class="form-control" name="wt_pd_form" placeholder="">
                                            <div class="input-group-append">
                                                <span class="input-group-text">ชิ้น/(Pieces)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">

                                            <label for="estimated">จำนวนที่ใช้ต่อปี: (estimated annual consumption)</label>
                                            <input type="text" class="form-control" id="estimated" name="estimated" placeholder="จำนวนที่ใช้ต่อปี">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <b style="text-decoration:underline;">รายละเอียดของงาน: (Description of Work Required)</b>
                                        <textarea class="form-control" name="detail_work" rows="3" placeholder="ข้อความ"></textarea>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="detail_file" style="text-decoration:underline;">แนบไฟล์รายละเอียดงาน</label>


                                            <input type="file" class="form-control" name="detail_file[]">


                                            <button type="button" id="btn_addfile_detail" class="btn btn-default btn-sm">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add More</button>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <b style="text-decoration:none;">หมายเหตุ (Remark)</b>
                                        <textarea class="form-control" name="remark" rows="3" placeholder="หมายเหตุ"></textarea>

                                    </div>
                                    <div class="col-md-12">
                                        <?php 
										$user_id = $_SESSION['id'];
                                        $sql = "SELECT id_member,username,position FROM member WHERE id_member != '$user_id' AND (MGR1 != '' OR MGR2 != '')";
                                        $result = $conn->query($sql);
                                        ?>
                                        <b style="text-decoration:none;">ผู้รับ (Received by)</b>
                                        <select class="form-control" name="received" id="received">
                                            <option value="">เลือกผู้รับ</option>
                                            <?php 
                                                while($row = $result->fetch_assoc()){
                                                    echo '<option value="'.$row['id_member'].'">'.$row['username'].' | '.$row['position'].'</option>';
                                                }
                                                ?>
                                        </select>

                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="form-group">
                                            <label>ไฟล์ที่แนบมาด้วย (Attached Document)</label>


                                            <input type="file" class="form-control" name="attachedfile[]">


                                            <button type="button" id="btn_addfile_attachedfile" class="btn btn-default btn-sm">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add More</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">

                                    <button type="submit" class="btn btn-success float-right" id="submit_form">Process Job.</button>
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
    </section>
    <!-- /.content -->
</div>