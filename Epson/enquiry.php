             
<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                            
                         <div class="panel-body">

                                <h4>Add New Call</h4>
                                <hr/>
                              
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Customer Name </label>
                                       
                                        <div class="col-md-4">
                                                <input type="text" name="customername" class="form-control" required="required">
                                        </div>
                                        <label class="col-md-2 control-label">Contact Person</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contactname" class="form-control">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Product </label>
                                        <div class="col-md-4">
                                                <input type="text" name="product" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Model </label>
                                        <div class="col-md-4">
                                                <input type="text" name="model" class="form-control" required="required">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Serial No </label>
                                        <div class="col-md-4">
                                                <input type="text" name="serialno" class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label">Problem Reported</label>
                                        <div class="col-md-4">
                                                <input type="text" name="problem" class="form-control" placeholder="Seprate with comma(,) operator">
                                        </div>
                                </div>                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Accessory If Any</label>
                                        <div class="col-md-4">
                                                <input type="text" name="accessory" class="form-control">
                                        </div>
                                </div>
								<h5><b>Warranty Type</b></h5>
                                <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                      
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="warranty" value="warranty" checked="checked" class="war"> In-Warranty
                                                 </label>
                                        </div>  
										
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="warranty" value="nwarranty" class="war"> Non-Warranty
                                                 </label>
                                        </div> 
											<div class="col-md-3" id="rma" >
													<input type="text" name="rma" class="form-control" placeholder="RMA No">
											</div>
											<div class="col-md-3" id="receipt" style="display:none;">
													<input type="text" name="receipt" class="form-control" placeholder="Receipt No">
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
														$("#rma input").val("");
														$("#receipt").show();
												}
												else
												{
														$("#rma").show();
														$("#receipt").hide();
														$("#receipt input").val("");
												}
											});	
										});
								</script>
                                <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                      
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="carry" value="carryin" checked="checked" class="carry"> Carry In
                                                 </label>
                                        </div>  
										
                                        <div class="col-md-3 checkbox">
                                                 <label>
                                                            <input type="radio" name="carry" value="onsite" class="carry"> On-Site
                                                 </label>
                                        </div> 
										<div class="col-md-3" id="onsite" style="display:none;" >
												<select name="calltype" class="form-control">
															<option>Local</option>
															<option>Out of Station</option>
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
										});
								</script>
                                <div class="form-group" id="onsiteaddress" style="display:none;">
                                        <label class="col-lg-2 control-label">Address </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="3" name="address"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">Remark </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="3" name="remark"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">E-Mail </label>
                                        <div class="col-md-4">
                                                <input type="text" name="email" class="form-control" >
                                        </div>
                                        <label class="col-md-2 control-label">Contact No</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contact" class="form-control" required="required">
                                        </div>
                                </div>
                                
                </div>
                <div class="panel-footer">
                    <div>
                        <button class="btn btn-warning " type="reset">Reset</button>
                        <button class="btn btn-primary " type="submit" name="sub">Submit</button>
                    </div> 
                </div>
             </form>
        </div>
</div>
<?php
    if(isset($_POST['sub']))
    {
        $date=date("y-m-d");
				
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
		
		include 'include/conn.php';
		echo $sql="insert into `call` values(null,'','$customername','$contactname','$product','$model','$serialno','$problem','$accessory','$warranty','$rma','$receipt','$carry','$calltype','$address','$remark','$email','$contact','$date','Not Assign')";
		if(mysql_query($sql))
		{
				$sql2="select * from `call` order by id desc limit 2";
				$result=mysql_query($sql2);
				$fdate=1;
				$srn=0;
				$sdate="";
				while($row=mysql_fetch_array($result))
				{
					if($fdate==1)
					{
						$id=$row['id'];
						$fdate=$row['date'];
					}
					else
					{
						$srn=$row['callid'];
						$sdate=$row['date'];
					}
				}
							
				if($fdate!=$sdate)
					{
							$fdate =date("dmy");
							$srno=$fdate."001";
					}
				else{
							$srno=$srn+1;
					}
					
				$query="update `call` set `callid`='$srno' where id='$id'";
				if(mysql_query($query))
					{
						echo "<script>alert('".$srno."');</script>";
					}
		}
           
    }
?>