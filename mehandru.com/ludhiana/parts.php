<script type="text/javascript" src="js/partcode.js"></script>
<?php include 'include/pconn.php' ?>

	<div class="col-md-12" style="margin-top:-20px;">
		<div class="panel panel-default">
			<h4 class="pull-center">PARTS</h4>
			<div class="panel-footer phead" >
				<div class="row">
						<div class="col-md-1">Part Code</div>
						<div class="col-md-2">
							<input type="text" id="pcode" style="padding:2px;font-size:12px;width:150px;">
						</div>
						<div class="col-md-1">Category</div>
						<div class="col-md-2">
							<select style="padding:2px;font-size:12px;width:150px;" id="pcat">
										<option value="all">All</option>
										<?php
											$sql15="select distinct(cat) from parts order by cat";
											$result=mysqli_query($pcon,$sql15);
											while($row=mysqli_fetch_array($result))
											{
											//	echo '<option value="'.$row['cat'].'">'.$row['cat'].'</option>';
												echo "<option value='". $row['cat'] ."'>" .$row['cat'] ."</option>";
											}
										?>
							</select>
						</div>
						<div class="col-md-1">Model</div>
						<div class="col-md-2">
							<input type="text" id="pmodel"  style="padding:2px;font-size:12px;width:150px;">					
						</div>
						<a href="index.php?page=addpart">
						<input type="button" class="btn btn-primary pull-right" value="Add New Part" style="margin-right:10px;"/> 
						</a>
				</div>
			</div>
                                                        <div class="panel-body" style="padding-top:10px;">
						
						
						
						
						
						
						
													</div>
                                                        <div class="panel-footer panel-foot" style="padding:0px;">
                                                            
                                                        
                                                            <br/><br/>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
     <?php

		if(isset($_GET['delete']))
		{
			$sql="delete from parts where id=".$_GET['delete'];
			if(mysqli_query($pcon,$sql))
			{
				echo "<script>
						alert('parts Delete.');
						window.location='index.php?page=parts';
						</script>";
			}
		}
	?>
                                        
                                        
                                        
                                        
 <!-------------------------Start Add Enquiry -------------->                                       
