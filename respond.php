<?php

$fid = isset($_GET['edit_id']) ? $_GET['edit_id'] : '';
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';


$userCk="SELECT * FROM vw_form WHERE form_id='$fid'";
 $results = $conn->query($userCk);
 while($resU = $results->fetch_array()) {
   
 $form_desc = $resU['form_desc'];
 $stat_desc = $resU['stat_desc'];
 $stat_id = $resU['status_id'];
 $cat_id = $resU['cat_id'];
 $catd = $resU['cat_desc'];
 $catc = $resU['cat_code'];
 $form_date = $resU['form_date'];
 $fname = $resU['fname'];
 
   
}



?>
      <div class="row">
        <div class="col-md-3">
          <a href="main.php?t=list" class="btn btn-primary btn-block margin-bottom">Back to Case</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="main.php?t=res&r=resp&edit_id=<?php echo $fid?>&cid=<?php echo $cid?>"><i class="fa fa-inbox"></i> Respond to Case
                <li><a href="main.php?t=res&r=resL&edit_id=<?php echo $fid?>&cid=<?php echo $cid?>"><i class="fa fa-file-text-o"></i> List Comment</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>

              </ul>
            </div>
            <!-- /.box-body -->
          </div>
		      <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Case Details</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li> <b> Status : </b><?php echo $stat_desc;?></li>
                <li> <b> Date Issue:</b> <?php echo $form_date;?></li>
                <li><b>Category: </b><?php echo $catd;?></li> 
                <li> <b>Staff: </b><?php echo $fname;?></li>
                <li> <b>Details:</b> <br> <?php echo $form_desc;?></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->
        </div>
        <!-- START MAIN  -->
       <div class="col-md-9">
		 <?php 
		 $flag = (isset($_GET['r'])) ? $_GET['r'] : null;
				 switch ( $flag ) {
					case "resp":
						include('res1.php'); 
					break;
					case "resL":
						include('res2.php'); 
					break;
					case "res":
						include('respond.php'); 
					break;
				 default:
						include('res1.php'); 
				 }
		
		
		
		
		 ?>
	   
	   </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  