                                <div class="col-md-12">
                                                <div class="panel panel-default">
                                                        
                                                        <div class="panel-body">
															<h4 >My Users
														
																	<div class="pull-right">
																				<a href="#adduser" data-toggle="modal">
																				<button class="btn btn-primary " type="button" name="sub">Add New</button>
																				</a>
																	</div>
																	<br/>
																	<br/>
															</h4>
														
																<table class="table table-striped">
                                                                        <tr>
																				<th>No.</th>
																				<th>User</th>
																				<th>Password</th>
																				<th>Status</th>
																				<th>Action</th>
                                                                        </tr> 
																<?php	
																		$sql="select * from login";
																		$result=mysql_query($sql);
																		$count=0;
																		while($row=mysql_fetch_array($result))
																			{
																				if($row['id']!=$_SESSION['ulog'])
																				{
																					$count++;
																					echo "<tr>
																							<td>".$count."</td>
																							<td>".$row['user']."</td>
																							<td>".$row['password']."</td>
																							<td>".$row['status']."</td>
																							<td>
																								<a href='index.php?page=user&&d=".$row['id']."'>Delete</a> |
																								<a href='index.php?page=user&&e=".$row['id']."'>Edit</a>
																							</td>
																					
																					
																					</tr>";
																				}																			
																			}
																?>
																</table>			
                                                        </div>
                                                        <div class="panel-footer">
                                                        
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
 <!-------------------------Start Delete User -------------->                                       

                                        
           <?php
           
            if(isset($_GET['d']))
            {
                    $sql="delete from login where `id`='$_GET[d]'";
                    if(mysql_query($sql))
                    {
                        echo '<script>window.location="index.php?page=user";</script>';
                    }
            }
           if(isset($_POST['adduser']))
			{
				$sql="insert into login values(null,'$_POST[name]','$_POST[pass]','$_POST[status]')";
				if(mysql_query($sql))
                    {
                        echo '<script>window.location="index.php?page=user";</script>';
                    }
				
		   
		   }
           
           
           
           
           
           ?>
		   
		   
		   
		   
<!--Add new User --->		   
		   
                                      
<div class="modal fade" id="adduser" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Add New User</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                       
                                                    <form class="form-horizontal" method="post" name="frm">


                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Name </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="name" class="form-control" required="required">
                                                                    </div>

                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Password </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="pass" class="form-control" required="required">
                                                                    </div>

                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Status </label>
                                                                    <div class="col-md-8">
                                                                            <select name="status" class="form-control">
																					<option>admin</option>
																					<option>Front Desk</option>
																					<option>Manager</option>
																					<option>Engineer</option>
																			</select>
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="adduser">Submit</button>
                                                                </div>

                                                        </div>
                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>

</div>
		   
		   
		   
		   
		   
		   