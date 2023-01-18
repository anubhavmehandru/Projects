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
							var x=document.getElementById("print_div").innerHTML;
							document.write("<html><head> <link href='css/bootstrap.min.css' rel='stylesheet'></head><body>"+x+"</body></html>");
							window.print();
							window.location="?page=enquiry";
						}
						function cap(a){
								var p=$("#"+a).val().toUpperCase();
								$("#"+a).val(p);
						}
						function fun_history()
						{
							var a=$("#cap5").val();
							window.location='?page=enquiry&&sr='+a;
						
						}
						function getData_en()
						{
							var a=$("#clid").val();
							window.location='?page=enquiry&&srno='+a;
						}
</script>
<style>
		.bold_txt
		{
			font-weight:600;
		}
</style>

<?php
	if(isset($_GET['srno']))
	{
		echo '<script>
				$(document).ready(function(){
					$("#cap5").val("'.$_GET['srno'].'"); ';
					
		$sql="select * from `call` where `serialno`='".$_GET['srno']."' order by `id` desc";
		$query=mysqli_query($con,$sql);
		if($row=mysqli_fetch_array($con,$query))
		{		
			echo '$("#cap1").val("'.$row['customername'].'");';
			echo '$("#cap2").val("'.$row['contactname'].'");';
			echo '$("#cap3").val("'.$row['contact'].'");';
			echo '$("#cap_email").val("'.$row['email'].'");';
			echo '$("#cap4").val("'.$row['model'].'");';
			echo '$("#cap10").val("'.$row['address'].'");';
		}
					
		echo '
				});
			</script>';	
						
			
	
	}
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
		
		$date1=date('d-m-Y', strtotime($date));
		
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
							$t=strlen($srno);
							if($t<9)
							{
								$srno="0".$srno;
							}
					}
					
				$query="update `call` set `callid`='$srno' where id='$id'";
				if(mysqli_query($con,$query))
					{
						echo "<script>window.location='index.php?page=printrec&callid=".$srno."';</script>";
					}
		}
           
    }
if(isset($_GET['sr']))
	{
		?>
		<br/>
<div class="container alert alert-danger alert-dismissible" role="alert"   style="position:absolute;z-index:1000;margin-top:-20px;padding-top:0px;padding-bottom:0px;">
	<div class="row">
		<div class="col-xs-12" style="padding:10px;">
			<center><h4 style="color:white;">Call History</h4></center>
			<table class="table table-striped">
					<tr>
							<th>Call ID </th>
							<th>Name</th>
							<th>Model</th>
							<th>Serial No</th>
							<th>Contact</th>
							<th>Problem</th>
							<th>Date</th>
					</tr>
				<?php
						$sql="select * from `call` where `serialno`='".$_GET['sr']."'";
						$query=mysqli_query($con,$sql);
						while($row=mysqli_fetch_array($con,$query))
						{
				?>
					<tr style="color:black;">
							<td>
								<a href="index.php?page=view_report&&view=<?php echo $row['id']; ?>">
									<?php echo $row['callid']; ?>
								</a>
							</td>
							<td><?php echo $row['customername']; ?></td>
							<td><?php echo $row['model']; ?></td>
							<td><?php echo $row['serialno']; ?></td>
							<td><?php echo $row['contact']; ?></td>
							<td><?php echo $row['problem']; ?></td>
							<td><?php echo $row['date']; ?></td>
					</tr>
				<?php } ?>
					
			</table>
			<input type="hidden" id="clid" value="<?php echo $_GET['sr']; ?>"/>
			<input type="button" value="Okay" class="btn btn-info" onclick="getData_en()"/>
		</div>
	</div>
</div>
		
		
		<?php
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
                                                <input type="text" name="email" class="form-control" id="cap_email">
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
                                        <div class="col-md-3">
                                                <input type="text" name="serialno" class="form-control" id="cap5" onkeyup="cap(this.id)">
                                        </div>
                                        <div class="col-md-1">
											    <input type="button" value="Go" class="btn btn-warning" style="width:100%" onclick="fun_history()">
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