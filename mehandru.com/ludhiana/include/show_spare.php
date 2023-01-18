<?php session_start();
require 'conn.php';
 
	$count=0;
		$sql="select * from stock where callid='$_GET[view]'";
		$result=mysqli_query($con,$sql);
		echo '<tr>
						<td>Sr.no</td>
						<td>Spare</td>
						<td>Price</td>
						<td>Status</td>
					
				</tr>';
		while($row=mysqli_fetch_array($result))
		{
			$count++;
			echo "<tr>
							<td>".$count."</td>
							<td>".$row['item']."</td>
							<td>".$row['price']."</td>
							<td>".$row['status']."</td>
				</tr>";
		}
	?>