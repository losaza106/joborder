<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <a href="?p=add_job" class="btn btn-primary pull-right">Add +</a>
          <h1 class="m-0 text-dark">Job Order</h1>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title pull-left">รายการ Job Order</h3>
              <select class="form-control col-lg-2 pull-right" id="sort_by">
                <option value="1">Normal</option>
                <option value="2">TEMP</option>
              </select>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>

                    <th>เลขที่</th>
                    <th>วันที่ร้องขอ</th>
                    <th>วันที่ต้องการเสร็จ</th>
                    <th>ผู้ส่ง</th>
                    <th>ผู้รับ</th>
                    <th>สถานะ</th>
                    <th style="width: 40px">#</th>
                  </tr>
                  <tr>
                </thead>
                <tbody id="data_table">



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>