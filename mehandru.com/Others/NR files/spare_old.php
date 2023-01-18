										<div class="col-md-12">
                                                <div class="panel panel-default">
                                                        <h4 >Spare Demand</h4>
														<div class="panel-footer phead">
																<form class="form-horizontal" method="post">
																	<table class="myt">
																			<tr>
																					<td><label class="control-label">Type&nbsp;&nbsp;</label> </td>
																					<td>
																						<select class="form-control" name="type">
																								<option value="">All</option>
																								<option>Demand</option>
																								<option>Send</option>
																								<option>Receive</option>
																						</select>
																					</td>
																					<td>
																						<input type="submit" value="Go" name="srch" class="btn btn-info">
																					</td>
																			</tr>
																	</table>
																</form>
                                                        </div>
                                                        <div class="panel-body ">
															<table class="table table-striped">
																	<tr>
																			<th>Sr.No.</th>
																			<th>Call ID</th>
																			<th>Product</th>
																			<th>Model</th>
																			<th>Serial No</th>
																			<th>Action</th>
																			
																	</tr>
                                                              <?php
																	$count=0;
																if(isset($_POST['srch']))
																{
																	$sql="select * from `call` where id in (select callid from stock where status like('%$_POST[type]%'))";
																}
																else
																{
																	$sql="select * from `call` where id in (select callid from stock where status!='Receive')";
																}
																	$result=mysqli_query($con,$sql);
																	while($row=mysqli_fetch_array($result))
																	{
																		$count++;
																		echo "<tr>
																					<td>".$count."</td>
																					<td>".$row['callid']."</td>
																					<td>".$row['product']."</td>
																					<td>".$row['model']."</td>
																					<td>".$row['serialno']."</td>
																					<td><a href='index.php?page=show_spare&&callid=".$row['id']."'>View Spare</a></td>
																				</tr>";
																	}
																?>
															</table>
                                                        </div>
                                                        <div class="panel-footer panel-foot">
                                                            
                                                            <br/><br/>
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
						echo '<script>window.location="?page='.$_GET['page'].'";</script>';
                    }
            }
            if(isset($_GET['r']))
            {
					$date=date("y-m-d");
					$time=date("h:i:sa");
		
                    $sql="update stock set `status`='Receive' where id=".$_GET['r'];
                    if(mysqli_query($con,$sql))
					{
						echo '<script>window.location="?page='.$_GET['page'].'";</script>';
                    }
            }
           
           
           
           
           
           
           
           ?>