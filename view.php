    <!-- Custom Theme Style -->
   <script type="text/javascript">
function del_id(id)
{
 if(confirm('Sure to delete this record ?'))
 {
  window.location='delete_userx.php?delete_id='+id
 }
}
function edit_id(id)
{
 if(confirm('Sure to edit this record?'))
 {
  window.location='view_edit.php?edit_id='+id
 }
 }
</script>
   <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of issues</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="text-left mtop20">
					<a href="header.php?task=gene&wtp_id=<?php echo $wtp_id?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
				</div><br>
                    <table id="example2" class="table table-bordered table-hover">
                       
                      <thead>
                        <tr>
							<th>No</th>
							<th>Staff</th>
							<th>Details</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
							<th>Comments</th>                         
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php
					 	if ($ulvl_id=='16' OR  $ulvl_id=='12'){
						  $sql = "SELECT * from vw_formres where status_id!=6";
						}else{
						   $sql = "SELECT * from vw_formres where user_id=$sid";
						 }
								
								$faq = $conn->query($sql);
								
								$no=1;
								 foreach($faq as $k) {
								 
										 $fname=$k["fname"];
										$uid=$k["form_id"];
										$form_desc2=$k["form_desc"];
										$form_desc = wordwrap($form_desc2, 60, "<br>");		
										$form_date=$k["form_date"];
										$stat_desc=$k["stat_desc"];
										$stat_id=$k["status_id"];
										$cid=$k["case_id"];
										
											$rspC="SELECT * FROM vw_respond WHERE form_id='$uid'";
											$respC = $conn->query($rspC);
											$resC=$respC->num_rows;
										
										
										
										echo "<tr>\n";	
										echo "	<td ><span class=\"user_table_txt\">$no</span></td>\n";
										echo "	<td ><span class=\"user_table_txt\">$fname</span></td>\n";
										echo "	<td ><span class=\"user_table_txt\">$form_desc</span></td>\n";
										echo "	<td ><span class=\"user_table_txt\">$form_date</span></td>\n";		
										echo "	<td ><span class=\"user_table_txt\">$stat_desc</span></td>\n";	
										if ($ulvl_id==16){ // If IT & Admin //
												 $actionView="<a href='javascript:edit_id=$uid;'><i class='fa fa-edit'></i>
												&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:del_id=$uid;'><i class='fa fa-trash'></i></a>";
												
												$a="<a href='main.php?t=res&edit_id=$uid&cid=$cid' >Respond
												<span class='label label-warning pull-right'>$resC</span></a>";	
												 
												} else {
														
												 $actionView='-';
												
												if ($stat_id==6){
															$a="<a href='case.php?edit_id=$uid&cid=$cid'>View</a>";
																	
													}else{
															$a="<a href='respond.php?edit_id=$uid&cid=$cid&sol=Y'>Confirm Solved</a> || <a href='respond.php?edit_id=$uid&cid=$cid&sol=N'>Comment</a>";
													}
												}  
										echo "<td>$actionView </td>";							
										echo "<td>$a</td>";
										echo "</tr>\n";
											
						$no=$no+1;	
						}
					  ?>
					  
                     
						</tbody>
						 <tfoot>
                <tr>
							<th>No</th>
							<th>Staff</th>
							<th>Details</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
							<th>Comments</th>        
                </tr>
                </tfoot>
						</table>
						
					</div>
				</div>
 <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>