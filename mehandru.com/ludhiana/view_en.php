<script>
    $(document).ready(function(){
        $(".form-control").attr("disabled","disabled");
        $(".abc").attr("disabled","disabled");
        $(".assign_txt").attr("disabled",false);
			$(".del_row").click(function(){
					$(this).closest( 'tr').remove();
					var p=$("#count_text").val()-1;
					$("#count_text").val(p);
			});
			$(".price23").keypress(function(){
					var len=$(".price23").length;
					//alert(len);
					var tot=0;
					for($i=0;$i<len;$i++)
					{
						var p=$(".price23:eq("+1+")").val();
						//alert(p);
					}
			});
			
			$(".edit").click(function(){
						$(".abc").removeAttr("disabled","disabled");
						 $(".form-control").removeAttr("disabled","disabled");
						 $(".edit").hide();
						 $(".sub").show();
						 
						$(".assign_txt").attr("disabled",false);
			});

			$("#minus").click(function(){
				if($("#num").val()!=0)
				{
					var n=parseInt($("#spareno").val());
					n=n-1;
					document.getElementById("#spareno").value = n;
					document.getElementById("#adsp").click();
				}
			})
								
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
						
							//$st+="<div class='form-group'>";
							//$st+="<label class='col-md-1'></label>";
							//$st+="<label class='col-md-2'>RMI No</label>";
							//$st+="<div class='col-md-5'><input type='text' class='form-control' name='rmi' required='required'/></div>";
							//$st+="<div class='col-md-1'></div></div><hr/>";
						
						$st+="<label class='col-md-1'></label>";
						$st+="<label class='col-md-2'>Sr no</label>";
						$st+="<label class='col-md-5'>Spare Parts Required</label>";
						$st+="<label class='col-md-3'>Price</label>";
						$st+="<div class='col-md-1'></div></div>";
						for(var i=1;i<a;i++)
							{									
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-2'>"+i+"</label>";
										$st+="<div class='col-md-5'><input type='text' class='form-control' name='spare"+i+"' required='required'/></div>";
										$st+="<div class='col-md-3'><input type='text' class='form-control sp1232 spare_price"+i+"' required='required' name='spare_price"+i+"' value='0' onkeyup='abc()'/></div>";
										$st+="<div class='col-md-1'></div></div>";
							}
							i=a;
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-2'>"+i+"</label>";
										$st+="<div class='col-md-5'><input type='text' class='form-control' name='spare"+i+"' value='Service Charge' readonly='readonly'/></div>";
										$st+="<div class='col-md-3'><input type='text' class='form-control sp1232 spare_price"+i+"' required='required' name='spare_price"+i+"' value='0' onkeyup='abc()'/></div>";
										$st+="<div class='col-md-1'></div></div>";
										
										
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-5'></label>";
										$st+="<div class='col-md-2'>Total</div>";
										$st+="<div class='col-md-3'><input type='text' id='total_price' name='tot' class='form-control' readonly='readonly'/></div>";
										$st+="<div class='col-md-1'></div></div>";

													
						$(".txtestimate").html($st);
						$(".num").html(i-1);
						$("#upestimate").removeAttr("disabled");
						$("#minus").removeAttr("disabled");
						$("#plus").removeAttr("disabled");
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
														<button class="btn btn-primary " type="button" name="sub">Assign For Estimate</button>
											</a>';
								}
								if( $row['cstatus']=="Assign For Repair" )
								{
									if($flag==0)
									{
										echo'<a href="#rassign" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Assign For Repair</button>
											</a>';
									}
								} 
								if( $row['cstatus']=="Review" )
								{
										echo'<a href="#review" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Review ';
												$ss="select * from estimate where `callid`='$_GET[view]'";
												$ss_result=mysqli_query($con,$ss);
												if($ssrow=mysqli_fetch_array($ss_result))
												{
														echo $ssrow['receipt'];
												}											
										echo ' </button>
											</a>';
								}
							}
						if($_SESSION['status']=="Engineer" or $_SESSION['status']=="admin")
							{
								
								if( $row['cstatus']=="Repair" )
								{
										echo'<a href="#ready" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Ready</button>
											</a>';
								}
							}		
					if($_SESSION['status']=="Front Desk")
					{
						if( $row['cstatus']=="Informed" )
						{		
							
								echo'<a href="#deliver" data-toggle="modal">
												<button class="btn btn-primary " type="button" name="sub">Deliver</button>
									</a>';
						}
						if( $row['cstatus']=="nInformed" )
						{		
							
								echo'<a href="#ndeliver" data-toggle="modal">
												<button class="btn btn-primary " type="button" name="sub">nDeliver</button>
									</a>';
						}	
								
					}

					if($_SESSION['status']=="Coordinator" or $_SESSION['status']=="admin")
					{
								if( $row['cstatus']=="Pending Estimate" )
								{
										echo'<a href="#estimateno" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Estimate Send</button>
											</a>';
								}

								if( $row['cstatus']=="Not Approved" )
								{
										echo'<a href="#nonrepaired" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Non Repaired</button>
											</a>';
								}
							
								if( $row['cstatus']=="Approval" )
								{
										echo'<a href="#approval" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Approval ';
												$ss="select * from estimate where `callid`='$_GET[view]'";
												$ss_result=mysqli_query($con,$ss);
												if($ssrow=mysqli_fetch_array($ss_result))
												{
														echo $ssrow['receipt'];
												}											
										echo ' </button>
											</a>';
								}
								if( $row['cstatus']=="Add Estimate" )
								{
										echo'<a href="#estimate" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Final Estimate</button>
											</a>';
								}

								if( $row['cstatus']=="Ready" || $row['cstatus']=="Non Repaired")
							 	{		
									
								 		echo'<a href="#inform" data-toggle="modal">
								 						<button class="btn btn-primary " type="button" name="sub">Inform</button>
								 			</a>';
							 	}

								if( $row['cstatus']=="Informed" )
								{		
									
										echo'<a href="#deliver" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">Deliver</button>
											</a>';
								}
								if( $row['cstatus']=="nInformed" )
								{		
									
										echo'<a href="#ndeliver" data-toggle="modal">
														<button class="btn btn-primary " type="button" name="sub">nDeliver</button>
											</a>';
								}
					}	
					if( $row['cstatus']=="Assign For Repair" or $row['cstatus']=="Repair" or $row['cstatus']=="Ready" or $row['cstatus']=="Closed")
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
                                                <input type="text" name="contact" value="<?php echo $row['contact']; $number=$row['contact']; ?>" class="form-control" required="required">
                                        </div>
										<label class="col-md-2 control-label">E-Mail </label>
                                        <div class="col-md-4">
                                                <input type="text" name="email" value="<?php echo $row['email']; ?>"class="form-control" >
                                        </div>
                                
                                </div>
								
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Product </label>
                                        <div class="col-md-4">
                                                <input type="text" name="product" value="<?php echo $row['product']; $product=$row['product'] ?>" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Model </label>
                                        <div class="col-md-4">
                                                <input type="text" name="model" value="<?php echo $row['model']; $model=$row['model'] ?>" class="form-control" required="required">
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
								

                            <?php
							}
                            ?>
                </div>
                <div class="panel-footer">
						<?php
								if($_SESSION['status']=="admin")
								{
									echo '<p style="color:blue;"><a href="index.php?page=view_en&&view='.$_GET['view'].'&&close=y">Close Call</a></p>';
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
				echo "<script>window.location='index.php?page=view_en&&view=".$_GET['view']."';</script>";
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
	
		
	
	
			$sql="update `call` set `customername`='$customername', `contactname`='$contactname', `product`='$product', `model`='$model', `serialno`='$serialno', `problem`='$problem', ";
			$sql.="`accessory`='$accessory', `warranty`='$warranty', `rma`='$rma', `receipt`='$receipt', `carry`='$carry', `calltype`='$calltype', ";
			$sql.="`address`='$address', `remark`='$remark', `email`='$email', `contact`='$contact' where id='$_GET[view]'";
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
						$sql2="update `call` set `cstatus`='Estimate' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php';</script>";
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
						$sql2="update `call` set `cstatus`='Pending Estimate' where id='$_GET[view]'";
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
                                            <div class="modal-footer">
                                                            
                                                            
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
 
 
<!-----Add Estimate Receipt no----->
                                      
<div class="modal fade" id="estimateno" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content"><form class="form-horizontal" onsubmit="return xyz()" method="post">
                                            <div class="modal-header">
                                                    <h4>Add Temp Estimate</h4>
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
                                                                           <input type="button" class="btn btn-success" value="Go" id="adsp" onclick="showspares();" />
                                                                    </div>
								                            </div>
										  </div>
										  
											<div class="addrop" id="addrop" style="text-align:right; margin:6px 33px;">
												<input type="button" id="minus" value="-" class="btn btn-warning" disabled="true">
												<label class="num" id="num"></label>
												<input type="button" id="plus" value="+" class="btn btn-warning" disabled="true">
											</div>
										  
											<div class="modal-footer">
														<div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
																		 <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" id="upestimate" name="upestimatetemp" disabled="true">Submit</button>
                                                               </div>
                                                        </div>
                                            </div>
                                 </form>
                            </form>
							<!--
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Estimate</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <label class="col-md-4 control-label">RMI No </label>
                                                                    <div class="col-md-7">
                                                                           <input type="text" class="form-control assign_txt" name="receipt"/>
                                                                    </div>
                                                            </div>
															<div class="form-group">
                                                                    <label class="col-md-4 control-label">Estimate Receipt No </label>
                                                                    <div class="col-md-7">
                                                                           <input type="text" class="form-control assign_txt" name="receipt"/>
                                                                    </div>
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
														<div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="estimateno">Submit</button>
                                                                </div>
                                                        </div>
                                            </div>
                                 </form>
                            </form>
							-->
                    </div>

</div>
</div>

	
<?php
		if(isset($_POST['upestimatetemp']))
		{
				
				$total_spare=$_POST['hidden_count'];
				$spare="";
				$price="";
				$total=0;
				$date=date("y-m-d");
				$time=date("h:i:sa");
				//$rmi=$_POST['rmi'];
				$qp="";
				for($i=1;$i<=$total_spare;$i++)
					{
						$sp="spare".$i;
						$sp_p="spare_price".$i;
						$spare.=",".$_POST[$sp];	
						$price.=",".$_POST[$sp_p];	
					
						if($_POST[$sp]!="Service Charge")
						{
							$qp=$qp."insert into stock values(null,$_GET[view],'$_POST[$sp]',$_POST[$sp_p],'$date','$time','','','Demand');";
						}
					}
					$total=$_POST['tot'];
				//echo $qp;
				//echo "<script>alert('".$total_spare."  ".$spare." ".$price."  ".$total."');</script>";
				
				$gp=explode(";",$qp);
				foreach($gp as $tp)
					{
						if($tp!="")
						{
							//mysql_query($tp);
						}
					}
				
				//$sql="update `call` set rma='".$rmi."' where `id`='$_GET[view]'";
				//mysql_query($sql);
				$query="update estimate_temp set `spare`='$spare', `price`='$price', `total`='$total', `date`='$date', `time`='$time' where `callid`='$_GET[view]'";
				$query="insert into estimate_temp values(null,'$_GET[view]','','$spare','$price','$total','','','$date','$time','','','')";
				if(mysqli_query($con,$query))
				{
							$sql2="update `call` set `cstatus`='Approval' where id='$_GET[view]'";
							mysqli_query($con,$sql2);
							echo "<script>window.location='index.php';</script>";
				}
				
		}
		
		 
		if(isset($_POST['estimateno']))
		{
				$receipt=$_POST['receipt'];
				$date=date("y-m-d");
				$time=date("h:i:sa");
		
				$sql="insert into estimate values(null,'$_GET[view]','$receipt','','','','$date','$time','','','Pending','','')";
				if(mysqli_query($con,$sql))
				{
					$sql2="update `call` set `cstatus`='Approval' where id='$_GET[view]'";
					mysqli_query($con,$sql2);
					echo "<script>window.location='index.php';</script>";	
				}
		}
?>

 <!-----Add approval Status ----->
 	   
                                      
<div class="modal fade" id="approval" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header"  style="padding:0px;margin:0px;">
                                                    <h4>Approval</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
											<div class="modal-body" style="overflow:hidden;">
													
															<table class="table">
																	<tr>
																		<th>No</th>
																		<th>Part</th>
																		<th>Price</th>
																		<th>Delete</th>
																	</tr>
																	<?php
																		$spare="";
																		$price="";
																		
																			$sql="select * from estimate_temp where callid='".$_GET['view']."' order by id desc limit 1";
																			$result=mysqli_query($con,$sql);
																			if($row=mysqli_fetch_array($result))
																			{
																				$spare= $row['spare'];
																				 $price=$row['price'];
																			}
																			$sp=explode(',',$spare);
																			$px=explode(',',$price);
																			
																			$sp=explode(',',$spare);
																			$sp_p=explode(',',$price);
																			$lenth=count($sp);
																			$tot=0;
																			for($i=1;$i<$lenth;$i++)
																			{
																				$tot=$tot+$sp_p[$i];
																				echo "<tr>
																								<td>".$i."</td>
																								<td><input type='text' value='".$sp[$i]."' name='spare".$i."'  class='form-control assign_txt'></td>
																								<td><input type='text' value='".$sp_p[$i]."' name='price".$i."'  class='form-control assign_txt price23' ></td>
																								<td> <span class='del_row btn btn-info'> Delete </span></td>
																					</tr>";
																			}		
																			
																			echo '<tr><td></td><td>Total</td><td id="xp_tot">'.$tot.'</td><td></td></tr>';
																			$lenth--;
																			$i--;
																echo '<input type="hidden" value="'.$i.'" name="total_text_box">';
																echo '<input type="hidden" value="'.$lenth.'" name="count_text" id="count_text">';
																				
																	?>
															</table>
															
															
														
													<form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">Status </label>
                                                                    <div class="col-md-8">
                                                                            <select name="approval" class="form-control assign_txt">
																					<option >Approved</option>
																					<option >Not-Approved</option>
																			</select>
                                                                    </div>
														    </div>
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">By </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" class="form-control assign_txt" name="name" required="required">
																					
                                                                    </div>
														    </div>
                                            </div>
                                            <div class="modal-footer">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="approval-btn">Submit</button>
                                                                </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>					
                    </div>
</div>
</div>

<?php
		if(isset($_POST['approval-btn']))
		{
				$date=date("y-m-d");
				$time=date("h:i:sa");
								/*
								*	0 for pending 
								* 	1 for Approved 
								*	2 for not Approved
								*/
								
				//echo $query="update estimate set `approval`='$_POST[approval]', `adate`='$date', `atime`='$time' where `callid`='$_GET[view]'";
				//if(mysql_query($query))
				//{
						if($_SESSION['status']!='Coordinator')
						{
							if($_POST['approval']=='Approved')
							{
									$st="Add Estimate";
							}
							else
							{
								$st="Review";
							}
						}
						else
						{
							if($_POST['approval']=='Approved')
							{
									$st="Add Estimate";
							}
							else
							{
								$st="Review";
							}
						
						}
						
						if(isset($_POST['total_text_box']))
						{
							$spare="";
							$price="";
							$total=0;
								$tot_box=$_POST['total_text_box'];
								$now_box=$_POST['count_text'];
								
								for($i=1;$i<=$tot_box;$i++)
								{
									if(isset($_POST['spare'.$i]))
									{
										$total=$total+$_POST['price'.$i];
											$spare=$spare.",".$_POST['spare'.$i];
											$price=$price.",".$_POST['price'.$i];
											
											
									}
								}
								$sql="update estimate_temp set spare='".$spare."', approval='".$_POST['approval']."', price='".$price."', total='".$total."', adate='".$date."', atime='".$time."' where callid=".$_GET['view'];
								mysqli_query($con,$sql);
						//}
						$sq="insert into approval values('$_GET[view]','$_POST[name]')";
						mysqli_query($con,$sq);
						$sql2="update `call` set `cstatus`='$st' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						
				}
				echo "<script>window.location='index.php?page=view_en&&view=".$_GET['view']."';</script>";
		}
		
?>		  

 
 
 
<!---Add Spare Part---->	  
 <div class="modal fade" id="estimate" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" onsubmit="return xyz()" method="post">
                                            <div class="modal-header">
                                                    <h4>Final Estimate</h4>
													<button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm" onsubmit="return xyz()">
															<!--<div class="form-group txtestimate">
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
								                            </div>-->
															
											<table class="table">
												<tr>
														<th>No</th>
														<th>Part</th>
														<th>Price</th>
												</tr>
												<?php
													$spare="";
													$price="";
													$sql="select * from estimate_temp where callid='".$_GET['view']."' order by id desc limit 1";
													$result=mysqli_query($con,$sql);
													if($row=mysqli_fetch_array($result))
														{
															$spare= $row['spare'];
															$price=$row['price'];
														}
													$sp=explode(',',$spare);
													$px=explode(',',$price);
													
													$sp=explode(',',$spare);
													$sp_p=explode(',',$price);
													$lenth=count($sp);
													$tot=0;
													for($i=1;$i<$lenth;$i++)
													{
														$tot=$tot+$sp_p[$i];
														echo "<tr>
																		<td>".$i."</td>
																		<td>".$sp[$i]."</td>
																		<td>".$sp_p[$i]."</td>
																	
															</tr>";
													}		
																			
																			echo '<tr><td></td><td>Total</td><td id="xp_tot">'.$tot.'</td></tr>';
																			$lenth--;
																			$i--;
																echo '<input type="hidden" value="'.$i.'" name="total_text_box">';
																echo '<input type="hidden" value="'.$lenth.'" name="count_text" id="count_text">';
																				
																	?>
															</table>
															
															
										
															
                                            </div>
                                             <div class="modal-footer">
														<div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
																		<!--  <label class="col-md-7 control-label" style="text-align:left;"><b>Estimate Receipt No:- 
																			<?php
																				/*
																					$sql123="select * from estimate where `callid`='$_GET[view]'";
																					$re123=mysql_query($sql123);
																					if($row123=mysql_fetch_array($re123))
																					{
																							echo $row123['receipt'];
																					}
																					
																					*/
																			?>
																		  </b></label> -->
                                                                  
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" id="upestimate" name="upestimate" >Submit</button>
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
		
				$spare="";
				$price="";
				$total=0;
				$date=date("y-m-d");
				$time=date("h:i:sa");
				
				$sql="select * from estimate_temp where callid='".$_GET['view']."'";	
				$result=mysqli_query($con,$sql);
				if($row=mysqli_fetch_Array($result))
				{
						$spare=$row['spare'];
						$price=$row['price'];
						$total=$row['total'];
				}
				
				$sp=explode(',',$spare);
				$spr=explode(',',$price);
				$total_spare=count($sp);
				$qp="";
				
				for($i=1;$i<=$total_spare;$i++)
					{
						$spare.=",".$sp[$i];	
						$price.=",".$spr[$i];	
					
						if($sp[$i]!="Service Charge")
						{
							$qp=$qp."insert into stock values(null,$_GET[view],'$sp[$i]',$spr[$i],'$date','$time','','','Demand');";
						}
					}
					$total=$_POST['tot'];
					
					
					
				//echo $qp;
				//echo "<script>alert('".$total_spare."  ".$spare." ".$price."  ".$total."');</script>";
				
				$gp=explode(";",$qp);
				foreach($gp as $tp)
					{
						if($tp!="")
						{
							mysqli_query($con,$tp);
						}
					}
				//$query="update estimate set `spare`='$spare', `price`='$price', `total`='$total', `date`='$date', `time`='$time' where `callid`='$_GET[view]'";
				//if(mysql_query($query))
				{
							$sql2="update `call` set `cstatus`='Assign For Repair' where id='$_GET[view]'";
							mysqli_query($con,$sql2);
							echo "<script>window.location='index.php';</script>";
				}
		}
		
