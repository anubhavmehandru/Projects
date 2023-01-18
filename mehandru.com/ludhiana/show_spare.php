										<div class="col-md-12">
                                                <div class="panel panel-default">
                                                        <h4 class="pull-center" style="margin-left:15px;">Spare Demand</h4>
														<div class="panel-footer" style="border-bottom:1px solid lightgray;border-radius:0px;padding:2px;">
																
                                                        </div>
                                                        <div class="panel-body">
															<table class="table table-striped">
																	<tr>
																			<th>Sr.No.</th>
																			<th>Callid</th>
																			<th>Spare Part</th>
																			<th>Price</th>
																			<th>Create Date</th>
																			<th>Send Date</th>
																			<th>Status</th>
																			<th>Action</th>
																			
																	</tr>
                                                              <?php
																	$count=0;
																if(isset($_GET['callid']))
																{
																	$sql="select * from stock where callid=".$_GET['callid'];
																}
																else
																{
																	$sql="select * from stock limit 0";
																}
																	$result=mysqli_query($con,$sql);
																	while($row=mysqli_fetch_array($result))
																	{
																		$count++;
																		echo "<tr>
																					
																						<td>".$count."</tD>
																						<td>";
																						$rr="select * from `call` where id=".$row['callid'];
																						$rr1=mysqli_query($con,$rr);
																						if($rro=mysqli_fetch_array($rr1))
																							{
																								echo $rro['callid'];
																							}
																						
																						echo "</tD>
																						<td>".$row['item']."</tD>
																						<td>".$row['price']."</tD>
																						<td>".$row['cdate']."</tD>
																						<td>".$row['adate']."</tD>
																						<td>".$row['status']."</tD>
																						<td>";
																					if($_SESSION['status']=="Stock Manager")
																					{
																						if($row['status']=="Demand")
																							{
																								echo "<a href='?page=show_spare&&send=".$row['id']."&&callid=".$_GET['callid']."'>Send</a>";
																							}
																						if($row['status']=="Reject")
																							{
																								echo "<a href='?page=show_spare&&resend=".$row['id']."&&callid=".$_GET['callid']."'>Re-Send</a>";
																							}	
																					}
																					if($_SESSION['status']=="Manager")
																					{
																						if($row['status']=="Send")
																							{
																								echo "<a href='?page=show_spare&&r=".$row['id']."&&callid=".$_GET['callid']."'>Accept</a>";
																								echo "| <a href='?page=show_spare&&r=".$row['id']."&&callid=".$_GET['callid']."'>Reject</a>";
																							}
																					}
																					if($_SESSION['status']=="admin")
																					{
																							if($row['status']=="Demand")
																							{
																								echo "<a href='?page=show_spare&&send=".$row['id']."&&callid=".$_GET['callid']."'>Send</a>";
																							}
																							if($row['status']=="Send")
																							{
																								echo "<a href='?page=show_spare&&r=".$row['id']."&&callid=".$_GET['callid']."'>Accept</a> ";
																								echo "| <a href='?page=show_spare&&nr=".$row['id']."&&callid=".$_GET['callid']."'>Reject</a>";
																							}
																							if($row['status']=="Reject")
																							{
																								echo "<a href='?page=show_spare&&resend=".$row['id']."&&callid=".$_GET['callid']."'>Re-Send</a>";
																							}
																					}
																						echo "</tD>
																						</tr>";
																	}
																?>
															</table>
                                                        </div>
                                                        <div class="panel-footer">
															
															<?php
																if($_SESSION['status']=="Stock Manager" or $_SESSION['status']=="admin")
																{
																					
																	$sql="select * from notification where callid=".$_GET['callid'];
																	$result=mysqli_query($con,$sql);
																	$record=mysqli_num_rows($result);
																	if($record==0)
																		{
																			echo '<form method="post">
																					<input type="submit" value="Not In Stock" class="btn btn-info pull-right" name="stock"/>
																				</form>';
																		}
																}
																	if(isset($_POST['stock']))
																		{
																				$date=date("y-m-d");
																				$time=date("h:i:sa");
																				$sql="insert into notification values(null,'$_GET[callid]','not in stock','$date','$time')";
																				if(mysqli_query($con,$sql))
																					{
																						echo "<script>window.location='index.php?page=".$_GET['page']."&&callid=".$_GET['callid']."';</script>";
																					}
																		}
															?>
															<br/>
															<br/>
                                                        </div>
                                                </div>
                                        </div>
                                        
 <!-------------------------Start Add Enquiry -------------->                                       

           <?php
           
            if(isset($_GET['send']))
            {
					$date=date("y-m-d");
					$time=date("h:i:sa");
		
                    $sql="update stock set adate='$date', atime='$time', `status`='Send' where id=".$_GET['send'];
                    if(mysqli_query($con,$sql))
					{
						echo '<script>window.location="?page='.$_GET['page'].'&&callid='.$_GET['callid'].'";</script>';
                    }
            }
			if(isset($_GET['resend']))
            {
					$date=date("y-m-d");
					$time=date("h:i:sa");
		
                    $sql="update stock set `status`='Send' where id=".$_GET['resend'];
                    if(mysqli_query($con,$sql))
					{
						$s="select item from stock where id=".$_GET['resend'];
						$r=mysqli_query($con,$s);
						if($ro=mysqli_fetch_array($r))
							{
								$item=$ro['item'];
							}
						$sk="insert into stock_hist values(null,'$_GET[callid]','$item','$date','$time','Send')";
						mysqli_query($con,$sk);
						echo '<script>window.location="?page='.$_GET['page'].'&&callid='.$_GET['callid'].'";</script>';
                    }
            }
            if(isset($_GET['r']))
            {
					$date=date("y-m-d");
					$time=date("h:i:sa");
			
                    $sql="update stock set `status`='Receive' where id=".$_GET['r'];
                    if(mysqli_query($con,$sql))
					{
						echo '<script>window.location="?page='.$_GET['page'].'&&callid='.$_GET['callid'].'";</script>';
                    }
            }
			
            if(isset($_GET['nr']))
            {
					$date=date("y-m-d");
					$time=date("h:i:sa");
		
                    $sql="update stock set `status`='Reject' where id=".$_GET['nr'];
					if(mysqli_query($con,$sql))
					{
						$s="select item from stock where id=".$_GET['nr'];
						$r=mysqli_query($con,$s);
						if($ro=mysqli_fetch_array($r))
							{
								$item=$ro['item'];
							}
							
						$sk="insert into stock_hist values(null,'$_GET[callid]','".$item."','$date','$time','Reject')";
						mysqli_query($con,$sk);
								
						echo '<script>window.location="?page='.$_GET['page'].'&&callid='.$_GET['callid'].'";</script>';
                    }
            }
           
           
           
           
           
           
           
           
           ?>