<?php session_start();
date_default_timezone_set("Asia/Kolkata"); 
require 'pconn.php';
	

	$sql="select * from parts where partcode like('%".$_POST['pcode']."%') ";

	if ($_POST['pmodel']!=' ')
	{
		$sql.="and model like('%".$_POST['pmodel']."%') ";
	}

	if(isset($_POST['p']) and $_POST['pcat']!='all')
	{
		if($_POST['p']==1)
		{
			$sql.="and cat='".$_POST['pcat']."'";
		}
	}

		// $sql="select * from parts where model like('%".$_POST['pmodel']."%') ";
	
	


	//echo $sql;
	$result=mysqli_query($pcon,$sql);
	

 
?>                      
	<table class="table table-striped">

	<tr>
			<th>No.</th>
			<th>Category</th>
			<th>Part Code</th>
			<th>Detail</th>
			<th>Model</th>
			<th>Price</th>
			<th>MRP</th>
<?php		if($_SESSION['status']=="admin"){
	  echo '<th>Action</th>';
				}
?>
		</tr>
		<?php
			$counter=0;
			while($row=mysqli_fetch_array($result))
				{
					$counter++;
					echo '<tr>
						<td>'.$counter.'</td>
						<td>'.$row['cat'].'</td>
						<td>'.$row['partcode'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['model'].'</td>
						
						<td style="text-align:right;">'.$row['price'].'/-</td>
						<td style="text-align:right;">'.$row['MRP'].'/-</td>';
				if($_SESSION['status']=="admin"){
					echo '<td>
							<a href="?page=addpart&&edit='.$row['Id'].'">Edit</a> | 
							<a href="?page=parts&&delete='.$row['Id'].'">Delete</a>
					</td>';
				}
						
					
				}
	?>
</table>