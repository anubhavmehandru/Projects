<?php
		if($_SESSION['status']!="admin" and $_SESSION['status']!="Front Desk" and $_SESSION['status']!="Coordinator")
		{
			echo "<script>alert('Kyu Pange Lena yaar..');
					window.location='index.php';</script>";
		}
?>      

<script>
 
						function show_res()
						{
							$("#p1").css({"display":"none"});
							$("#p2").css({"display":"none"});
							var x=document.getElementById("print_div").innerHTML;
							document.write("<html><head> <link href='css/bootstrap.min.css' rel='stylesheet'></head><body>"+x+"</body></html>");
							window.print();
							window.location="?page=enquiry";
						}
		function cap(a){
				var p=$("#"+a).val().toUpperCase();
				$("#"+a).val(p);
		}
</script>
<style>
		.bold_txt
		{
			font-weight:600;
		}
</style>

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
		$time=date("h:i:sa");
		$sql="insert into `call` values(null,'','$customername','$contactname','$product','$model','$serialno','$problem','$accessory','$warranty','$rma','$receipt','$carry','$calltype','$address','$remark','$email','$contact','$date','$time','Not Assign')";
		if(mysqli_query($con,$sql))
		{
				$sql2="select * from `call` order by id desc limit 2";
				$result=mysqli_query($con,$sql2);
				$fdate=1;
				$srn=0;
				$sdate="";
				while($row=mysqli_fetch_array($result))
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
				if(mysqli_query($con,$query))
					{
						//echo "<script>alert('".$srno."');</script>";
						echo '
<div class="container alert alert-danger alert-dismissible" role="alert" id="print_div"  style="position:absolute;z-index:1000;margin-top:-20px;padding-top:0px;padding-bottom:0px;">
	
	<div class="row">
		<div class="col-xs-6" style="border-right:1px dashed black;">
				<center><h5 style="font-size:12px;">Customer Copy</h5></center>
					<div class="row" style="border-bottom:1px solid black;">
						<div class="col-xs-12">
								<div class="col-xs-2">
										<img src="img/logo.png" style="width:150%;"/>
								</div>	
								<div class="col-xs-10" style="text-align:right;">
											<p style="font-size:10px;color:black;">
																	<span style="font-size:15px;font-weight:600;">Complete Computer Cate & Micro-Solution</span><br/>
													90 Grean Field, Near Punjab & Sind Bank, Pakhowal Road, Ludhiana.<br/>
																			 Phone: 0161-5033620, Centrex: 4429, 4529<br/>
																E-mail: edel26@epsonindia.in  3cm.mehandru@gmail.com<br/>
													
											</p>	
								</div>
						</div>		
				</div>	
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">
						<div class="col-xs-12" >
								ITEM RECEIVED FOR REPAIR - <b> '.$warranty."(".$carry.")".'</b>
						</div>
						<div class="col-xs-12" style="margin-top:2px;padding:0px;">
								<div class="col-xs-4">Date : <b> '.$date.' </b></div> 
								<div class="col-xs-4">Time In :<b> '.$time.'</b></div> 
								<div class="col-xs-4" style="font-size:14px;">Job No :<b> '.$srno.'</b></div> 
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;">
								Customer Name :<b>'.$customername.'</b>
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;">
								Address:
								<b> '.$address.'</b>
						</div>
						
						<div class="col-xs-12" style="float:left;margin-top:2px;padding:0px;">
								<div class="col-xs-6">Phone : <b> '.$contact.' </b></div> 
								<div class="col-xs-6">Contact Person :<b> '.$contactname.'</b></div> 
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;padding:0px;">
								<div class="col-xs-6">Model : <b> '.$model.' </b></div> 
								<div class="col-xs-6">Serial No :<b> '.$serialno.'</b></div> 
						</div>
						
				</div>	
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Accessories:
								<b>'.$accessory.'</b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Problem Description:
								<b> '.$problem.' </b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Remarks:
								<b> '.$remark.' </b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:11px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								<ul>
										<li>Received the Equipment and accessories, as per details given above. Please check for correctness and indicate discrepancy, if any, immediately. </li>
										<li>Incase, Printer is being taken in unrepaired condition, customer has to pay <b>Diagnostic charges Rs.150/- </b>  </li>
								
								</ul>
						</div>
						<center>
						<div class="col-xs-12" style="float:left;margin-top:1px;">
								<div class="col-xs-6"><B>For COMPLETE COMPUTER CARE & <BR/> MICRO SOLUTIONS</B></div> 
								<div class="col-xs-6"><B>Printer Deposited as per above details<br/> & Terms & Conditions as on the below</B></div> 
						</div>
						</center>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:2px;margin-bottom:2px;padding:0px;"><br/><br/>
						
								<div class="col-xs-6" style="text-align:center;">(Co-ordinator Signature)</div> 
								<div class="col-xs-6" style="text-align:center;">(Customer Signature & Date)</div> 
						</div>
						<div class="col-xs-12" style="font-size:9px;float:left;margin-top:3px;">
								<ul style="margin-left:-30px;">
									<li><b>DELIVERY WILL BE MADE STRICTLY AGAINST PRESENTATION OF THIS RECEIPT.</b> Delivery/Acceptance of equipment will be made between 10 am to 6 pm.</li>
									<li>Payment Terms for Post warranty cases:100% Cash/DD, against delivery.</li>
									<li><b>Note:</b> If Equipment is not picked within 15 days from the date of receipt for whatever be the reason than the return of equipment will be at sole discretion of the service center. </li>
									<li><b>Liability:</b> 3CM will not be liable for misplacement or loss of any material/accessories, if the same has not been mentioned in this receipt.</li>
									<li>If the Equipment is found tempered/damaged physically in any respect, or due to unauthorized repairs, then the service charges will vary accordingly.</li>
									<li>No Warranty for repairs once the material is collected from the service center after repair & satisfactory testing of equipment.</li>
									<li>All disputes are subject to Ludhiana Jurisdiction.</li>
								
								</ul>
						</div>
		
				</div>
		</div>
		
		
		
		<div class="col-xs-6" >
				<center><h5 style="font-size:12px;">Company Copy</h5></center>
					<div class="row" style="border-bottom:1px solid black;">
						<div class="col-xs-12">
								<div class="col-xs-2">
										<img src="img/logo.png" style="width:150%;"/>
								</div>	
								<div class="col-xs-10" style="text-align:right;">
											<p style="font-size:10px;color:black;">
																	<span style="font-size:15px;font-weight:600;">Complete Computer Cate & Micro-Solution</span><br/>
													90 Grean Field, Near Punjab & Sind Bank, Pakhowal Road, Ludhiana.<br/>
																			 Phone: 0161-5033620, Centrex: 4429, 4529<br/>
																E-mail: edel26@epsonindia.in  3cm.mehandru@gmail.com<br/>
													
											</p>	
								</div>
						</div>		
				</div>	
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">
						<div class="col-xs-12" >
								ITEM RECEIVED FOR REPAIR - <b> '.$warranty."(".$carry.")".'</b>
						</div>
						<div class="col-xs-12" style="margin-top:2px;padding:0px;">
								<div class="col-xs-4">Date : <b> '.$date.' </b></div> 
								<div class="col-xs-4">Time In :<b> '.$time.'</b></div> 
								<div class="col-xs-4" style="font-size:14px;">Job No :<b> '.$srno.'</b></div> 
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;">
								Customer Name :<b>'.$customername.'</b>
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;">
								Address:
								<b> '.$address.'</b>
						</div>
						
						<div class="col-xs-12" style="float:left;margin-top:2px;padding:0px;">
								<div class="col-xs-6">Phone : <b> '.$contact.' </b></div> 
								<div class="col-xs-6">Contact Person :<b> '.$contactname.'</b></div> 
						</div>
						<div class="col-xs-12" style="float:left;margin-top:2px;padding:0px;">
								<div class="col-xs-6">Model : <b> '.$model.' </b></div> 
								<div class="col-xs-6">Serial No :<b> '.$serialno.'</b></div> 
						</div>
						
				</div>	
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Accessories:
								<b>'.$accessory.'</b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Problem Description:
								<b> '.$problem.' </b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:12px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								Remarks:
								<b> '.$remark.' </b>
						</div>
				</div>
				<div class="row" style="color:black;font-size:11px;border-bottom:1px solid black;">						
						<div class="col-xs-12" style="float:left;margin-top:3px;margin-bottom:3px;">
								<ul>
										<li>Received the Equipment and accessories, as per details given above. Please check for correctness and indicate discrepancy, if any, immediately. </li>
										<li>Incase, Printer is being taken in unrepaired condition, customer has to pay <b>Diagnostic charges Rs.150/- </b>  </li>
								
								</ul>
						</div>
						<center>
						<div class="col-xs-12" style="float:left;margin-top:1px;">
								<div class="col-xs-6"><B>For COMPLETE COMPUTER CARE & <BR/> MICRO SOLUTIONS</B></div> 
								<div class="col-xs-6"><B>Printer Deposited as per above details<br/> & Terms & Conditions as on the below</B></div> 
						</div>
						</center>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:2px;margin-bottom:2px;padding:0px;"><br/><br/>
						
								<div class="col-xs-6" style="text-align:center;">(Co-ordinator Signature)</div> 
								<div class="col-xs-6" style="text-align:center;">(Customer Signature & Date)</div> 
						</div>
						<div class="col-xs-12" style="font-size:9px;float:left;margin-top:3px;">
								<ul style="margin-left:-30px;">
									<li><b>DELIVERY WILL BE MADE STRICTLY AGAINST PRESENTATION OF THIS RECEIPT.</b> Delivery/Acceptance of equipment will be made between 10 am to 6 pm.</li>
									<li>Payment Terms for Post warranty cases:100% Cash/DD, against delivery.</li>
									<li><b>Note:</b> If Equipment is not picked within 15 days from the date of receipt for whatever be the reason than the return of equipment will be at sole discretion of the service center. </li>
									<li><b>Liability:</b> 3CM will not be liable for misplacement or loss of any material/accessories, if the same has not been mentioned in this receipt.</li>
									<li>If the Equipment is found tempered/damaged physically in any respect, or due to unauthorized repairs, then the service charges will vary accordingly.</li>
									<li>No Warranty for repairs once the material is collected from the service center after repair & satisfactory testing of equipment.</li>
									<li>All disputes are subject to Ludhiana Jurisdiction.</li>
								
								</ul>
						</div>
		
				</div>
		</div>
		
	</div>
 
 
  <button type="button" class="btn btn-info" onclick="show_res()" id="p1">Print</button>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="p2"><span aria-hidden="true">&times;</span></button>
</div>
<br/>
<br/>
<br/>
						';
					}
		}
           
    }
