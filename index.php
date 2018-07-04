<?php 
session_start();

if(isset($_GET['session_id'])){

}else{
	if(!isset($_SESSION['id'])){
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=login.php">';
		exit();
	}
}

if(isset($_SESSION['link_1'])){
  $link = strstr($_SESSION['link_1'],"index.php");
  $link2 = $link.'&login=1';
  unset($_SESSION['link_1']);
  $_SESSION['login'] = 1;
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=$link2'>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WE-EF | JOB ORDER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  
  <link rel="stylesheet" href="plugins/sweetalert2/dist/sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php 
  include("template/header.php");
  include("template/aside.php");
  ?>

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <?php 
  if(isset($_GET['p'])){
    $page = "pages/".$_GET['p'].'.php';
    if(file_exists($page)){
      include($page);
    }
    
  }else{
    include("pages/main.php");
  }
  ?>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="plugins/jquery/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->

<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<?php 
  if(isset($_GET['p'])){
    $page = "controllers/".$_GET['p'].'.controller.js';
    if(file_exists($page)){
      echo '<script src="'.$page.'"></script>';
    }
    
  }else{
    echo '<script src="controllers/main.controller.js"></script>';
  }
  ?>

</body>
</html>
