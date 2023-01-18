<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
require 'conn.php';
 
$limit=15;
$cpage=1;
$start=0;
            
 //if(isset($_POST['name'],$_POST['entype'],$_POST['course']))
 if(isset($_POST['name']))
	{
		$srch1=$_POST['name'];
		if($_POST['id']!=0)
			{
				$srch1=$srch1." and `callid` like('%$_POST[id]%')";
			}
		if($_POST['srno']!='')
			{
				$srch1=$srch1." and `serialno` like('%$_POST[srno]%')";
			}
		if($_POST['cname']!='')
			{
				$srch1=$srch1." and `customername` like('%$_POST[cname]%')";
			}
		if($_POST['contact']!='')
			{
				$srch1=$srch1." and `contact` like('%$_POST[contact]%')";
			}
		//echo "<script>alert('".$srch1."');</script>";
		
			
	}
	else
	{
		$srch1=" NOT IN ('Closed','NR Closed')";
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
                            $sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
                }
			else
                {   
							$sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
                }           
	}
	else if($_SESSION['status']=="Front Desk")
	{
			if(isset($_POST['page']))
                {
							$cpage=$_POST['page'];
                            $start=($cpage-1)*$limit;            
                            $sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
                }
			else
                {   
							$sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
                }           
	}
	else if($_SESSION['status']=="Manager")
	{
			if(isset($_POST['page']))
                {
							$cpage=$_POST['page'];
                            $start=($cpage-1)*$limit;            
                            $sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
                }
			else
                {   
							$sql="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed') limit ".$start.",".$limit;
							$sql1="select * from `call` where `cstatus` NOT IN ('Closed','NR Closed')";
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
																				<th>Model</th>
																				<th>Serial No</th>
																				<th>Contact</th>                                                                           
																				<th>Call Type</th>                                                                           
																				<th>Current Status</th> 
																				<th>Day's</th>
																				<th style="width:160px;">Action</th>
																				
                                                                        </tr>
                                                                        <?php
																			$result=mysqli_query($con,$sql);
                                                                            $counter=$start;
                                                                            while($row=mysqli_fetch_array($result))
                                                                            {
																			        $counter++;
																						$flag_close=0;
																						$date="";
																							if($row['cstatus']!="Closed" || $row['cstatus']!="NR Closed")
																								{
																									$date=date("y-m-d");
																									$flag_close=1;
																								}
																							else{
																									$rr="select * from delivered where callid=".$row['id'];
																									$rrr=mysqli_query($con,$rr);
																									if($rrrr=mysqli_fetch_array($rrr))
																										{
																											$date=$rrrr['date'];
																										}
																								}
																									$date1=date_create("$row[date]");
																									$date2=date_create("$date");
																									$diff=date_diff($date1,$date2);
																									//$date_show=$diff->format("%R%a days");
																									$date_show=$diff->format("%R%a");
																									$temp_date=$diff->format("%a");
																									
                                                                                    echo ' <tr ';
																									
																							if($temp_date>=5 and $flag_close==1)
																								{
																									echo 'class="hilight" ';
																								}
																						
																					echo '>
                                                                                                <td >';
																									
																								echo $counter.'</td>';
																								
                                                                                               if($_SESSION['status']=="Coordinator" or $_SESSION['status']=="Front Desk" or $_SESSION['status']=="admin" )
																								{
																									echo ' <td><a href="?page=print&&id='.$row['id'].'">'.$row['callid'].'</a></td>';
																								}
																							   else
																								{
																									echo ' <td>'.$row['callid'].'</td>';
																								}
																							   
																							   
																							   
                                                                                                echo '<td>'.$row['customername'].'</td>
                                                                                                <td>'.$row['model'].'</td>
                                                                                                <td>'.$row['serialno'].'</td>
                                                                                                <td>'.$row['contact'].'</td>
                                                                                                <td>';
																									
																									echo	$fone=strtoupper(substr($row['warranty'],0,1));
																									echo " / ";
																									echo 	$ftwo=strtoupper(substr($row['carry'],0,1));
																									echo " / ";
																									echo 	$fthree=strtoupper(substr($row['calltype'],0,1));
																								
																								echo'</td>
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
																								echo '</td>
																								<td>'.$date_show.'</td>';
																					if($row['carry']=="carryin" and $row['warranty']=='nwarranty')			
                                                                                     {     
																							echo '<td>
                                                                                                   <a href="?page=view_en&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report&&view='.$row['id'].'"> Report </a>';
																								   if($_SESSION['status']=="admin")
																								   {
																									echo '| <a href="?page=main&&callid='.$row['id'].'"> Delete </a>';
																								   }
                                                                                            echo '</td>';
																					}
																					else if($row['carry']=="onsite" and $row['warranty']=='warranty')			
                                                                                    {     
																							echo '<td>
                                                                                                   <a href="?page=view_en_2&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report_2&&view='.$row['id'].'"> Report </a>';
																								   if($_SESSION['status']=="admin")
																								   {
																									echo '| <a href="?page=main&&callid='.$row['id'].'"> Delete </a>';
																								  }
                                                                                            echo '</td>';
																					}
																					else if($row['carry']=="carryin" and $row['warranty']=='warranty')			
                                                                                    { 
																							
																							echo '<td>
                                                                                                   <a href="?page=view_en_3&&view='.$row['id'].'"> View </a> |
                                                                                                   <a href="?page=view_report_3&&view='.$row['id'].'"> Report </a>';
																								   
																								   if($_SESSION['status']=="admin")
																								   {
																									echo '| <a href="?page=main&&callid='.$row['id'].'"> Delete </a>';
																								   }
																								   
																								   
                                                                                            echo '</td>';
																								
																					}
																					else
																					{
																					echo '	<td></td>';
																					}
																						
                                                                                     echo '
																					 </tr>';
																			}
                                                                        ?>
                                                                </table>