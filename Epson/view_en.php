
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
						var a=$("#spareno").val();
						$st="<input type='hidden' id='total' value='"+a+"'>";
						$st+="<div class='form-group'>";
						$st+="<label class='col-md-1'></label>";
						$st+="<label class='col-md-2'>Sr no</label>";
						$st+="<label class='col-md-5'>Spare Parts Required</label>";
						$st+="<label class='col-md-3'>Price</label>";
						$st+="<div class='col-md-1'></div></div>";
						for(var i=1;i<=a;i++)
							{									
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-2'>"+i+"</label>";
										$st+="<div class='col-md-5'><input type='text' class='form-control'/></div>";
										$st+="<div class='col-md-3'><input type='text' class='form-control'/></div>";
										$st+="<div class='col-md-1'></div></div>";
							}
										$st+="<div class='form-group'>";
										$st+="<label class='col-md-1'></label>";
										$st+="<label class='col-md-5'></label>";
										$st+="<div class='col-md-2'>Total</div>";
										$st+="<div class='col-md-3'><input type='text' id='total' class='form-control'/></div>";
										$st+="<div class='col-md-1'></div></div>";
						$(".txtestimate").html($st);
		    });
    });
            
    
 </script>   
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">
                                <?php
                              
                            $sql="select * from `call` where `id`='$_GET[view]'";
                            $result=mysql_query($sql);
                            $counter=0;
                            if($row=mysql_fetch_array($result))
                            {                                       
                              ?>
                                <h4>Call
                    <div class="pull-right">
                        <button class="btn btn-warning edit" type="button">Edit</button>
                        <button class="btn btn-warning sub" type="submit" style="display:none;" name="editsub">Submit</button>
						<!--
						<a href="#assign" data-toggle="modal">
									<button class="btn btn-primary " type="button" name="sub">Assign</button>
						</a>
						-->
						
						<a href="#estimate" data-toggle="modal">
									<button class="btn btn-primary " type="button" name="sub">Estimate</button>
						</a>  
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
								<h5><b>Warranty Type</b></h5>
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
														$("#onsiteaddress").show();
												}
												else
												{
														$("#onsite").hide();
														$("#onsiteaddress").hide();
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
														$("#onsiteaddress").show();
												}
												else
												{
														$("#onsite").hide();
														$("#onsiteaddress").hide();
												}
										});
								</script>
                                <div class="form-group" id="onsiteaddress" style="display:none;">
                                        <label class="col-lg-2 control-label">Address </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="3" name="address"><?php echo $row['address']; ?></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">Remark </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="3" name="remark"><?php echo $row['remark']; ?></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">E-Mail </label>
                                        <div class="col-md-4">
                                                <input type="text" name="email" value="<?php echo $row['email']; ?>"class="form-control" >
                                        </div>
                                        <label class="col-md-2 control-label">Contact No</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contact" value="<?php echo $row['contact']; ?>" class="form-control" required="required">
                                        </div>
                                </div>
								
								
                            
                                <?php
                                
                            }
                                
                                ?>
                                 

                </div>
                <div class="panel-footer">
							
                </div>
             </form>
        </div>
</div>
 <?php
 
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
			
			if(mysql_query($sql))
			{
				echo "<script>window.location='index.php?page=".$_GET['page']."&&view=".$_GET['view']."';</script>";
			}
	}
	/*if(isset($_POST['addassign']))
	{
			$callid=$_GET['view'];
			$eng=$_POST['eng'];
			$sql="insert into assign values('$callid','$eng')";
			if(mysql_query($sql))
			{
						$sql2="update `call` set `cstatus`='Estimate' where id='$_GET[view]'";
						mysql_query($sql2);
						echo "<script>window.location='index.php';</script>";
			}
	
	}*/
 
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
																							$result=mysql_query($sql);
																							while($row=mysql_fetch_array($result))
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
		   
 
 
 <!-----Add Estimate----->
 	   
                                      
<div class="modal fade" id="estimate" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Add Estimate</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
															<div class="form-group txtestimate">
                                                                    <label class="col-md-3 control-label">No of Spare Parts </label>
                                                                    <div class="col-md-4">
                                                                           <input type="text" id="spareno" class="form-control assign_txt"/>
                                                                    </div>
																	<div class="col-md-4">
                                                                           <input type="button" class="btn btn-success" value="Go" id="adsp"/>
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
		  
 
 
 
 