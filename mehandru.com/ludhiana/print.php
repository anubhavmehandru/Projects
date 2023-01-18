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
</script>
<style>
		.bold_txt
		{
			font-weight:600;
		}
</style>
<?php
    if(isset($_GET['id']))
    {
		include 'include/conn.php';
		$sql2="select * from `call` where id=".$_GET['id'];
		$result=mysqli_query($con,$sql2);
		while($row=mysqli_fetch_array($result))
			{
					$srno=$row['callid'];
					$customername=$row['customername'];		
					$contactname=$row['contactname'];		
					$product=$row['product'];		
					$model=$row['model'];		
					$serialno=$row['serialno'];	
					$problem=$row['problem'];	
					$accessory=$row['accessory'];	
					$warranty=$row['warranty'];	
					$rma=$row['rma'];	
					$receipt=$row['receipt'];	
					$carry=$row['carry'];	
					$calltype=$row['calltype'];	
					$address=$row['address'];	
					$remark=$row['remark'];	
					$email=$row['email'];	
					$contact=$row['contact'];	
					$date=$row['date'];
					$time=$row['time'];
					
					$color1=$row['color1'];
								$color2=$row['color2'];
								$color3=$row['color3'];
								$color4=$row['color4'];
								$color5=$row['color5'];
								$color6=$row['color6'];
					$date=date('d-m-Y', strtotime($row['date']));
	
						echo '
<div class="container alert alert-danger alert-dismissible" role="alert" id="print_div"  style="margin-top:-15px;">
		<img src="img/reprint.png" width="80%;" height="70%" style="position:absolute;z-index:-1;margin-lefT:20px;margin-top:5%;margin-left:10%;"/>

		<div class="row" id="print_div">
		<div class="col-xs-6" style="border-right:1px dashed black;">
				<center><h5 style="font-size:12px;">Customer Copy</h5></center>
					<div class="row" style="border-bottom:1px solid black;">
						<div class="col-xs-12">
								<div class="col-xs-2">
										<img src="img/logo.png" style="width:150%;"/>
								</div>	
								<div class="col-xs-10" style="text-align:right;">
											<p style="font-size:10px;color:black;">
																	<span style="font-size:15px;font-weight:600;">Complete Computer Care & Micro-Solution</span><br/>
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
								<ul style="margin-left:-20px;font-size:9px;">
										<li>Received the Equipment and accessories, as per details given above. Please check for correctness and indicate discrepancy, if any, immediately.</li>
										<li><b>Diagnostic Charges Rs.300/-,</b> incase printer is being taken in unrepaired condition.</li>
										<li><b>Note:</b> If Equipment is not picked within 15 days from the date of repair confirmation receipt for whatever reason, Service Center will be not responsible for loss of Material. </li>                                  
								</ul>
		
						</div>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:3px;margin-bottom:3px;"></div>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:3px;margin-bottom:3px;">
							   <center><div style="font-size:10px;"><b><u>TERMS & CONDITIONS</u></b></div></center>
								<ul  style="margin-left:-20px;font-size:9px;">
									   <li><b>DELIVERY WILL BE MADE STRICTLY AGAINST PRESENTATION OF THIS RECEIPT. <br>
											ਬਿਨਾ ਪਰਚੀ ਤੋਂ ਸਮਾਨ ਨਹੀਂ ਦਿੱਤਾ ਜਾਏਗਾ।    &ensp;&ensp;&ensp;&ensp;&ensp;               बिना पर्ची के सामान नहीं दिया जाएगा  </b></li>
										<li>Delivery /Acceptance of the equipment will be made between 10am to 6pm.</li>
										<li>Payment Terms for Post warranty cases : 100% Cash / DD/ Online payment,against delivery.</li>
										<li><b>Liability :</b> 3CM will not be liable for misplacement or loss of any material/ accessories, if the same has not been mentioned in this receipt.</li>
										<li>If the Equipment is found tempered / damaged physically in any respect, or due to unauthorised repairs, then the service charges will vary accordingly.</li>
										<li>No Warranty for repairs once the material is collected from the service center after repair & satisfactory testing of equipment.</li>
										<li>All disputes are subjected to Ludhiana Jurisdiction.</li>
								</ul>
						</div>
						
						
						<div class="col-xs-12" style="float:left;margin-top:3px;">
		
								<center>
										<div class="col-xs-12" style="float:left;margin-top:1px;">
												<div class="col-xs-6"><B>For COMPLETE COMPUTER CARE & <BR/> MICRO SOLUTIONS</B></div> 
												<div class="col-xs-6"><B>Printer Deposited as per above details<br/> & Terms & Conditions as on the below</B></div> 
										</div>
										</center>
										<div class="col-xs-12" style="float:left;margin-top:2px;margin-bottom:2px;padding:0px;"><br/><br/>
										
												<div class="col-xs-6" style="text-align:center;">(Co-ordinator Signature)</div> 
												<div class="col-xs-6" style="text-align:center;">(Customer Signature & Date)</div> 
										</div>
						</div>
		
				</div>
		</div>
		<div class="col-xs-6" style="border-right:1px dashed black;">
				<center><h5 style="font-size:12px;">Company Copy</h5></center>
					<div class="row" style="border-bottom:1px solid black;">
						<div class="col-xs-12">
								<div class="col-xs-2">
										<img src="img/logo.png" style="width:150%;"/>
								</div>	
								<div class="col-xs-10" style="text-align:right;">
											<p style="font-size:10px;color:black;">
																	<span style="font-size:15px;font-weight:600;">Complete Computer Care & Micro-Solution</span><br/>
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
								<ul style="margin-left:-20px;font-size: 9px;">
										<li>Received the Equipment and accessories, as per details given above. Please check for correctness and indicate discrepancy, if any, immediately.</li>
										<li><b>Diagnostic Charges Rs.300/-,</b> incase printer is being taken in unrepaired condition.</li>
										<li><b>Note:</b> If Equipment is not picked within 15 days from the date of repair confirmation receipt for whatever reason, Service Center will be not responsible for loss of Material. </li>                                  
								</ul>
		
						</div>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:3px;margin-bottom:3px;"></div>
						<div class="col-xs-12" style="border-bottom:1px solid black;float:left;margin-top:3px;margin-bottom:3px;">
							   <center><div style="font-size:10px;"><b><u>TERMS & CONDITIONS</u></b></div></center>
								<ul  style="margin-left:-20px;font-size: 9px;">
									   <li><b>DELIVERY WILL BE MADE STRICTLY AGAINST PRESENTATION OF THIS RECEIPT. <br>
											ਬਿਨਾ ਪਰਚੀ ਤੋਂ ਸਮਾਨ ਨਹੀਂ ਦਿੱਤਾ ਜਾਏਗਾ।    &ensp;&ensp;&ensp;&ensp;&ensp;               बिना पर्ची के सामान नहीं दिया जाएगा  </b></li>
										<li>Delivery /Acceptance of the equipment will be made between 10am to 6pm.</li>
										<li>Payment Terms for Post warranty cases : 100% Cash / DD/ Online payment,against delivery.</li>
										<li><b>Liability :</b> 3CM will not be liable for misplacement or loss of any material/ accessories, if the same has not been mentioned in this receipt.</li>
										<li>If the Equipment is found tempered / damaged physically in any respect, or due to unauthorised repairs, then the service charges will vary accordingly.</li>
										<li>No Warranty for repairs once the material is collected from the service center after repair & satisfactory testing of equipment.</li>
										<li>All disputes are subjected to Ludhiana Jurisdiction.</li>
								</ul>
						</div>
						
						
						<div class="col-xs-12" style="float:left;margin-top:3px;">
		
								<center>
										<div class="col-xs-12" style="float:left;margin-top:1px;">
												<div class="col-xs-6"><B>For COMPLETE COMPUTER CARE & <BR/> MICRO SOLUTIONS</B></div> 
												<div class="col-xs-6"><B>Printer Deposited as per above details<br/> & Terms & Conditions as on the below</B></div> 
										</div>
										</center>
										<div class="col-xs-12" style="float:left;margin-top:2px;margin-bottom:2px;padding:0px;"><br/><br/>
										
												<div class="col-xs-6" style="text-align:center;">(Co-ordinator Signature)</div> 
												<div class="col-xs-6" style="text-align:center;">(Customer Signature & Date)</div> 
										</div>
						</div>
		
				</div>
		</div>
		</div>
		
	</div>
  <button type="button" class="btn btn-info" onclick="show_res()" id="p1">Print</button>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="p2"><span aria-hidden="true">&times;</span></button>	

 
</div>

 
						';
					}
           
    }
?>
