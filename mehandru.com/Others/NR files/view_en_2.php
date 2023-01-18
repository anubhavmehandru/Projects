<!-- 
		Not Assign
		Pending Type
		Pending Parts
	-->
<script>
    $(document).ready(function(){
        $(".form-control").attr("disabled","disabled");
        $(".abc").attr("disabled","disabled");
        $(".assign_txt").attr("disabled",false);
			$(".edit").click(function(){
						$(".abc").removeAttr("disabled","disabled");
						 $(".form-control").removeAttr("disabled","disabled");
						 $(".edit").hide();
						 $(".sub").show();
						 
						$(".assign_txt").attr("disabled",false);
			});
			$("#adsp").click(function(){
						if($("#spareno").val()!="")
						{
							var a=parseInt($("#spareno").val())+1;
						}
						else
						{
								var a=1;
						}
						$st="<input type='hidden' name='hidden_count' id='total_count' value='"+a+"'>";
						$st+="<div class='form-group'>";
						$st+="<label class='col-md-1'></label>";
						$st+="<label class='col-md-2'>Sr no</label>";
						$st+="<label class='col-md-5'>Spare Parts Consumed</label>";
						$st+="<div class='col-md-1'></div></div>";
						for(var i=1;i<a;i++)
							{									
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-2'>"+i+"</label>";
										$st+="<div class='col-md-8'><input type='text' class='form-control' name='spare"+i+"' required='required'/></div>";
										$st+="<div class='col-md-1'></div></div>";
							}
							i=a;
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-2'>"+i+"</label>";
										$st+="<div class='col-md-8'><input type='text' class='form-control' name='spare"+i+"' value='Service' readonly='readonly'/></div>";
										$st+="<div class='col-md-1'></div></div>";
										
										
										
						$(".txtestimate").html($st);
						$("#upestimate").removeAttr("disabled");
		    });
			$("#parecall").click(function(){
					var a=$(this).attr("checked");
					if(a=="checked")
					{		$(".nps").show();		}
					else
					{		$(".nps").hide();		}
			});
	});
	function abc()
	{
		var a=$("#total_count").val();
		var x=0;
		for(var i=1;i<=a;i++)
		{
				x=x+parseInt($(".spare_price"+i).val());
		}
		$("#total_price").val(x);
	}
            
	function xyz()
	{
		var x=$("#total_price").val();
		if(x=="" || x=="NaN")
		{
			return false;
		}
		else
		{
			return true;
		}
	}	
 </script>   
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">
                            <?php
							$sk="select * from `stock` where callid=".$_GET['view'];
							$skres=mysqli_query($con,$sk);
							$flag=0;
							$rst12=mysqli_num_rows($skres);
							if($rst12>0)
							{	
									$t=0;
									while($skrow=mysqli_fetch_array($skres))
									{
										if($skrow['status']!="Demand" and $skrow['status']!="Send")
											{
												$t=1;
											}
									}
									if($t==1)
										{
											$flag=0;
										}
									else{
											$flag++;
										}
							}
							
							$sk="select * from `notification` where callid=".$_GET['view'];
							$skres=mysqli_query($con,$sk);
							$rst12=mysqli_num_rows($skres);
							if($rst12>0)
								{
									$flag=0;
								}
							
							

							
							
                            $sql="select * from `call` where `id`='$_GET[view]'";
                            $result=mysqli_query($con,$sql);
                            $counter=0;
                            if($row=mysqli_fetch_array($result))
                            {                                       
                              ?>
                                <h4>Call
                    <div class="pull-right">
						<?php
								if($_SESSION['status']=="admin")
								{
									echo '   <button class="btn btn-warning edit" type="button">Edit</button>';
								}
						?>
                        <button class="btn btn-warning sub" type="submit" style="display:none;" name="editsub">Submit</button>
						<?php
						
							if($_SESSION['status']=="Manager" or $_SESSION['status']=="admin")
							{
								if($row['cstatus']=="Not Assign")
								{
										echo '<a href="#assign" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Assign</button>
											</a>';
								}
							}
							if($_SESSION['status']=="Engineer" or $_SESSION['status']=="admin")
							{
								if( $row['cstatus']=="Pending Type")
								{
										echo'<a href="#calltype" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Call Type</button>
											</a>';
								}
								if( $row['cstatus']=="Pending Parts")
								{
										echo'<a href="#estimate" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Parts Consumed</button>
											</a>';
								}
								if( $row['cstatus']=="Repair" )
								{
										echo'<a href="#ready" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Ready</button>
											</a>';
								}
								if( $row['cstatus']=="Ready")
								{
										echo'<a href="#deliver" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Deliver</button>
											</a>';
								}
							}
							if($row['cstatus']!="Not Assign" and $row['cstatus']!="Pending Type" and $row['cstatus']!="Pending Parts")
							{	
								echo'<a href="#spare" data-toggle="modal">
											<button class="btn btn-primary " type="button" name="sub">Spare</button>
								</a>';
							}
					
						?>
									
						
						<a href="?page=response&&id=<?php echo $row['id']; ?>"> 
                              <button class="btn btn-primary sr-only " type="button" name="sub">Response</button>
                            </a>
                    </div>
						<br/> </h4>
                                <hr/>
                             
                                  <div class="form-group">
                                        <label class="col-md-2 control-label">Customer Name </label>
                                       
                                        <div class="col-md-4">
                                                <input type="text" name="customername" value="<?php echo $row['customername']; ?>" class="form-control" required="required">
                                        </div>
                                        <label class="col-md-2 control-label">Contact Person</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contactname" value="<?php echo $row['contactname']; ?>" class="form-control">
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Contact No</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contact" value="<?php echo $row['contact']; ?>" class="form-control" required="required">
                                        </div>
										<label class="col-md-2 control-label">E-Mail </label>
                                        <div class="col-md-4">
                                                <input type="text" name="email" value="<?php echo $row['email']; ?>"class="form-control" >
                                        </div>
                                
                                </div>
								
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Product </label>
                                        <div class="col-md-4">
                                                <input type="text" name="product" value="<?php echo $row['product']; ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Model </label>
                                        <div class="col-md-4">
                                                <input type="text" name="model" value="<?php echo $row['model']; ?>" class="form-control" required="required">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Serial No </label>
                                        <div class="col-md-4">
                                                <input type="text" name="serialno" value="<?php echo $row['serialno']; ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Problem Reported</label>
                                        <div class="col-md-4">
                                                <input type="text" name="problem" value="<?php echo $row['problem']; ?>" class="form-control" placeholder="Seprate with comma(,) operator">
                                        </div>
                                </div>                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Accessory If Any</label>
                                        <div class="col-md-4">
                                                <input type="text" name="accessory" value="<?php echo $row['accessory']; ?>" class="form-control">
                                        </div>
                                </div>
							   <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                      
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="warranty" value="warranty" <?php
                                                            
                                                                if($row['warranty']=="warranty") 
                                                                {
                                                                    
                                                                    echo 'checked="checked"';
                                                                }
                                                            
                                                                ?>class="war abc"> In-Warranty
                                                 </label>
                                        </div>  
										
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="warranty" value="nwarranty" <?php
                                                            
                                                                if($row['warranty']=="nwarranty") 
                                                                {
                                                                    
                                                                    echo 'checked="checked"';
                                                                }
                                                            
                                                                ?>  class="war abc"> Non-Warranty
                                                 </label>
                                        </div> 
											<div class="col-md-3" id="rma" >
													<input type="text" name="rma" class="form-control" value="<?php echo $row['rma']; ?>"  placeholder="RMA No">
											</div>
											<div class="col-md-3" id="receipt" style="display:none;">
													<input type="text" name="receipt" class="form-control" value="<?php echo $row['receipt']; ?>"  placeholder="Receipt No">
											</div>
                                          
                                </div> 
								<script>
										$(document).ready(function(){
											$(".war").click(function(){
												var selectedVal = "";
												var selected = $("input[type='radio'][name='warranty']:checked");
												if (selected.length > 0) {
													selectedVal = selected.val();
												}
												if(selectedVal=="nwarranty")
												{
														$("#rma").hide();
														//$("#rma input").val("");
														$("#receipt").show();
												}
												else
												{
														$("#rma").show();
														$("#receipt").hide();
														//$("#receipt input").val("");
												}
											});	
											var selectedVal = "";
												var selected = $("input[type='radio'][name='warranty']:checked");
												if (selected.length > 0) {
													selectedVal = selected.val();
												}
												if(selectedVal=="nwarranty")
												{
														$("#rma").hide();
														//$("#rma input").val("");
														$("#receipt").show();
												}
												else
												{
														$("#rma").show();
														$("#receipt").hide();
														//$("#receipt input").val("");
												}
										});
								</script>
                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                      
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="carry" value="carryin" <?php
                                                            
                                                                if($row['carry']=="carryin") 
                                                                {
                                                                    
                                                                    echo 'checked="checked"';
                                                                }
                                                            
                                                                ?>  class="carry abc"> Carry In
                                                 </label>
                                        </div>  
										
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="carry"  <?php
                                                            
                                                                if($row['carry']=="onsite") 
                                                                {
                                                                    
                                                                    echo 'checked="checked"';
                                                                }
                                                            
                                                                ?>   value="onsite" class="carry abc"> On-Site
                                                 </label>
                                        </div> 
										<div class="col-md-3" id="onsite" style="display:none;" >
												<select name="calltype" class="form-control">
															<option <?php                                                            
                                                                if($row['calltype']=="Local") 
                                                                {
                                                                    
                                                                    echo 'selected="selected"';
                                                                }
                                                            
                                                                ?> >Local</option>
															<option <?php
                                                            
                                                                if($row['calltype']=="Out of Station") 
                                                                {
                                                                    
                                                                    echo 'selected="selected"';
                                                                }
                                                            
                                                                ?> >Out of Station</option>
												</select>
										</div>
											
                                          
                                </div> 
								<script>
										$(document).ready(function(){
											$(".carry").click(function(){
												var selectedVal = "";
												var selected = $("input[type='radio'][name='carry']:checked");
												if (selected.length > 0) {
													selectedVal = selected.val();
												}
												if(selectedVal=="onsite")
												{
														$("#onsite").show();
												}
												else
												{
														$("#onsite").hide();
												}
											});	
											var selectedVal = "";
												var selected = $("input[type='radio'][name='carry']:checked");
												if (selected.length > 0) {
													selectedVal = selected.val();
												}
												if(selectedVal=="onsite")
												{
														$("#onsite").show();
												}
												else
												{
														$("#onsite").hide();
												}
										});
								</script>
                                <div class="form-group" id="onsiteaddress">
                                        <label class="col-lg-2 control-label">Address </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="2" name="address"><?php echo $row['address']; ?></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">Remark </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="2" name="remark"><?php echo $row['remark']; ?></textarea>
                                        </div>
                                </div>
								<div class="form-group">
										
										<div class="col-md-2">
											<br/>
											<label class="control-label pull-right">Ink Detail </label>
                                        </div>
										<div class="col-md-10">
												<div class="col-md-2">
														<center><label class="control-label"><strong>C</strong> </label></center>
														<input type="text" class="form-control" name="color1" value="<?= $row['color1']; ?>"/>
												</div>
												<div class="col-md-2">
														<center><label class="control-label"><strong>BK</strong> </label></center>
														<input type="text" class="form-control" name="color2" value="<?= $row['color2']; ?>"/>
												</div>
												<div class="col-md-2">
														<center><label class="control-label"><strong>M</strong> </label></center>
														<input type="text" class="form-control" name="color3" value="<?= $row['color3']; ?>"/>
												</div>
												<div class="col-md-2">
														<center><label class="control-label"><strong>Y</strong> </label></center>
														<input type="text" class="form-control" name="color4" value="<?= $row['color4']; ?>"/>
												</div>
												<div class="col-md-2">
														<center><label class="control-label"><strong>LC</strong> </label></center>
														<input type="text" class="form-control" name="color5" value="<?= $row['color5']; ?>"/>
												</div>
												<div class="col-md-2">
														<center><label class="control-label"><strong>LM</strong> </label></center>
														<input type="text" class="form-control" name="color6" value="<?= $row['color6']; ?>"/>
												</div>
										</div>		
                                </div>

                            <?php
							}
                            ?>
                </div>
                <div class="panel-footer panel-foot">
							<?php
								if($_SESSION['status']=="admin")
								{
									echo '<p style="color:blue;"><a href="index.php?page=view_en_2&&view='.$_GET['view'].'&&close=y">Close Call</a></p>';
								}
						?>
                </div>
             </form>
        </div>