?>		  
<!-----Assing call to enginner for Repair----->
 	   
                                      
<div class="modal fade" id="rassign" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Assign Call For Repair</h4>
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
                                            <div class="modal-footer">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="rassign">Submit</button>
                                                                </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>
 <?php
 if(isset($_POST['rassign']))
	{
			$callid=$_GET['view'];
			$eng=$_POST['eng'];
			$date=date("y-m-d");
			$time=date("h:i:sa");
		
			$sql="insert into rassign values('$callid','$eng','$date','$time','','')";
			if(mysqli_query($con,$sql))
			{
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
			
			echo $sql="update rassign set `repair_date`='$date', `repair_time`='$time' where `callid`='$_GET[view]'";
			if(mysqli_query($con,$sql))
			{
						$sql2="update `call` set `cstatus`='Ready' where id='$_GET[view]'";
						if(mysqli_query($con,$sql2))
						{
							$sql13="insert into comment values('$_GET[view]','$_POST[com]')";
							mysqli_query($con,$sql13);
    						echo "<script>window.location='index.php';</script>";
						}
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
																	<table class="table table-striped">
																	<?php
																			$count=0;
																			$sql="select * from stock where callid='$_GET[view]'";
																			$result=mysqli_query($con,$sql);
																			echo '<tr>
																							<td>Sr.no</td>
																							<td>Spare</td>
																							<td>Price</td>
																							<td>Status</td>
																						
																					</tr>';
																			while($row=mysqli_fetch_array($result))
																			{
																				$count++;
																				echo "<tr>
																								<td>".$count."</td>
																								<td>".$row['item']."</td>
																								<td>".$row['price']."</td>
																								<td>".$row['status']."</td>
																					</tr>";
																			}
																			?>
																	</table>
																	
																</center>
																
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                        <div class="form-group">
														
                                                                <div class="col-md-6" style="text-align:left;">
																	<?php
																			$sk="select * from notification where callid=".$_GET['view'];
																			$skre=mysqli_query($con,$sk);
																			$rrt=mysqli_num_rows($skre);
																			if($rrt>0)
																				{
																					echo '<label class="label-control" style="color:red;">Not In Stock</label>';
																				}
																	
																	?>
																		
																</div>
                                                                <div class="col-md-6" style="text-align:right;">
																		
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
																		 <?php
																		 	if($_SESSION['status']=="admin" or $_SESSION['status']=="Manager" )
																			{
				
																		 ?>
                                                                         <button type="submit" name="Reject" class="btn btn-info" >Reject</button>
                                                                         <button type="submit" name="Accept" class="btn btn-info" >Accept</button>
																		<?php
																			}
																		?>																		
																		 
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
					$sql="update stock set status='Reject' where callid=".$_GET['view']." and status='Send'";
					if(mysqli_query($con,$sql))
						{
							$sql12="select * from stock where callid=".$_GET['view']." and status='Reject'";
							$result12=mysqli_query($con,$sql12);
							while($row12=mysqli_fetch_array($result12))
								{
									$date=date("y-m-d");
									$time=date("h:i:sa");
									$sk="insert into stock_hist values(null,'$_GET[view]','".$row12['item']."','$date','$time','Reject')";
									mysqli_query($con,$sk);
								}
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
							$sql12="select * from stock where callid=".$_GET['view']." and status='Receive'";
							$result12=mysqli_query($con,$sql12);
							while($row12=mysqli_fetch_array($result12))
								{
									$date=date("y-m-d");
									$time=date("h:i:sa");
									$sk="insert into stock_hist values(null,'$_GET[view]','".$row12['item']."','$date','$time','Receive')";
									mysqli_query($con,$sk);
								}
								echo "<script>
												window.location='index.php?page=view_en&&view=".$_GET['view']."';
										</script>";
						}
			}	
 ?>


 <!-- Review call -->

<div class="modal fade" id="review" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header"  style="padding:0px;margin:0px;">
                                                    <h4>Review</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
											<div class="modal-body" style="overflow:hidden;">
													
															<table class="table">
																	<tr>
																		<th>No</th>
																		<th>Part</th>
																		<th>Price</th>
																		<th>Delete</th>
																	</tr>
																	<?php
																		$spare="";
																		$price="";
																		
																			$sql="select * from estimate_temp where callid='".$_GET['view']."' order by id desc limit 1";
																			$result=mysqli_query($con,$sql);
																			if($row=mysqli_fetch_array($result))
																			{
																				$spare= $row['spare'];
																				 $price=$row['price'];
																			}
																			$sp=explode(',',$spare);
																			$px=explode(',',$price);
																			
																			$sp=explode(',',$spare);
																			$sp_p=explode(',',$price);
																			$lenth=count($sp);
																			$tot=0;
																			for($i=1;$i<$lenth;$i++)
																			{
																				$tot=$tot+$sp_p[$i];
																				echo "<tr>
																				<td>".$i."</td>
																								<td><input type='text' value='".$sp[$i]."' name='spare".$i."'  class='form-control assign_txt'></td>
																								<td><input type='text' value='".$sp_p[$i]."' name='price".$i."'  class='form-control assign_txt price23' ></td>
																								<td> <span class='del_row btn btn-info'> Delete </span></td>
																					</tr>";
																			}		
																			
																			echo '<tr><td></td><td>Total</td><td id="xp_tot">'.$tot.'</td><td></td></tr>';
																			$lenth--;
																			$i--;
																echo '<input type="hidden" value="'.$i.'" name="total_text_box">';
																echo '<input type="hidden" value="'.$lenth.'" name="count_text" id="count_text">';
																				
																	?>
															</table>
															
															
														
													<form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">Status </label>
                                                                    <div class="col-md-8">
                                                                            <select name="approval" class="form-control assign_txt">
																			<option >Not-Approved</option>		
																			<option >Approved</option>
																			</select>
                                                                    </div>
														    </div>
															<div class="form-group">
                                                                    <label class="col-md-3 control-label">By </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" class="form-control assign_txt" name="name" required="required">
																					
                                                                    </div>
														    </div>
                                            </div>
                                            <div class="modal-footer">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="napproval-btn">Submit</button>
                                                                </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>					
                    </div>
</div>
</div>

<?php
		if(isset($_POST['napproval-btn']))
		{
				$date=date("y-m-d");
				$time=date("h:i:sa");
								/*
								*	0 for pending 
								* 	1 for Approved 
								*	2 for not Approved
								*/
								
				//echo $query="update estimate set `approval`='$_POST[approval]', `adate`='$date', `atime`='$time' where `callid`='$_GET[view]'";
				//if(mysql_query($query))
				//{
					if($_SESSION['status']!='Coordinator')
						{
							if($_POST['approval']=='Approved')
							{
									$cs="Add Estimate";
							}
							else
							{
									$cs="Not Approved"; 
							}
						}
						else
						{
							if($_POST['approval']=='Approved')
							{
									$cs="Add Estimate";
							}
							else
							{
								$cs="Not Approved"; 
							}
							
						}
						
						if(isset($_POST['total_text_box']))
						{
							$spare="";
							$price="";
							$total=0;
								$tot_box=$_POST['total_text_box'];
								$now_box=$_POST['count_text'];
								
								for($i=1;$i<=$tot_box;$i++)
								{
									if(isset($_POST['spare'.$i]))
									{
										$total=$total+$_POST['price'.$i];
											$spare=$spare.",".$_POST['spare'.$i];
											$price=$price.",".$_POST['price'.$i];
											
											
									}
								}
								$sql="update estimate_temp set spare='".$spare."', approval='".$_POST['approval']."', price='".$price."', total='".$total."', adate='".$date."', atime='".$time."' where callid=".$_GET['view'];
								mysqli_query($con,$sql);
						//}
						$sq="insert into approval values('$_GET[view]','$_POST[name]')";
						mysqli_query($con,$sq);
						$sql2="update `call` set `cstatus`='$cs' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php?page=view_en&&view=".$_GET['view']."';</script>";
					}
				}
				
				?>		  

 
 	<!--Non Repaired Ready-->
<div class="modal fade" id="nonrepaired" role="dailog">                                        
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
                                                                         <button class="btn btn-primary " type="submit" name="Nready">Submit</button>
															    </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
</div>
</div>
	<?php
 if(isset($_POST['Nready']))
 {
	 $date=date("y-m-d");
	 $time=date("h:i:sa");
	 
	 echo $sql="update rassign set `repair_date`='$date', `repair_time`='$time' where `callid`='$_GET[view]'";
	 if(mysqli_query($con,$sql))
	 {
		 $sql2="update `call` set `cstatus`='Non Repaired' where id='$_GET[view]'";
		 if(mysqli_query($con,$sql2))
		 {
			 $sql13="insert into comment values('$_GET[view]','$_POST[com]')";
			 mysqli_query($con,$sql13);
			 echo "<script>window.location='index.php';</script>";
			}
		}
	}
	?>
	<!--Delivered-->
	<script type="text/javascript" src="js/valid.js"></script>
	
	<div class="modal fade" id="deliver" role="dailog">                                        
			<div class="modal-dialog">
						<div class="modal-content">
								<form class="form-horizontal" method="post">
												<div class="modal-header">
														<h4>OTP Validation</h4>
													  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body" style="overflow:hidden;">
														<form class="form-horizontal" method="post" name="frm">
	
														<div class="form-group">
	
														
																<div style="font-size: 17px;color:#d84f03;font-weight: bold;">
															<center>Please enter the one time password <br> to verify your <?php echo $product ?></center>	
															</div>
														   <center>
																<div style="font-size: 16px;margin-top: 10px;"> <span>A code has been sent to</span> <span><?php echo $number ?></s> </div>
																<?php
																if ($_SESSION['status']=="admin")
																{
																	$sql="select OTP from sms where callid='$_GET[view]'";
																	$result=mysqli_query($con,$sql);
																	if ($row=mysqli_fetch_array($result)) 
																	{
																		echo "OTP is " .$row['OTP'];
																	}
																}
																?>
														</center>
																<div id="otp" class="otpnumbers "> 
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="1st" maxlength="1" name="otp1" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="2nd" maxlength="1" name="otp2" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="3rd" maxlength="1" name="otp3" required="required"/> 
																	 <input class="text-center rounded otp-num" autocomplete="off" type="text" id="4th" maxlength="1" name="otp4" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="5th" maxlength="1" name="otp5" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="6th" maxlength="1" name="otp6" required="required"/>
																</div>
															 <div class="card-2">
																<div class="content"> <span>Didn't get the code?</span> <a href="#" name="Resend" onclick="document.getElementByName('frm').submit();" class="text-decoration-none ms-3">Resend</a> </div>
															</div>
															
	
																<div class="form-group">
																<center>
																	<h4>Comments</h4>
																			 <div style="min-height: 50px;width: calc(100% - 40px);border-style: solid;border-width: 1px;border-color: darkgray;">
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
																			</div>  
																	</center>
																</div>
												</div>
												<div class="modal-footer" style="padding:15px 15px 0px">
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
	</div>
	<?php
	if (isset($_POST['Resend']))
	{
		
	}
	
	if(isset($_POST['Deliver']))
		{		
				$date=date("y-m-d");
				$time=date("h:i:sa");
				$arrayotp=array($_POST['otp1'],$_POST['otp2'],$_POST['otp3'],$_POST['otp4'],$_POST['otp5'],$_POST['otp6']);
				$otp= implode("",$arrayotp);
				
				$sql22="select OTP FROM sms where callid='$_GET[view]'";
				$result22=mysqli_query($con,$sql22);
				$row22=mysqli_fetch_array($result22);
				if ($otp==$row22['OTP'])
				{
					 $sql="insert into delivered values(null,'$_GET[view]','$date','$time','Coordinator')";
						
						 if(mysqli_query($con,$sql))
						 {
							 $sql2="update `call` set `cstatus`='Closed' where id='$_GET[view]'";
							 mysqli_query($con,$sql2);
							 echo "<script>window.location='index.php';</script>";
						 }
				}
				else if ($otp!=$row22['OTP'])
				{
					echo '<script>alert("OTP does not match");</script>';
				}
		
		}
	 ?>

<!--nDelivered-->
<script type="text/javascript" src="js/valid.js"></script>

<div class="modal fade" id="ndeliver" role="dailog">                                        
<div class="modal-dialog">
						<div class="modal-content">
								<form class="form-horizontal" method="post">
												<div class="modal-header">
														<h4>OTP Validation</h4>
													  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body" style="overflow:hidden;">
														<form class="form-horizontal" method="post" name="frm">
	
														<div class="form-group">
	
														
																<div style="font-size: 17px;color:#d84f03;font-weight: bold;">
															<center>Please enter the one time password <br> to verify your <?php echo $product ?></center>	
															</div>
														   <center>
																<div style="font-size: 16px;margin-top: 10px;"> <span>A code has been sent to</span> <span><?php echo $number ?></s> </div>
																<?php
																if ($_SESSION['status']=="admin")
																{
																	$sql="select OTP from sms where callid='$_GET[view]'";
																	$result=mysqli_query($con,$sql);
																	if ($row=mysqli_fetch_array($result)) 
																	{
																		echo "OTP is " .$row['OTP'];
																	}
																}
																?>
														</center>
																<div id="otp" class="otpnumbers "> 
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="1st" maxlength="1" name="otp1" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="2nd" maxlength="1" name="otp2" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="3rd" maxlength="1" name="otp3" required="required"/> 
																	 <input class="text-center rounded otp-num" autocomplete="off" type="text" id="4th" maxlength="1" name="otp4" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="5th" maxlength="1" name="otp5" required="required"/>
																	<input class="text-center rounded otp-num" autocomplete="off" type="text" id="6th" maxlength="1" name="otp6" required="required"/>
																</div>
															 <div class="card-2">
																<div class="content"> <span>Didn't get the code?</span> <a href="#" name="Resend" onclick="document.getElementByName('frm').submit();" class="text-decoration-none ms-3">Resend</a> </div>
															</div>
															
	
																<div class="form-group">
																<center>
																	<h4>Comments</h4>
																			 <div style="min-height: 50px;width: calc(100% - 40px);border-style: solid;border-width: 1px;border-color: darkgray;">
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
																			</div>  
																	</center>
																</div>
												</div>
												<div class="modal-footer" style="padding:15px 15px 0px">
															<div class="form-group">
																	<div class="col-md-12" style="text-align:right;">
																			 <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
																			 <button class="btn btn-primary " type="submit" name="nDeliver">Submit</button>
																			
																	</div>
															</div>                                                            
												</div>
									 </form>
								</form>
						</div>
	</div>
	</div>
</div>
<?php
if (isset($_POST['Resend']))
{
		
}

if(isset($_POST['nDeliver']))
	{		
		$date=date("y-m-d");
		$time=date("h:i:sa");
		$arrayotp=array($_POST['otp1'],$_POST['otp2'],$_POST['otp3'],$_POST['otp4'],$_POST['otp5'],$_POST['otp6']);
		$otp= implode("",$arrayotp);
		
		$sql23="select OTP FROM sms where callid='$_GET[view]'";
		$result23=mysqli_query($con,$sql23);
		$row23=mysqli_fetch_array($result23);
		if ($otp==$row23['OTP'])
		{
			$sql="insert into delivered values(null,'$_GET[view]','$date','$time','Coordinator')";

			if(mysqli_query($con,$sql))
				{
						$sql2="update `call` set `cstatus`='NR Closed' where id='$_GET[view]'";
						mysqli_query($con,$sql2);
						echo "<script>window.location='index.php';</script>";
				}
			}
			else if ($otp!=$row23['OTP'])
			{
				echo '<script>alert("OTP does not match");</script>';
			}
			
			
	}
 ?>

 	<!--Inform Customer-->
	 <div class="modal fade" id="inform" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Inform Customer</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group">
                                                                    <div class="col-md-12">
                                                                    <center><h5>Inform Customer that <?php echo $product ?> is ready for delivery and send OTP.</h5></center>
                                                                    </div>
                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="SendOTP">Submit</button>
															    </div>
                                                        </div>                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>
		</div>
</div>
<?php

	if(isset($_POST['SendOTP']))
	{
		$date=date("y-m-d");
		$time=date("h:i:sa");
        $value = rand(100000,999999);
		        
		$sql_job="select * from `call` where `id`='$_GET[view]'";
		$result_job=mysqli_query($con,$sql_job);
		$row_job=mysqli_fetch_array($result_job);
		$jobno=$row_job['callid'];

		if ($row_job['cstatus']=="Ready") 
		{
			$sta="repair for delivery";
			$sta2="Informed";
		}
		elseif ($row_job['cstatus']=="Non Repaired") 
		{
			$sta="non approval for delivery";
			$sta2="nInformed";	
		}

		$ch = curl_init('https://www.txtguru.in/imobile/api.php?');
		$templateid="1207162825645881272";
		$msg="$product $model against Job no $jobno is ready after $sta. Authentication OTP $value. Share OTP with 3CM Service only.";

		$data = "username=3cm.mehandru&password=17251672&source=ThreCM&dmobile=91$number&dltentityid=1201162667665270193&dltheaderid=1205162672585630734&dlttempid=$templateid&message=$msg";
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$exe = curl_exec($ch);
		

		$sqlsms="update sms set repaired='1',OTP='".$value."' WHERE callid='$_GET[view]'";
		if (mysqli_query($con,$sqlsms))
		{
			$sql11="insert into sms_dt values ('$_GET[view]','$date','$time','','')";
			if (mysqli_query($con,$sql11))
			{
				$sql33="update `call` set `cstatus`='$sta2' where id='$_GET[view]'";
				mysqli_query($con,$sql33);
				echo "<script>window.location='index.php';</script>";
			}
		}
	}
?>