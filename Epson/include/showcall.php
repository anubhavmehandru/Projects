<?php session_start();
 require 'conn.php';
 
 
$limit=10;
$cpage=1;
$start=0;
            
 //if(isset($_POST['name'],$_POST['entype'],$_POST['course']))
 if(isset($_POST['page']))
                {
                           $cpage=$_POST['page'];
                             $start=($cpage-1)*$limit;            
                            $sql="select * from `call` limit ".$start.",".$limit;
							$sql1="select * from `call`";
                }
 else
                {   
							$sql="select * from `call` limit ".$start.",".$limit;
							$sql1="select * from `call`";
                }           
                
                //pagging Start////////////
                
                    $result1=mysql_query($sql1);
                    $page=ceil(mysql_num_rows($result1)/$limit);
                           
                    echo "<input type='hidden' id='tp' value='".$page."'/>";    
                    echo "<input type='hidden' id='cp' value='".$cpage."'/>";    
                     
                ///End of pagging/////////
?>                      
                                                                <table class="table table-striped">
                                                                        <tr>
																				<th>No.</th>
																				<th>Call Id</th>
																				<th>Customer Name</th>
																				<th>Product</th>
																				<th>Contact</th>                                                                           
																				<th>Date</th>                                                                           
																				<th>Currunt Status</th>                                                                           
																				<th>Action</th>
                                                                        </tr>
                                                                        <?php
																			$result=mysql_query($sql);
                                                                            $counter=$start;
                                                                            while($row=mysql_fetch_array($result))
                                                                            {
                                                                                    $counter++;
                                                                                    echo ' <tr>
                                                                                                <td>'.$counter.'</td>
                                                                                                <td>'.$row['callid'].'</td>
                                                                                                <td>'.$row['customername'].'</td>
                                                                                                <td>'.$row['product'].'</td>
                                                                                                <td>'.$row['contact'].'</td>
                                                                                                <td>'.$row['date'].'</td>
                                                                                                <td>'.$row['cstatus'].'</td>';
                                                                                          echo '<td>
                                                                                                   <a href="?page=view_en&&view='.$row['id'].'"> View </a>
                                                                                                </td>
                                                                                           </tr>';
                                                                            }
                                                                        ?>
                                                                </table>