   <script type="text/javascript" src="js/report.js"></script>

    
<?php
        $limit=1;     
        
        if(isset($_GET['p']))
        {
            $start=$_GET['p']*$limit;
        }
        else{
                $start=0;
        }
        ?>					

                                <div class="col-md-12" style="margin-top:-20px;">
                                                <div class="panel panel-default">
												        <h4 class="pull-center">REPORT</h4>
														
														<div class="panel-footer phead" >
																<div class="row">
																			<div class="col-md-1">Call ID</div>
																			<div class="col-md-2">
																					<input type="text" id="callid" style="padding:2px;font-size:12px;width:150px;">
																			</div>
																			<div class="col-md-1">Serial No</div>
																			<div class="col-md-2">
																					<input type="text" id="serialno" style="padding:2px;font-size:12px;width:150px;">
																			</div>
																			<div class="col-md-1">Name</div>
																			<div class="col-md-2">
																					<input type="text" id="nm" style="padding:2px;font-size:12px;width:150px;">
																			</div>
																			<div class="col-md-1">Contact</div>
																			<div class="col-md-2">
																					<input type="text" id="contact" style="padding:2px;font-size:12px;width:150px;">
																			</div>
																</div>
														        <div class="row" style="margin-top:5px;">
																			<div class="col-md-1">STATUS</div>
																			<div class="col-md-2">
																					<select id="calltype" style="padding:2px;font-size:12px;width:150px;">
																							<option value=" NOT IN ('Closed','NR Closed')">All Pending</option>
																							<option value="='Not Assign'">Not Assign</option>
																							<option value="='Pending Estimate'">Pending Estimate</option>
																							<option value="='Approval'">Pending Approval</option>
																							<option value="='Add Estimate'">Add Estimate</option>
																							<option value="='Review'">Review</option>
																							<option value="='Parts Required'">Parts Required</option>
																							<option value="='Not Approved'">Not Approved</option>
																							<option value="='Assign For Repair'">Assign For Repair</option>
																							<option value="='Repair'">Pending For Repair</option>
																							<option value="='Ready'">Repaired</option>
																							<option value="='Non Repaired'">Non Repaired</option>
																							<option value="='Informed'">Informed</option>
																							<option value="='nInformed'">N Informed</option>
																							<option value="='NR Closed'">NR Closed</option>
																							<option value="='Closed'">Closed</option>
																							<option value="like('%%')">All</option>		
																					</select>
																			</div>
																			<div class="col-md-1">Date From</div>
																			<div class="col-md-2">
																					<input type="date"   id="dfrom" style="padding:2px;font-size:12px;width:150px;">
																					<!-- <button type="submit" id="subfrom" style="width:25px;padding: 3px;margin: 0px;"><i class="fa fa-search"></i></button> -->
																			</div>
																			<div class="col-md-1">Date To</div>
																			<div class="col-md-2">
																					<input type="date"  id="dto" style="padding:2px;font-size:12px;width:150px;">
																					<!-- <button type="submit" id="subto" style="width:25px;padding: 3px;margin: 0px;"><i class="fa fa-search"></i></button> -->
																			</div>
																			<div class="col-md-1">Engineer</div>
																			<div class="col-md-2">
																					<!--<input type="text" id="contact" style="padding:2px;font-size:12px;width:150px;">-->
																					<select style="padding:2px;font-size:12px;width:150px;" id="eng">
																								<option>All</option>
																								<?php
																										
																										echo $sql="select * from login where `status`='Engineer'";
																										$result=mysqli_query($con,$sql);
																										while($row=mysqli_fetch_array($result))
																											{
																												 echo "<option value='".$row['id']."'>".$row['user']."</option>";	
																											}
																								?>
																					</select>
																			</div>
																</div><br/>
																<div class="row" style="margin-top:-12px;">
																			<div class="col-md-1">W / N</div>
																			<div class="col-md-2">
																					<!--<input type="text" id="callid" style="padding:2px;font-size:12px;width:150px;">-->
																					<select style="padding:2px;font-size:12px;width:150px;" id="warranty">
																								<option>All</option>
																								<option value="warranty">Warranty</option>
																								<option value="nwarranty">Non-Warranty</option>
																					</select>
																			</div>
																			<div class="col-md-1">C / O</div>
																			<div class="col-md-2">
																					<!--<input type="text" id="serialno" style="padding:2px;font-size:12px;width:150px;">-->
																					<select style="padding:2px;font-size:12px;width:150px;" id="carry">
																								<option>All</option>
																								<option value="carryin">Carry In</option>
																								<option value="onsite">On Site</option>
																					</select>
																			</div>
																			<div class="col-md-1">L / O</div>
																			<div class="col-md-2">
																					<!--<input type="text" id="nm" style="padding:2px;font-size:12px;width:150px;">-->
																					<select style="padding:2px;font-size:12px;width:150px;" id="local">
																								<option>All</option>
																								<option value="Local">Local</option>
																								<option value="Out of Station">Out of Station</option>
																					</select>
																			</div>
																			
																</div>
														</div>
                                                        
                                                        <div class="panel-body" style="padding-top:10px;">
														</div>
                                                        <div class="panel-footer panel-foot" style="padding:0px;">
                                                            
                                                        
                                                            <br/><br/>
                                                        </div>
                                                </div>
                                        </div>

 <!-------------------------Start Add Enquiry -------------->                                       
