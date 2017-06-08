<?php 
//echo "hi";
?>

    <!-- Custom Theme Style -->
   
   <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Comemnt</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                    <table id="example1" class="table table-bordered table-striped">
                       
                      <thead>
                        <tr>
							<th>No</th>
							<th>Date</th>
							<th>Details</th>
							<th>Staff</th>
							<th>Status</th>
							                 
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php
					 	$rsp="SELECT * FROM vw_respond WHERE form_id='$fid'";
						$res = $conn->query($rsp);
						while($resp = $res->fetch_array()) {
						
						$caseid = $resp['case_id'];
						$cat_code = $resp['cat_code'];
						$res_desc = $resp['res_desc'];
						$res_date = $resp['res_date'];
						$stat_desc = $resp['stat_desc'];
						$fname = $resp['responden_name'];
				 
						
						echo "<tr>\n";	
						echo "	<td ><span class=\"user_table_txt\">$no</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$res_date</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$res_desc</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$fname</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$stat_desc</span></td>\n";	
						
						echo "</tr>\n";
											
						$no=$no+1;	
						}
					  ?>
					  
                     
						</tbody>
						</table>
						
					</div>
				</div>
 