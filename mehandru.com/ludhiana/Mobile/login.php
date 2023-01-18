<?php	
		include 'conn.php';
		
		$user=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];

		$sql="select * from login where user='$user' and password='$pass' and status='Engineer'";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
				$row=mysqli_fetch_array($result);
				$response=array(
					'logged'=>true,
					'user'=>$user,
					'status'=>$row['status'],
					'id'=>$row['id']
					);
				echo json_encode($response);
		}
		else
		{
				$response=array(
					'logged'=>false,
					'message'=>"Invalid user/password"
					);
				echo json_encode($response);
		}
?>	