</div>
 <?php
 
	if(isset($_GET['close']))
	{	
			$sql="update `call` set `cstatus`='close' where id='".$_GET['view']."'";
			if(mysqli_query($con,$sql))
			{
				echo "<script>window.location='index.php?page=view_en_2&&view=".$_GET['view']."';</script>";
			}
	}
     if(isset($_POST['editsub']))
    {
	
		$customername=$_POST['customername'];		
		$contactname=$_POST['contactname'];		
		$product=$_POST['product'];		
		$model=$_POST['model'];		
		$serialno=$_POST['serialno'];	
		$problem=$_POST['problem'];	
		$accessory=$_POST['accessory'];	
		$warranty=$_POST['warranty'];	
		$rma=$_POST['rma'];	
		$receipt=$_POST['receipt'];	
		$carry=$_POST['carry'];	
		$calltype=$_POST['calltype'];	
		$address=$_POST['address'];	
		$remark=$_POST['remark'];	
		$email=$_POST['email'];	
		$contact=$_POST['contact'];
		
		
		
		$color1=$_POST['color1'];
		$color2=$_POST['color2'];
		$color3=$_POST['color3'];
		$color4=$_POST['color4'];
		$color5=$_POST['color5'];
		$color6=$_POST['color6'];
	
			$sql="update `call` set `customername`='$customername', `contactname`='$contactname', `product`='$product', `model`='$model', `serialno`='$serialno', `problem`='$problem', ";
			$sql.="`accessory`='$accessory', `warranty`='$warranty', `rma`='$rma', `receipt`='$receipt', `carry`='$carry', `calltype`='$calltype', ";
			$sql.="`address`='$address', `remark`='$remark', `email`='$email', `contact`='$contact',
			`color1`='$color1',`color2`='$color2',`color3`='$color3',`color4`='$color4',`color5`='$color5',`color6`='$color6' where id='$_GET[view]'";
			
			if(mysqli_query($con,$sql))
			{
				echo "<script>window.location='index.php?page=".$_GET['page']."&&view=".$_GET['view']."';</script>";
			}
	}
	if(isset($_POST['addassign']))
	{
			$callid=$_GET['view'];
			$eng=$_POST['eng'];
			$date=date("y-m-d");
			$time=date("h:i:sa");
		
			$sql="insert into assign values('$callid','$eng','$date','$time')";
			if(mysqli_query($con,$sql))
			{
						$sql2="update `call` set `cstatus`='Pending Type' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php';</script>";
			}
	
	}
 
 ?>
 
 
 <!-----Assing call to enginner----->
 	   
                                      
