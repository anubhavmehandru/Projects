<?php	ob_start();
		include 'conn.php';
		$json_response = array();
	
		 $sql="select * from `call` where `cstatus`='Repair' and 
							id in(select callid from rassign where user='$_REQUEST[ulog]')";
			
			$result=mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)) {
						$row_array['id']=  		$row['id'];
						$row_array['callid']=  	$row['callid'];
						$row_array['model']=  	$row['model'];
						$row_array['serialno']= $row['serialno'];
						
						array_push($json_response,$row_array);
			}
		
		echo json_encode($json_response);
?>	