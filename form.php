<div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Request Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method='post'>
              <div class="box-body">
			  <div class="form-group">
                  <label class="col-sm-2 control-label">Issue Category</label>
                 <div class="col-sm-10"> 
					<select class="form-control" name='cat'>
                 <?php
			echo "<option value=''></option>";
						
						$query = "SELECT * FROM it_cat"; 
						$surface = $conn->query($query);
						
						foreach($surface as $k) {
								 $cat_id=$k["cat_id"];
								 $cat_desc=$k["cat_desc"];
								 
								 echo "<option value='$cat_id'>$cat_desc</option>"."<BR>";
							echo "<br />";
						}		
		?>
                  </select></div>
                </div>
				 <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
				   <div class="col-sm-10"> 
                  <textarea class="form-control" rows="3" placeholder="Issue ..." name='desc'></textarea></div>
                </div> 
				<div class="form-group">
                  <label class="col-sm-2 control-label">Date</label>
				   <div class="col-sm-10"> 
                <input type='date' name='date' width='30px' value=''></div><input type='hidden' name='uid' value='<?php echo $user_id;?>'>
                </div>
              
             
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name='btn_save' class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        
          <!-- /.box -->
        </div>
		
		<?php

	if(isset($_POST['btn_save'])){
	
	$uid =  $_POST['uid'];
	$cat = $_POST['cat'];
	$desc = $_POST['desc'];
	$date = $_POST['date'];
	
	
	echo	$q="INSERT INTO it_form (user_id,cat_id,form_desc,form_date) VALUES ('$uid','$cat','$desc','$date')";
		$sum=$conn->query($q);
	if($sum)
		 {
		  ?>
		  <script>
		  alert('Record inserted...');
			//	window.location='form.php'
				</script>
		  <?php
		 }
		 else
		 {
		 
		  ?>
		  <script>
		  alert('error inserting record...');
				//window.location='form.php'
				</script>
		  <?php
		 }
	
	}

?>