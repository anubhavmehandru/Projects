<?php	ob_start();
		include 'conn.php';
		$json_response = array();
	
		 $sql="select * from `call` where id='$_REQUEST[cid]'";
			
			$result=mysqli_query($con,$sql);
			while($row = mysqli_fetch_array($result)) {
						$row_array['customername']=  		$row['customername'];
						$row_array['problem']=  	$row['problem'];
						$row_array['contact']=  	$row['contact'];
						
						array_push($json_response,$row_array);
			}
		
		echo json_encode($json_response);
?>	