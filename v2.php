    <!-- Custom Theme Style -->
   
   <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of issues</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                    <table id="example1" class="table table-bordered table-striped">
                       
                      <thead>
                        <tr>
							<th>No</th>
							<th>Staff</th>
							<th>Details</th>
							<th>Date</th>
							<th>Status</th>
							                       
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php
					 	
						   $sql = "SELECT * from vw_formres where status_id>=5";
						 								
								$faq = $conn->query($sql);
								$no=1;
								 foreach($faq as $k) {
								 
										 $fname=$k["fname"];
										$uid=$k["form_id"];
										$form_desc=$k["form_desc"];
										$form_date=$k["form_date"];
										$stat_desc=$k["stat_desc"];
										$stat_id=$k["status_id"];
										$cid=$k["case_id"];
						echo "<tr>\n";	
						echo "	<td ><span class=\"user_table_txt\">$no</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$fname</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$form_desc</span></td>\n";
						echo "	<td ><span class=\"user_table_txt\">$form_date</span></td>\n";		
						echo "	<td ><span class=\"user_table_txt\">$stat_desc</span></td>\n";	
						
						echo "</tr>\n";
											
						$no=$no+1;	
						}
					  ?>
					  
                     
						</tbody>
						</table>
						
					</div>
				</div>
