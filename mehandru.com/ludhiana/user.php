<?php
if($_SESSION['status']!="admin")
	{
		echo "<script>window.location='index.php';</script>";
	}
?>                               
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
																		$result=mysqli_query($con,$sql);
																		$count=0;
																		while($row=mysqli_fetch_array($result))
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
                                                        <div class="panel-footer panel-foot">
															<br/><br/>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
 <!-------------------------Start Delete User -------------->                                       

                                        
           <?php
           
            if(isset($_GET['d']))
            {
                    $sql="delete from login where `id`='$_GET[d]'";
                    if(mysqli_query($con,$sql))
                    {
                        echo '<script>window.location="index.php?page=user";</script>';
                    }
            }
           if(isset($_POST['adduser']))
			{
				$sql="insert into login values(null,'$_POST[name]','$_POST[pass]','$_POST[status]')";
				if(mysqli_query($con,$sql))
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
																					<option>Stock Manager</option>
                                                                                                                                                                        <option>Coordinator</option>
																			</select>
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer panel-foot">
                                                            
                                                            
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
</div>
		   
		   
		   
<div id="abcfdiv"  style="position:absolute;left:0px;top:0px;margin-left:25%;display:none;">		   
<div class="modal-dialog" >
                    <div class="modal-content" >
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Edit User</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                    <form class="form-horizontal" method="post" name="frm">
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Name </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="name" id="ename" class="form-control" required="required">
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Password </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="pass" id="epass" class="form-control" required="required">
                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Status </label>
                                                                    <div class="col-md-8">
                                                                        <select name="status" id="estatus" class="form-control" required="required">
										<option>admin</option>
										<option>Front Desk</option>
										<option>Manager</option>
										<option>Engineer</option>
										<option>Stock Manager</option>
                                                                                <option>Coordinator</option>
									</select>
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer panel-foot">
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" type="button" onclick="func()">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="edituser">Submit</button>
                                                                </div>

                                                        </div>
                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>

</div> 
</div> 
		<?php
				if(isset($_GET['e']))
				{
						$sql="select * from login where id=".$_GET['e'];
						$result=mysqli_query($con,$sql);
						if($row=mysqli_fetch_array($result))
						{
								$name=$row['user'];
								$password=$row['password'];
								$status=$row['status'];
						}
						echo "<script>
										document.getElementById('ename').value='".$name."';
										document.getElementById('epass').value='".$password."';
                                                                                document.getElementById('estatus').value='".$status."';
										document.getElementById('abcfdiv').style.display='block';
			
							</script>";
				}		
				if(isset($_POST['edituser']))
				{
						$name=$_POST['name'];
						$pass=$_POST['pass'];
                                                $status=$_POST['status'];
						
						$sql="update login set `user`='$name', `password`='$pass', `status`='$status' where `id`=".$_GET['e'];
						if(mysqli_query($con,$sql))
						{
								echo "<script>window.location='index.php?page=user';</script>";
						}
				}
		?>
		 <script>
			function func()
			{
				document.getElementById('abcfdiv').style.display='none';
			}
		</script>  