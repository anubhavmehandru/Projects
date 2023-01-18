
<script>
    $(document).ready(function(){
    });
            
    
 </script>   
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">
                           
                                <h4>Call Summary</h4>
                                <hr/>
								<table class="table table-striped">
										<tr>
												<td>Step</td>
												<td>Status</td>
												<td>Date</td>
												<td>Time</td>
										</tr>
                                  <?php
								  $count=0;
                            $sql="select * from `call` where `id`='$_GET[view]'";
                            $result=mysqli_query($con,$sql);
                            $counter=0;
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Start Call</td>
													<td>'.$row['date'].'</td>
													<td>'.$row['time'].'</td>
												</tr>';
							
							}
						$sql="select * from `assign` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
							$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Assign To Engineer for Estimate (';
														
														$sq="select * from assign where `callid`='$_GET[view]'";
														$res=mysqli_query($con,$sq);
														if($ro=mysqli_fetch_array($res))
															{
																$sql_eng="select * from login where `id`=".$ro['user'];
																$res_eng=mysqli_query($con,$sql_eng);
																if($row_eng=mysqli_fetch_array($res_eng))
																	{
																		echo $row_eng['user'];
																	}
															
															}
														echo ')</td>
													<td>'.$row['date'].'</td>
													<td>'.$row['time'].'</td>
												</tr>';
							}
						}
						$sql="select * from `estimate` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Send Estimate ( '.$row['receipt'].' ) By ';
														$sq="select * from assign where `callid`='$_GET[view]'";
														$res=mysqli_query($con,$sq);
														if($ro=mysqli_fetch_array($res))
															{
																$sql_eng="select * from login where `id`=".$ro['user'];
																$res_eng=mysqli_query($con,$sql_eng);
																if($row_eng=mysqli_fetch_array($res_eng))
																	{
																		echo $row_eng['user'];
																	}
															
															}
													
										echo 		'</td>
													<td>'.$row['rdate'].'</td>
													<td>'.$row['rtime'].'</td>
												</tr>';
							}
						}
						$sql="select * from `estimate` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
									$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>'.$row['approval'];
																$sqlx="select * from `approval` where `callid`='$_GET[view]'";
																$resultx=mysqli_query($con,$sqlx);
																$recordx=mysqli_num_rows($resultx);
																if($recordx>0)
																{
																	if($rowx=mysqli_fetch_array($resultx))
																	{ 
																		echo " By ".$rowx['name'];
																	}
																}
																
													echo '</td>
													<td>'.$row['adate'].'</td>
													<td>'.$row['atime'].'</td>
												</tr>';
							}
						}
						$sql="select * from `estimate` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
						 if($row['date']!="0000-00-00")
						 {
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>
															<table class="table">	
																			<tr>    <td colspan="2">Add Estimate</td>		</tr>';
																			
																		$sp=explode(',',$row['spare']);
																		$sp_p=explode(',',$row['price']);
																		$lenth=count($sp);
																		for($i=1;$i<$lenth;$i++)
																		{
																			echo "<tr>
																							<td>".$sp[$i]."</td>
																							<td>".$sp_p[$i]."</td>
																				</tr>";
																		}		
																			
																		echo "<tr>
																					<td>Total</td>
																					<td>".$row['total']."</td>
																			</tr>";	
										echo 				'</table>
													</td>
													<td>'.$row['date'].'</td>
													<td>'.$row['time'].'</td>
												</tr>';
							}
						 }
						}
						$sql="select * from `rassign` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Assign To Engineer for Repair (';
													
																$sql_eng="select * from login where `id`=".$row['user'];
																$res_eng=mysqli_query($con,$sql_eng);
																if($row_eng=mysqli_fetch_array($res_eng))
																	{
																		echo $row_eng['user'];
																	}
														
													
										echo ' )	</td>
													<td>'.$row['date'].'</td>
													<td>'.$row['time'].'</td>
												</tr>';
												echo "<a href='index.php?page=job&&view=$_GET[view]' class='pull-right'>
												<input type='button' value='Print Job Card' class='btn btn-success' style='margin-top:-115px;'></a>";
							}
						}
						$sql="select * from `rassign` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Ready</td>
													<td>'.$row['repair_date'].'</td>
													<td>'.$row['repair_time'].'</td>
												</tr>';
										
							}
						}
						$sql="select * from `delivered` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
							$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>Delivered</td>
													<td>'.$row['date'].'</td>
													<td>'.$row['time'].'</td>
												</tr>';
							}
						}

						
                              ?> 
							 
								
							  </table>
						</div>
                <div class="panel-footer">
							
                </div>
             </form>
        </div>
</div>
 
 
 
 
 
 