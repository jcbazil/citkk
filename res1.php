 
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Respond to Case</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <form method='post'>
				
						<select class="form-control" name='stat_id'>
						
					   <?php
					 	echo "<option value='$stat_id'>$stat_desc</option>";
							
								$query = "SELECT * FROM it_status"; 
								$surface = $conn->query($query);
								
								foreach($surface as $k) {
										 $statid=$k["stat_id"];
										 $statdesc=$k["stat_desc"];
										 
						echo "<option value='$statid'>$statdesc</option>"."<BR>";
						echo "<br />";
							}		
						?>
					  </select>
				  
              </div><br>
              
              <div class="form-group">
				<tr>
		<td>Date Respond:</td>
		<td><?php echo $p_dtappoint;?>
		
		<input type='hidden' name='cid' width='10px' value='<?php echo $cid;?>'>
		<input type='date' name='dat' width='10px' value='<?php echo $p_dtappoint;?>'>
		<input type='hidden' name='form_id' width='30px' value='<?php echo $fid;?>'>
		<input type='hidden' name='sid' width='10px' value='<?php echo $sid;?>'></td>
	</tr><tr>
			  </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name='res_desc'>
                     Action Taken
                    </textarea>
              </div>
           <!--    <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                
                <button type="submit" class="btn btn-primary" name='btn-save'><i class="fa fa-envelope-o"></i> Save</button>
				</form>
              </div>
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
   <?php
   
   
	if(isset($_POST['btn-save'])){
	include("config.php");
	
	$uid =  $_POST['sid'];
	$stat_id = $_POST['stat_id'];
	$cat_id = $_POST['cat_id'];
	//$catc = $_POST['cat_code'];
	$res_desc = $_POST['res_desc'];
	$fid = $_POST['form_id'];
	$cid = $_POST['cid'];
	$dat = $_POST['dat'];
	

		if ($cid==''){
		$sum=$conn->query("INSERT INTO it_case (form_id,case_dtstart,stat_id) VALUES ($fid,now(),$stat_id)");
		$cid=$conn->insert_id;
		
		$resp=$conn->query("INSERT INTO it_respond (case_id,res_desc,res_date,user_id) VALUES ('$cid','$res_desc',now(),'$uid')");
		}else{
		
		$resp=$conn->query("INSERT INTO it_respond (case_id,res_desc,res_date,user_id) VALUES ('$cid','$res_desc',now(),'$uid')");
		
		
		 
	echo	$re=$conn->query("UPDATE  it_form SET status_id='$stat_id',form_close=now() WHERE form_id=$fid");
	
	echo	$reCase=$conn->query("UPDATE  it_case SET stat_id='$stat_id',case_dtclose_close=now() WHERE case_id=$cid");

		
		}

		
	if($re)
		 {
		  ?>
		  <script>
		  alert('Record inserted...');
				window.location='view.php'
				</script>
		  <?php
		 }
		 else
		 {
		 
		  ?>
		  <script>
		  alert('error inserting record...');
				window.location='view.php'
				</script>
		  <?php
		 }
	
	}
	

	
if(isset($_POST['btn-cmt'])){
	include("config.php");
	
	$sol =  $_POST['sol'];
	$uid =  $_POST['sid'];
	$cid =  $_POST['cid'];
	$res_desc = $_POST['res_desc'];
	
	if ($sol=='Y'){
	$stat_id = '6';
	//$dtclose = 'now()';
	}else{
	$stat_id = '2';
	$dtclose = '';
	}
	
	
	$resp=$conn->query("INSERT INTO it_respond (case_id,res_desc,res_date,user_id) VALUES ('$cid','$res_desc',now(),'$uid')");
	
	$re=$conn->query("UPDATE it_case SET stat_id=$stat_id,case_dtclose=now() WHERE case_id=$cid ");
	//$formclose=$conn->query("UPDATE it_case SET stat_id=$stat_id,case_dtclose=now() WHERE case_id=$cid ");
	$re->close();
	
	if($resp)
		 {
		  ?>
		  <script>
		  alert('Record inserted...');
				window.location='view.php'
				</script>
		  <?php
		 }
		 else
		 {
		 
		  ?>
		  <script>
		  alert('error inserting record...');
			//	window.location='view.php'
				</script>
		  <?php
		 }
	

}
   ?>