<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CITKK SYSTEM</title>
  <?php include ('csslink.php'); ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php include ('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include ('aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CITKK Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
        <?php 
		 $flag = (isset($_GET['t'])) ? $_GET['t'] : null;
				 switch ( $flag ) {
					case "fm":
						include('form.php'); 
					break;
					case "list":
						include('view.php'); 
					break;
					case "listS":
						include('v2.php'); 
					break;
					case "res":
						include('respond.php'); 
					break;
					case "user":
						include('um/user.php'); 
					break;
				 default:
						include('dash.php'); 
				 }
		
		
		
		
		 ?>
    </section>
   
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.12
    </div>
    <strong>Copyright &copy; 2017 <a href="http://chemsain.net">Chemsain IT Sdn Bhd </a>.</strong> All rights
    reserved.
  </footer>

	<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<?php include ('jslink.php');?>
</body>
</html>