<div class="modal fade" id="assign" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                <h4>Assign Call</h4>
                                                <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                       
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">Engineer </label>
                                                                    <div class="col-md-8">
                                                                            <select name="eng" class="form-control assign_txt">
																					<?php
																							$sql="select * from login where `status`='Engineer'";
																							$result=mysqli_query($con,$sql);
																							while($row=mysqli_fetch_array($result))
																							{
																								echo "<option value='".$row['id']."'>".$row['user']."</option>";
																							}
																					?>
																			</select>
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer panel-foot">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="addassign">Submit</button>
                                                                </div>

                                                        </div>
                                                            
                                            </div>
                                 </form>
                            </form>
					
                    </div>
					

</div>
</div>


<!-----Call Type----->
 	   
                                      
<div class="modal fade" id="calltype" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                <h4>Call Type</h4>
                                                <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                       
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">Type </label>
                                                                    <div class="col-md-8">
                                                                            <select name="eng" class="form-control assign_txt">
																					<option>Carry In</option>
																					<option>On Site</option>
																			</select>
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="addtype">Submit</button>
                                                                </div>

                                                        </div>
                                                            
                                            </div>
                                 </form>
                            </form>
					
                    </div>
					

</div>
</div>
<?php
		if(isset($_POST['addtype']))
			{
				$callid=$_GET['view'];
				$type=$_POST['eng'];
				$date=date("y-m-d");
				$time=date("h:i:sa");
		
					$sql="insert into en_call_type values(null,'$callid','$type','$date','$time')";
					if(mysqli_query($con,$sql))
					{
						$sql2="update `call` set `cstatus`='Pending Parts' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php';</script>";	
					}
			}
