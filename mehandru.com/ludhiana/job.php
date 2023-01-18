
<script>
 
						function p()
						{
							var x=document.getElementById("print_div").innerHTML;
							document.write("<html><body>"+x+"</body></html>");
							window.print();
							window.location="?page=main";
						}
														    
    
 </script>   
 <?php
		include 'include/conn.php';
		$sql="select * from `call` where id=".$_GET['view'];
		$result=mysqli_query($con,$sql);
		if($row=mysqli_fetch_array($result))
		{
				$callid=$row['callid'];
				$name=$row['customername'];
				$model=$row['model'];
				$serial=$row['serialno'];
				$date=$row['date'];
				$problem=$row['problem'];
				
				$sql12="select * from login where id in (select user from rassign where callid='$_GET[view]')";
				$result12=mysqli_query($con,$sql12);
				if($row12=mysqli_fetch_array($result12))
				{
						$user= $row12['user'];
				}
				
				$sql13="select * from estimate_temp where callid=".$_GET['view'];
				$result12=mysqli_query($con,$sql13);
				if($row12=mysqli_fetch_array($result12))
				{
						$spare= $row12['spare'];
						$price= $row12['price'];
						$total= $row12['total'];
						$adate= $row12['adate'];
				}
				$sql12="select * from login where id in (select user from assign where callid='$_GET[view]')";
				$result12=mysqli_query($con,$sql12);
				if($row12=mysqli_fetch_array($result12))
				{
						$estimated= $row12['user'];
				}
				
		}
 ?>
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">
								
									<h4>Job Card
                                
								<input type="button" value="Take Print Out" class="btn btn-info pull-right" onclick="p()"/>
                                </h4>
								<hr/>
								<div id="print_div">
								<table cellpadding="5" border="1" style="width:350px;font-size:11px;" >
										<tr>
												<td colspan="4" align="center"><b>Job Card</b></td>
										</tr>
										<tr>
												<td colspan="2">Customer Name</td>
												<td colspan="2"><?php echo $name; ?></td>
										</tr>
										<tr>
												<td>Job No</td>
												<td><?php echo $callid; ?></td>
												<td>Model</td>
												<td><?php echo $model; ?></td>
										</tr>
										<tr>
												<td>Date</td>
												<td><?php echo $date; ?></td>
												<td>Serial</td>
												<td><?php echo $serial; ?></td>
										</tr>
										<tr>
												<td colspan="4">Problem Reported</td>											
										</tr>
										<tr>
												<td colspan="4"><?php echo $problem; ?></td>												
										</tr>
										<tr>
												<td colspan="2">Job Assign To</td>
												<td colspan="2">Er. <?php echo $user; ?></td>
										</tr>
										<tr>
												<td colspan="4"><b>Estimate of Repair</b></td>												
										</tr>
										<tr>
												<td>Sr. No</td>
												<td>Spare Parts Required</td>
												<td>Y/N</td>
												<td>Price</td>
										</tr>
									<?php	
																		$sp=explode(',',$spare);
																		$sp_p=explode(',',$price);
																		$lenth=count($sp);
																		for($i=1;$i<$lenth;$i++)
																		{
																			echo "<tr>
																							<td>".$i."</td>
																							<td>".$sp[$i]."</td>
																							<td></td>
																							<td>".$sp_p[$i]."</td>
																				</tr>";
																		}	
										?>
										
																		
										<tr>
												<td colspan="3"><b>Total Cost of Repair</b></td>
												<td><?php echo $total; ?></td>
										</tr>
										<tr>
												<td colspan="2">Estimated By Engineer</td>
												<td colspan="2">Er. <?php echo $estimated; ?></td>
										</tr>
										<tr>
												<td colspan="2">Date of Approval</td>
												<td colspan="2"><?php echo $adate; ?></td>
										</tr>
										<tr>
												<td colspan="2">Approval By</td>
												<td colspan="2"></td>
										</tr>
										<tr>
												<td colspan="2">Spares Issued By</td>
												<td colspan="2"></td>
										</tr>
										<tr>
												<td colspan="2">Spares Received By</td>
												<td colspan="2"></td>
										</tr>
										<tr>
												<td colspan="2">Invoice No & Date</td>
												<td colspan="2"></td>
										</tr>
										<tr>
												<td colspan="2">Payment Mode</td>
												<td colspan="2">
														<input type="checkbox"/>Credit
														<input type="checkbox"/>Cheque
														<input type="checkbox"/>Cash
												</td>
										</tr>
										<tr>
												<td colspan="4"> Remarks</td>
										</tr>
										<tr>
												<td colspan="4">|</td>
										</tr>
										<tr>
												<td colspan="2">Spares and Service Billing</td>
												<td>Yes</td>
												<td>No</td>
										</tr>
								</table>
								
							</div>
						</div>
                <div class="panel-footer">
							
                </div>
             </form>
        </div>
</div>
 
 
 
 
 
 