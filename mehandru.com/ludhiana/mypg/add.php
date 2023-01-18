					<div class="col-md-12">
                                                <div class="panel panel-default">
                                                        <h4 class="pull-center" style="margin-left:15px;">Students</h4>
                                                        <form method="post" >     
                                                        <div class="panel-footer search">
                                                                <table class="tool">
                                                                <tr>
                                                                    <th><span class="glyphicon"> Name </span></th>
                                                                    <th><input type="text" size="15" name="name" style="font-size: 12px;"></th>
                                                                    
                                                                    <th><span class="glyphicon"> Enquiry Type</span></th>
                                                                    <th>
                                                                            <select name="entype" style="padding:2px;font-size:12px;">
                                                                                <option value="">All</option>
                                                                                <option value="Walking">Walk-in</option>
                                                                                <option value="By Phone">By Phone</option> 
																				<option value="By Test">By Test</option> 
                                                                            </select>
                                                                    </th>
                                                                    
                                                                    <th><span class="glyphicon"> Course </span></th>
                                                                    <th>
                                                                            <select name="course" style="padding:2px;font-size:12px;">
                                                                                    <option value="">All</option>
                                                                                    <option>System Expert</option>
                                                                                    <option>Network Expert</option>
                                                                                    <option>A+</option>
                                                                                    <option>N+</option>
                                                                                    <option>MCITP</option>
                                                                                    <option>CCNA</option>
                                                                                    <option>Linux</option>
                                                                                    <option>CCNP</option>
                                                                                    <option>C</option>                                                                            
                                                                                    <option>php</option>
                                                                                    <option>.net</option>
                                                                                    <option>Java</option>
                                                                                    <option>Web Designing</option>
                                                                                    <option>CCNP</option>
                                                                                    
                                                                            </select>
                                                                    </th>
                                                                    
                                                                        <th>
                                                                            <input type="Submit" value="Go" name="go" class="btn btn-info">
                                                                        </th>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                        </div>
                                                        <div class="panel-body">
                                                                
                                                                
                                                                <table class="table table-striped">
                                                                        <tr>
                                                                            <th>En.No.</th>
                                                                            <th>Name</th>
                                                                            <th>Father Name</th>
                                                                            <th>Phone</th>                                                                           
                                                                            <th>Course</th>
                                                                            <th>Date of Join</th>
                                                                            <th>Action</th>
                                                                           
                                                                        </tr>
                                                                        <?php
                                                                        
                                                                        if(isset($_POST['go']))
                                                                        {
                                                                           
                                                                              /* $sql="SELECT enquiry.id,enquiry.name,enquiry.father,enquiry.contact,batch.course,batch.bdstart
                                                                                    FROM enquiry
                                                                                    INNER JOIN batch
                                                                                    ON enquiry.id=batch.en_id
                                                                                    where enquiry.status='1' AND enquiry.name like('%$_POST[name]%')";
																				if($_POST['entype']!="")
																					{
																						$sql=$sql." AND enquiry.type='$_POST[entype]'";
																					}
																				$sql=$sql." AND batch.course='$_POST[course]' 
																					order by enquiry.id desc";*/
                                                                               $sql="SELECT enquiry.id,enquiry.name,enquiry.father,enquiry.contact,batch.course,batch.bdstart
                                                                                    FROM enquiry
                                                                                    INNER JOIN batch
                                                                                    ON enquiry.id=batch.en_id
                                                                                    where enquiry.status='1' AND enquiry.name like('%$_POST[name]%') 
																					AND enquiry.type like('$_POST[entype]%') AND batch.course like('%$_POST[course]%') 
																					order by enquiry.id desc"; 
																					/*$sql="SELECT enquiry.id,enquiry.name,enquiry.father,enquiry.contact,batch.course,batch.bdstart
                                                                                    FROM enquiry
                                                                                    INNER JOIN batch
                                                                                    ON enquiry.id=batch.en_id
                                                                                    where enquiry.status='1' AND enquiry.name like('%$_POST[name]%') 
																					AND enquiry.type like('$_POST[entype]%') AND batch.course like('%$_POST[course]%') 
																					order by enquiry.id desc";*/
                                                                        }
                                                                        else
                                                                        {
                                                                            
                                                                               $sql="SELECT enquiry.id,enquiry.name,enquiry.father,enquiry.contact,batch.course,batch.bdstart
                                                                                    FROM enquiry
                                                                                    LEFT OUTER JOIN batch
                                                                                    ON enquiry.id=batch.en_id
                                                                                    where enquiry.status='1' order by enquiry.id desc";
                                                                        }
                                                                        
                                                                       
                                                                            $result=mysqli_query($con,$sql);
                                                                            $counter=0;
                                                                            while($row=mysqli_fetch_array($result))
                                                                            {
                                                                                    
                                                                                    $counter++;
                                                                                    echo ' <tr>
                                                                                                <td>'.$counter.'</td>
                                                                                                <td>'.$row['name'].'</td>
                                                                                                <td>'.$row['father'].'</td>
                                                                                                <td>'.$row['contact'].'</td>
                                                                                                <td>'.$row['course'].'</td>
                                                                                                <td>'.$row['bdstart'].'</td>';
                                                                                              
                                                                                          echo '<td>
                                                                                                   <a href="?page=view_en&&view='.$row['id'].'"> View </a> |
                                                                                                       <a href="?page=batch&&view='.$row['id'].'"> Batch </a>
                                                                                                </td>
                                                                                           </tr>';
                                                                               
                                                                            }
                                                                        
                                                                        ?>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                </table>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <table class="tool pull-right">
                                                                
                                                                <tr>
                                                                  <!--  <th><span class="glyphicon"> Go To </span></th>
                                                                    <th><input type="text" size="3"></th>
                                                                    
                                                                    <th><span class="glyphicon"> Show Rows <span></th>
                                                                    <th><select>
                                                                            <option>5</option>
                                                                            <option>10</option>
                                                                            <option>15</option>
                                                                            <option>20</option>
                                                                            
                                                                        </select></th>-->
                                                                        <th>
                                                                            <span class="glyphicon"> First | Prev | Next | Last </span>
                                                                        </th>
                                                                </tr>
                                                            </table>
                                                            <br/><br/>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
 <!-------------------------Start Add Enquiry -------------->                                       

                                        
           <?php
           
            if(isset($_GET['d']))
            {
                    $sql="delete from enquiry where `id`='$_GET[d]'";
                    if(mysqli_query($con,$sql))
                    {
                        echo '<script>window.location="?";</script>';
                    }
            }
           
           
           
           
           
           
           
           ?>