?>
<!---Add Spare Part---->	  
 <div class="modal fade" id="estimate" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" onsubmit="return xyz()" method="post">
                                            <div class="modal-header">
                                                    <h4>Parts Consumed</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm" onsubmit="return xyz()">
															<div class="form-group txtestimate">
																	<div class="col-md-1"></div>
																	<div class="col-md-3">
                                                                           <input type="checkbox" id="parecall"/>
																		   <label class="control-label">Part Call</label>
                                                                    </div>
																	<label class="col-md-3 control-label nps" style="display:none;">No of Spare Parts </label>
                                                                    <div class="col-md-3 nps" style="display:none;">
                                                                           <input type="text" id="spareno" class="form-control assign_txt"/>
                                                                    </div> 
																	<div class="col-md-2">
                                                                           <input type="button" class="btn btn-success" value="Go" id="adsp" />
                                                                    </div>
								                            </div>
                                            </div>
                                             <div class="modal-footer">
														<div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
																		 <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" id="upestimate" name="upestimate" disabled="true">Submit</button>
                                                                </div>
                                                        </div>
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>

<?php
		if(isset($_POST['upestimate']))
		{
				$total_spare=$_POST['hidden_count'];
				$spare="";
				$date=date("y-m-d");
				$time=date("h:i:sa");
				$qp="";
				
				for($i=1;$i<=$total_spare;$i++)
					{
						$sp="spare".$i;
						$spare.=",".$_POST[$sp];	
						
						if($_POST[$sp]!="Service")
						{
							$qp=$qp."insert into stock_w values(null,$_GET[view],'$_POST[$sp]','$date','$time');";
						}
					}
				$gp=explode(";",$qp);
				foreach($gp as $tp)
					{
						if($tp!="")
						{
							mysqli_query($con,$tp);
						}
					}
				//$query="update estimate set `spare`='$spare', `price`='$price', `total`='$total', `date`='$date', `time`='$time' where `callid`='$_GET[view]'";
				$query="insert into estimate values(null, '$_GET[view]', '', '$spare', '', '', '', '', '$date', '$time', '', '', '')";
				if(mysqli_query($con,$query))
				{
									$sql22="insert into rassign values('$_GET[view]','$_SESSION[ulog]','$date','$time','','')";
									mysqli_query($con,$sql22);
									$sql2="update `call` set `cstatus`='Repair' where id='$_GET[view]'";
									mysqli_query($con,$sql2);
								echo "<script>window.location='index.php';</script>";
				}
		}
