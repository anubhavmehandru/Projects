<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                         <div class="panel-body">
						 <h4>
                                <p class="pull-left">Call Summary</p>
								<p class="pull-right">Warranty - OnSite</p>
						</h4>
								<br/>
                                <table class="table table-striped">
										<tr>
												<th>Step</th>
												<th>Status</th>
												<th>Date</th>
												<th>Time</th>
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
						$type="";				
						$sql="select * from `en_call_type` where `call`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						if($row=mysqli_fetch_array($result))
							{
								$count++;
									$type=$row['type'];
									echo "<tr>
													<td>".$count."</td>
													<td>Call Type ( ".$row['type']." )</td>
													<td>".$row['date']."</td>
													<td>".$row['time']."</td>
											</tr>";
							}
						
		if($type=="On Site")
		{
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
						
						$sql="select * from `comment` where `callid`='$_GET[view]'";
						$result=mysqli_query($con,$sql);
						$record=mysqli_num_rows($result);
						if($record>0)
						{
                            if($row=mysqli_fetch_array($result))
                            {   
								$count++;
								echo '<tr>
											<td>'.$count.'</td>
											<td colspan="3">Comment ( '.$row['comment'].' )</td>
									  </tr>';
							}
						}

		}
		else
		{
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
																		$sp_p=explode(',',$row['price']);
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

		
		}
                              ?> 
							 
								
							  </table>
						</div>
                <div class="panel-footer panel-foot">
							<br/><br/>
                </div>
             </form>
        </div>
</div>
 
 
 
 
 
 