?>

<div class="col-md-12">
        <div class="panel panel-default" style="margin-top:-15px;">
                <form class="form-horizontal" method="post">
                         <div class="panel-body">
							<h4 style="margin-top:-5px;margin-bottom:2px;">Add New Call</h4>
                                <hr style="margin:0px;"/>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Customer Name </label>
                                        <div class="col-md-4">
                                                <input type="text" name="customername" class="form-control" id="cap1" onkeyup="cap(this.id)" required="required" >
                                        </div>
                                        <label class="col-md-2 control-label">Contact Person</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contactname" class="form-control" id="cap2" onkeyup="cap(this.id)">
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Contact No</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contact" class="form-control" required="required" id="cap3" onkeyup="cap(this.id)">
                                        </div> 
										<label class="col-md-2 control-label">E-Mail </label>
                                        <div class="col-md-4">
                                                <input type="text" name="email" class="form-control" >
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Product </label>
                                        <div class="col-md-4">
                                                <select name="product" class="form-control" >
														<option>Printer</option>
														<option>Scanner</option>
														<option>CCTV</option>
														<option>Computer</option>
														<option>Other</option>
												</select>
                                        </div>
                                        <label class="col-md-2 control-label">Model </label>
                                        <div class="col-md-4">
                                                <input type="text" name="model" class="form-control" required="required" id="cap4" onkeyup="cap(this.id)">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Serial No </label>
                                        <div class="col-md-4">
                                                <input type="text" name="serialno" class="form-control" id="cap5" onkeyup="cap(this.id)">
                                        </div>
                                        <label class="col-md-2 control-label">Problem Reported</label>
                                        <div class="col-md-4">
                                                <input type="text" name="problem" class="form-control" placeholder="Seprate with comma(,) operator" id="cap6" onkeyup="cap(this.id)">
                                        </div>
                                </div>                                
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Accessory If Any</label>
                                        <div class="col-md-4">
                                                <input type="text" name="accessory" class="form-control" id="cap7" onkeyup="cap(this.id)">
                                        </div>
                                </div>
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
													<input type="text" name="rma" class="form-control" required="required" placeholder="RMA No" id="cap8" onkeyup="cap(this.id)">
											</div>
											<div class="col-md-3" id="receipt" style="display:none;">
													<input type="text" name="receipt" class="form-control"  placeholder="Receipt No" id="cap9" onkeyup="cap(this.id)">
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
														$("#rma input").removeAttr("required");
														$("#rma input").val("");
														$("#receipt").show();
														$("#receipt input").attr({"required":"required"});
												}
												else
												{
														$("#rma").show();
														$("#rma input").attr({"required":"required"});
														$("#receipt").hide();
														$("#receipt input").removeAttr("required");
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
												}
												else
												{
														$("#onsite").hide();
												}
											});	
										});
								</script>
                                <div class="form-group" id="onsiteaddress">
                                        <label class="col-lg-2 control-label">Address </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="2" name="address" id="cap10" onkeyup="cap(this.id)"></textarea>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">Remark </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="2" name="remark" id="cap11" onkeyup="cap(this.id)"></textarea>
                                        </div>
                                </div>
                             
                                
                </div>
                <div class="panel-footer panel-foot">
                    <div>
                        <button class="btn btn-warning " type="reset">Reset</button>
                        <button class="btn btn-primary " type="submit" name="sub">Submit</button>
                    </div> 
                </div>
             </form>
        </div>
</div>