?>
	<!--Ready-->
<div class="modal fade" id="ready" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Comment</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <div class="col-md-12">
                                                                           <textarea class="form-control assign_txt" name="com"></textarea>
                                                                    </div>
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="ready">Submit</button>
															    </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>
	<?php
 if(isset($_POST['ready']))
	{
			$date=date("y-m-d");
			$time=date("h:i:sa");
			
			 $sql="update rassign set `repair_date`='$date', `repair_time`='$time' where `callid`='$_GET[view]'";
			//$sql="insert into rassign values('$_GET[view]','','','','$date','$time')";
			if(mysqli_query($con,$sql))
			{
						$sk="select * from `en_call_type` where `call`='$_GET[view]'";
						$skre=mysqli_query($con,$sk);
						if($skrow=mysqli_fetch_array($skre))
						{
							if($skrow['type']=="On Site")
								{
									$sql2="update `call` set `cstatus`='Closed' where id='$_GET[view]'";
								}
							else{
									$sql2="update `call` set `cstatus`='Ready' where id='$_GET[view]'";
								}
								if(mysqli_query($con,$sql2))
									{
										$sql13="insert into comment values('$_GET[view]','$_POST[com]')";
										mysqli_query($con,$sql13);
										echo "<script>window.location='index.php';</script>";
									}
								
						}		
						
			}
	}
