<?php
		include 'conn.php';
		
		if(isset($_REQUEST['view']))	
		{
			$date=date("y-m-d");
			$time=date("h:i:sa");
			
			 $sql="update rassign set `repair_date`='$date', `repair_time`='$time' where `callid`='$_REQUEST[view]'";
			if(mysqli_query($con,$sql))
			{
						$sk="select * from `en_call_type` where `call`='$_REQUEST[view]'";
						$skre=mysqli_query($con,$sk);
						if($skrow=mysqli_fetch_array($skre))
						{
							if($skrow['type']=="On Site")
								{
									$sql2="update `call` set `cstatus`='Closed' where id='$_REQUEST[view]'";
								}
							else{
									$sql2="update `call` set `cstatus`='Ready' where id='$_REQUEST[view]'";
								}
								if(mysqli_query($con,$sql2))
									{
										$sql13="insert into comment values('$_REQUEST[view]','$_REQUEST[com]')";
										mysqli_query($con,$sql13);
										echo "Ready";
									}
								
						}		
						
			}
		}
			
?>