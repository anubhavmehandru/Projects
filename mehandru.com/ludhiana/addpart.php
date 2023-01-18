<?php
		if(isset($_GET['edit']))
		{
				$sql="select * from parts where id=".$_GET['edit'];
				$result=mysqli_query($pcon,$sql);
				if($row=mysqli_fetch_array($result))
				{
					$cat=$row['cat'];
					$name=$row['name'];
					$partcode=$row['partcode'];
					$price=$row['price'];
					$MRP=$row['MRP'];
					$model=$row['model'];
					$details=$row['details'];
					
					
					
				?>
						<script>
								$(document).ready(function(){
										$("#cat option[value='<?php echo trim($cat); ?>']").attr({"selected":"selected"});
									
										$("#pname").val("<?php echo $name; ?>");	
										$("#pcode").val("<?php echo $partcode; ?>");	
										$("#price").val("<?php echo $price; ?>");	
										$("#mrp").val("<?php echo $MRP; ?>");
										$("#model").val("<?php echo $model; ?>");
										$("#details").val("<?php echo $details; ?>");	
											
								});
						</script>';
				<?php	
				}
		}

?>


<div class="col-md-12">
        <div class="panel panel-default" style="margin-top:-15px;">
                <form class="form-horizontal" method="post">
                         <div class="panel-body">
							<h4 style="margin-top:-5px;margin-bottom:2px;">Add New Part</h4>
                                <hr style="margin:0px;"/>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Part Category </label>
                                        <div class="col-md-4">
												<select name="cat" id="cat" class="form-control" required="true">
													<option value="">Select Category</option>
													<option value="CABLE">CABLE</option>
													<option value="CARRIAGE">CARRIAGE</option>
													<option value="CR MOTOR">CR MOTOR</option>
													<option value="CR SCALE">CR SCALE</option>
													<option value="CUTTER">CUTTER</option>
													<option value="FRAME">FRAME</option>
													<option value="GEAR">GEAR</option>
													<option value="GENERAL">GENERAL</option>
													<option value="HEAD">HEAD</option>
													<option value="HEAD CABLE">HEAD CABLE</option>
													<option value="ENCODER CABLE">ENCODER CABLE</option>
													<option value="KNOB">KNOB</option>
													<option value="LAMP">LAMP</option>
													<option value="MAIN BOARD">MAIN BOARD</option>
													<option value="MASK">MASK</option>
													<option value="MOTOR">MOTOR</option>
													<option value="PANEL">PANEL</option>
													<option value="PANEL CABLE">PANEL CABLE</option>
													<option value="PANEL SHEET">PANEL SHEET</option>
													<option value="PAPER GUIDE">PAPER GUIDE</option>
													<option value="PICK UP">PICK UP</option>
													<option value="PLQ">PLQ</option>
													<option value="POWER SUPPLY">POWER SUPPLY</option>
													<option value="PROJECTOR FAN">PROJECTOR FAN</option>
													<option value="PROJECTOR LAMP">PROJECTOR LAMP</option>
													<option value="PUMP">PUMP</option>
													<option value="R/D ASSY">R/D ASSY</option>
													<option value="SCANNER">SCANNER</option>
													<option value="SENSOR">SENSOR</option>
													<option value="TANK">TANK</option>
													<option value="SCANNER">SCANNER</option>
													
												</select>
                                        </div>
                                       <!-- <label class="col-md-2 control-label">Contact Person</label>
                                        <div class="col-md-4">
                                                <input type="text" name="contactname" class="form-control" id="cap2" onkeyup="cap(this.id)">
                                        </div>-->
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Part Name</label>
                                        <div class="col-md-4">
                                                <input type="text" name="pname" id="pname" class="form-control" required="required" onkeyup="cap(this.id)">
                                        </div> 
										<label class="col-md-2 control-label">Part Code </label>
                                        <div class="col-md-4">
                                                <input type="text" name="pcode" id="pcode" class="form-control" required="true">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-2 control-label">Price </label>
                                        <div class="col-md-4">
                                                <input type="number" name="price" id="price" class="form-control" required="required">
                                        </div>
                                        <label class="col-md-2 control-label">MRP </label>
                                        <div class="col-md-4">
                                                <input type="number" name="mrp" id="mrp" class="form-control" required="required">
                                        </div>
                                </div>
								<div class="form-group">
                                        <label class="col-md-2 control-label">Model </label>
                                        <div class="col-md-4">
                                                <input type="text" name="model" id="model" class="form-control" required="required">
                                        </div>
                                        <label class="col-md-2 control-label">Details </label>
                                        <div class="col-md-4">
                                                <input type="text" name="mrp" id="details" class="form-control" required="required">
                                        </div>
                                </div>
                             
                                
                </div>
                <div class="panel-footer panel-foot">
                    <div>
                        <button class="btn btn-warning " type="reset">Reset</button>
						<?php
							if(isset($_GET['edit']))
							{
							?>
								<button class="btn btn-primary " type="submit" name="update">Update</button>
							<?php
							}
							else
							{
							?>
								<button class="btn btn-primary " type="submit" name="sub">Submit</button>
							<?php
							}
						?>
                        
                    </div> 
                </div>
             </form>
        </div>
</div>
<?php
	if(isset($_POST['sub']))
	{
			$cat=trim($_POST['cat']);
			$name=trim($_POST['pname']);
			$code=trim($_POST['pcode']);
			$price=trim($_POST['price']);
			$mrp=trim($_POST['mrp']);
			$model=trim($_POST['model']);
			$details=trim($_POST['details']);
	
			$sql="insert into parts values(null,'".$cat."','".$name."','".$code."','".$price."','".$mrp."','".$details."','".$model."')";
			if(mysqli_query($pcon,$sql))
			{
				echo "<script>alert('New Part Add Successfully.');</script>";
			}
			
	}if(isset($_POST['update']))
	{
			$cat=trim($_POST['cat']);
			$name=trim($_POST['pname']);
			$code=trim($_POST['pcode']);
			$price=trim($_POST['price']);
			$mrp=trim($_POST['mrp']);
			$model=trim($_POST['model']);
			$details=trim($_POST['details']);
	
			$sql="update parts set cat='".$cat."', name='".$name."', partcode='".$code."', price='".$price."', mrp='".$mrp."','".$details."','".$model."' where id=".$_GET['edit'];
			if(mysqli_query($pcon,$sql))
			{
				echo "<script>alert('Edit Part Successfully Complete.');
							window.location='index.php?page=addpart&&edit=".$_GET['edit']."';
					</script>";
			}
			
	}
	
?>