?>
<!--Deleviered-->
<div class="modal fade" id="deliver" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Comment</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
															<center>
                                                                    <p>
																			<?php
																				$sql="select * from comment where callid='$_GET[view]'";
																				$result=mysqli_query($con,$sql);
																				$record=mysqli_num_rows($result);
																				if($record>0)
																				{
																					if($row=mysqli_fetch_array($result))
																					{
																						echo $row['comment'];
																					}
																				}
																				else
																				{
																					echo "No Comments";
																				}
																			?>
																	</p>
																	<div class="form-group">
                                                                    <label class="col-md-3 control-label">By </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="dby" class="form-control assign_txt">
																	</div>
                                                            </div>
																</center>
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="Deliver">Submit</button>
																		
															    </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>
<?php
if(isset($_POST['Deliver']))
	{		
			$date=date("y-m-d");
			$time=date("h:i:sa");
			
			$sql="insert into delivered values(null,'$_GET[view]','$date','$time','$_POST[dby]')";
			if(mysqli_query($con,$sql))
			{
						$sql2="update `call` set `cstatus`='Closed' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php';</script>";
			}
	}
 ?>
 
<!--spare part order show detail-->
<div class="modal fade" id="spare" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Spare Parts</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
															<center>
																	<table class="table table-striped" >
																	<?php
																			$count=0;
																			$sql="select * from stock_w where callid='$_GET[view]'";
																			$result=mysqli_query($con,$sql);
																			echo '<tr>
																							<td>Sr.no</td>
																							<td>Spare</td>
																					</tr>';
																			while($row=mysqli_fetch_array($result))
																			{
																				$count++;
																				echo "<tr>
																								<td>".$count."</td>
																								<td>".$row['spare']."</td>
																					</tr>";
																			}
																			?>
																	</table>
																	
																</center>
																
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
																</div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>
 <?php
		if(isset($_POST['Reject']))
			{
					$sql="update stock set status='Demand' where callid=".$_GET['view']." and status='Send'";
					if(mysqli_query($con,$sql))
						{
								echo "<script>
												window.location='index.php?page=view_en&&view=".$_GET['view']."';
										</script>";
						}
			}
		if(isset($_POST['Accept']))
			{
					$sql="update stock set status='Receive' where callid=".$_GET['view']." and status='Send'";
					if(mysqli_query($con,$sql))
						{
								echo "<script>
												window.location='index.php?page=view_en&&view=".$_GET['view']."';
										</script>";
						}
			}	
 ?>