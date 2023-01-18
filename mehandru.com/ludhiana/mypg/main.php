<?php
        $limit=1;
       
        
        if(isset($_GET['p']))
        {
            $start=$_GET['p']*$limit;
        }
        else{
                $start=0;
        }
        /*
SELECT enquiry.id,enquiry.name,batch.id,batch.en_id, batch.course
FROM enquiry
INNER JOIN batch
ON enquiry.id=batch.en_id
where enquiry.status="1" AND batch.course="php" */
        ?>					


                                <div class="col-md-12">
                                                <div class="panel panel-default">
                                                        <h4 class="pull-center" style="margin-left:15px;">Enquiry</h4>
                                                               
                                                        <div class="panel-footer search">
                                                            <form method="post">
                                                                <table class="tool">
                                                                <tr>
                                                                    <th><span class="glyphicon"> Name </span></th>
                                                                    <th><input type="text" size="15" name="nm" style="font-size:12px;"></th>
                                                                    
                                                                    <th><span class="glyphicon"> Technology</span></th>
                                                                    <th><select name="tech" style="padding:2px;font-size:12px;">
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
                                                                        </select></th>
                                                                    <th><span class="glyphicon"> Enquiry Type</span></th>
                                                                    <th><select name="entype" style="padding:2px;font-size:12px;">
                                                                            <option value="">All</option>
                                                                            <option value="Walking">Walk-in</option>
                                                                            <option value="By Phone">By Phone</option>
																			
																				<option value="By Test">By Test</option> 
                                                                            
                                                                        </select>
                                                                    </th>
                                                                    <th><span class="glyphicon"> Status </span></th>
                                                                    <th><select name="status" style="padding:2px;font-size:12px;">
                                                                            <option value="all">All</option>
                                                                            <option value="0">Pending</option>
                                                                            <option value="2">Lost</option>
                                                                            
                                                                        </select>
                                                                    </th>
                                                                    
                                                                        <th>
                                                                            <input type="submit" value="Go" name="go" class="btn btn-info">
                                                                        </th>
                                                                </tr>
                                                            </table>
                                                            </form>
                                                        </div>
                                                        <div class="panel-body">
                                                                
                                                                
                                                                <table class="table table-striped tables">
                                                                        <tr>
                                                                            <th>En.No.</th>
                                                                            <th>Name</th>
                                                                            <th>Phone</th>
                                                                            <th>Email</th>
                                                                            <th>Date</th>
                                                                            <th>Response</th>
                                                                            <th>Action</th>
                                                                           
                                                                        </tr>
                                                                        <?php
                                                                        
                                                                        if(isset($_POST['go']))
                                                                        {
                                                                              if($_POST['status']=="all")
                                                                              {
                                                                                    $status="`status` like('%0%') or `status` like('%2%')";
                                                                              }
                                                                              else
                                                                              {
                                                                                  $status="`status` like('%$_POST[status]%')";
                                                                                  
                                                                              }
                                                                             
                                                                             $sql="select * from enquiry where `name` like('%$_POST[nm]%') and (`system` like('%$_POST[tech]%') or `sort` like('%$_POST[tech]%') or `software` like('%$_POST[tech]%')) and `type` like('%$_POST[entype]%') and ".$status." order by id desc";
                                                                        }
                                                                        else{
                                                                            
                                                                            $sql="select * from enquiry where `status`='0' order by id desc";
                                                                        }
                                                                        
                                                                        
                                                                        
                                                                            $result=mysqli_query($con,$sql);
                                                                            
                                                                                
                                                                            $counter=0;
                                                                            while($row=mysqli_fetch_array($result))
                                                                            {
                                                                                    $counter++;
                                                                                   echo ' <tr>
                                                                                                <td>'.$counter.'</td>
                                                                                                <td>'.$row['name'].'</td>
                                                                                                <td>'.$row['contact'].'</td>
                                                                                                <td>'.$row['email'].'</td>
                                                                                                <td>'.$row['data'].'</td>
                                                                                                <td>';
                                                                                                    $sql_res="select response from response where en_id='$row[id]' order by id desc";
                                                                                                   $re=mysqli_query($con,$sql_res);
                                                                                                   if($ro=mysqli_fetch_array($re))
                                                                                                   {
                                                                                                       echo $ro['response'];
                                                                                                   }
                                                                                           echo '</td>
                                                                                                <td>
                                                                                                   <a href="?page=view_en&&view='.$row['id'].'"> View </a>';
                                                                                   
                                                                                                  if($_SESSION['status']=='admin')
                                                                                                  {
                                                                                                    echo '|<a href="?d='.$row['id'].'"> Delete </a>';
                                                                                                  }
                                                                                                echo '</td>
                                                                                           </tr>';
                                                                               
                                                                            }
                                                                        
                                                                        ?>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                </table>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <table class="tool pull-right" >
                                                                <tr>
                                                                    <!--
                                                                    <th><span class="glyphicon"> Go To </span></th>
                                                                    <th><input type="text" size="3"></th>
                                                                    
                                                                    <th><span class="glyphicon"> Show Rows <span></th>
                                                                    <th><select>
                                                                            <option>5</option>
                                                                            <option>10</option>
                                                                            <option>15</option>
                                                                            <option>20</option>
                                                                            
                                                                        </select></th>-->
                                                                
                                                                    
                                                                    
                                                                        <th>
                                                                            <span class="glyphicon"> <a href="?p=0">First</a> | Prev | Next | <a href="?p=<?php echo $page; ?>">Last </p></span>
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