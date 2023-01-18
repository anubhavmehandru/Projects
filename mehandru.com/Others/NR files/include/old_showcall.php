<?php session_start();
require 'conn.php';
 
$limit=10;
$cpage=1;
$start=0;
            
 //if(isset($_POST['name'],$_POST['entype'],$_POST['course']))
 if(isset($_POST['name']))
	{
		$srch1=$_POST['name'];
		if($_POST['id']!=0)
			{
				$srch1=$srch1." and `callid`='$_POST[id]'";
			}
			
	}
	else
	{
		$srch1="!='Closed'";
	}
 
	if($_SESSION['status']=="admin")
	{
			if(isset($_POST['page']))
                {
				        $cpage=$_POST['page'];
                        $start=($cpage-1)*$limit;            
                        $sql="select * from `call` where `cstatus`$srch1 limit ".$start.",".$limit;
						$sql1="select * from `call` where `cstatus`$srch1";
                }
			else
                {   
						$sql="select * from `call` where `cstatus`$srch1 limit ".$start.",".$limit;
						$sql1="select * from `call` where `cstatus`$srch1";
                }           
    }
	else if($_SESSION['status']=="Coordinator")
	{
			if(isset($_POST['page']))
                {
							$cpage=$_POST['page'];
                            $start=($cpage-1)*$limit;            
                            $sql="select * from `call` where `cstatus`!='Closed' limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus`!='Closed'";
                }
			else
                {   
							$sql="select * from `call` where `cstatus`!='Closed' limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus`!='Closed'";
                }           
	}
	else if($_SESSION['status']=="Manager")
	{
			if(isset($_POST['page']))
                {
							$cpage=$_POST['page'];
                            $start=($cpage-1)*$limit;            
                            $sql="select * from `call` where `cstatus`!='Closed' limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus`!='Closed'";
                }
			else
                {   
							$sql="select * from `call` where `cstatus`!='Closed' limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus`!='Closed'";
                }           
	}
	else if($_SESSION['status']=="Engineer")
	{
			if(isset($_POST['page']))
                {
							$cpage=$_POST['page'];
                            $start=($cpage-1)*$limit;            
                            $sql="select * from `call` where (`cstatus`='Pending Estimate' and id in(select callid from assign where user='$_SESSION[ulog]')) or ((`cstatus`='Repair' or `cstatus`='Ready') and id in(select callid from rassign where user='$_SESSION[ulog]')) limit ".$start.",".$limit;
							$sql1="select * from `call` where (`cstatus`='Pending Estimate' and id in(select callid from assign where user='$_SESSION[ulog]')) or ((`cstatus`='Repair' or `cstatus`='Ready') and id in(select callid from rassign where user='$_SESSION[ulog]'))";
                }
			else
                {   
							$sql="select * from `call` where ((`cstatus`='Pending Estimate' or `cstatus`='Pending Type' 
							or `cstatus`='Parts Required' or `cstatus`='Pending Parts') and 
							id in(select callid from assign where user='$_SESSION[ulog]'))
							or ((`cstatus`='Repair' or `cstatus`='Ready') and 
							id in(select callid from rassign where user='$_SESSION[ulog]')) limit ".$start.",".$limit;
							
							
							$sql1="select * from `call` where (`cstatus`='Pending Estimate' and id in(select callid from assign where user='$_SESSION[ulog]')) or ((`cstatus`='Repair' or `cstatus`='Ready') and id in(select callid from rassign where user='$_SESSION[ulog]'))";
                }           
	}
	
                //pagging Start////////////
               // echo $sql;
                    $result1=mysqli_query($con,$sql1);
                    $page=ceil(mysqli_num_rows($result1)/$limit);
                           
                    echo "<input type='hidden' id='tp' value='".$page."'/>";    
                    echo "<input type='hidden' id='cp' value='".$cpage."'/>";    
                     
                ///End of pagging/////////
?>                      
                                                                <table class="table table-striped">
                                                                        <tr>
																				<th>No.</th>
																				<th>Call ID</th>
																				<th>Customer Name</th>
																				<th>Product</th>
																				<th>Serial No</th>
																				<th>Contact</th>                                                                           
																				<th>Date</th>                                                                           
																				<th>Currunt Status</th>                                                                           
																				<th>Action</th>
                                                                        </tr>
                                                                        <?php
																			$result=mysqli_query($con,$sql);
                                                                            $counter=$start;
                                                                            while($row=mysqli_fetch_array($result))
                                                                            {
                                                                                    $counter++;
                                                                                    echo ' <tr>
                                                                                                <td>'.$counter.'</td>
                                                                                                <td>'.$row['callid'].'</td>
                                                                                                <td>'.$row['customername'].'</td>
                                                                                                <td>'.$row['product'].'</td>
                                                                                                <td>'.$row['serialno'].'</td>
                                                                                                <td>'.$row['contact'].'</td>
                                                                                                <td>'.$row['date'].'</td>
                                                                                                <td>';
																								
																								if($row['cstatus']=="Ready")
																									{
																										echo "Repaired";
																									}
																								else if($row['cstatus']=="Repair")
																									{
																										echo "Pending For Repair";
																									}
																								else{
																										echo $row['cstatus'];
																									}
																								echo '</td>';
																					if($row['carry']=="carryin" and $row['warranty']=='nwarranty')			
                                                                                     {     
																							echo '<td>
                                                                                                   <a href="?page=view_en&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report&&view='.$row['id'].'"> Report </a>
                                                                                                </td>';
																					}
																					else if($row['carry']=="onsite" and $row['warranty']=='warranty')			
                                                                                    {     
																							echo '<td>
                                                                                                   <a href="?page=view_en_2&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report_2&&view='.$row['id'].'"> Report </a>
                                                                                                </td>';
																					}
																					else if($row['carry']=="carryin" and $row['warranty']=='warranty')			
                                                                                    { 
																							
																							echo '<td>
                                                                                                   <a href="?page=view_en_3&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report_3&&view='.$row['id'].'"> Report </a>
                                                                                                </td>';
																								
																					}
                                                                                     echo '      </tr>';
                                                                            }
                                                                        ?>
                                                                </table>