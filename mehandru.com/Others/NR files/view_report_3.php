
<script>
    $(document).ready(function(){
    });
            
    
 </script>   
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">
                           
                                  <h4 class="pull-left">Call Summary
									
								</h4>
								<h4 class="pull-right">Warranty - Carry In</h4>
								<br/><hr/>
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
													<td>Start Call ( '.$row['calltype'].' )</td>
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
													<td>Assign To Engineer (';
														
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
						 if($row['date']!="0000-00-00")
						 {
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
										echo '<tr>
													<td>'.$count.'</td>
													<td>
															<table class="table">	
																			<tr>    <td colspan="2">Part Consume</td>		</tr>';
																			
																		$sp=explode(',',$row['spare']);
																		$lenth=count($sp);
																		for($i=1;$i<$lenth;$i++)
																		{
																			echo "<tr>
																							<td>".$sp[$i]."</td>
																				</tr>";
																		}		
																			
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
 
 
 
 
 
 