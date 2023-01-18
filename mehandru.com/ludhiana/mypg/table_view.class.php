<?php
		
		function conn($host,$user,$pass,$db)
		{
			$con=mysqli_connect($host,$user,$pass,$db);
			if(!$con)
				{
					echo mysqli_error($con);
				}
		
		}
		function grid($table)
		{
			$sql="select * from ".$table."";
			$result=mysqli_query($con,$sql);
			echo '<table cellpadding="20" border="1">';
				echo '<tr>';
				$t=0;
				$fields="";
				while($ty=mysqli_fetch_field($result))
					{
						if($t==0)
							{
							$xyz=$ty->name;
							$t=10;
							}
							$fields=$fields.$ty->name.",";
							
						echo '<th>'.$ty->name.'</th>';
					}
							echo '<th>Edit</th>';
							echo '<th>Delete</th>';
				echo '</tr>';
			
				$r=mysqli_num_fields($result);
				while($row=mysqli_fetch_array($result))
					{
							echo '<tr>';
										for($i=0;$i<$r;$i++)
											{
											echo '<td>'.$row[$i].'</td>';
											}
										echo'<td><a href="?p='.$row[0].'">Edit</a></td>'; 
										echo'<td><a href="?d='.$row[0].'">delete</a></td>'; 
										
							echo '</tr>';
					
					}

			echo '</table>';
			if(isset($_GET['p']))
				{
						echo $sql123="select * from ".$table." where ".$xyz."='".$_GET['p']."'";
						$result123=mysqli_query($con,$sql123);
						echo '<form method="post">';
						while($row123=mysqli_fetch_array($result123))
							{
									for($i=1;$i<$r;$i++)
									{
										echo '<input type="text" name="'.$i.'" value="'.$row123[$i].'"><br/>';
									}
									
							}
								echo'<input type="submit" value="Update" name="up"/>';
						echo '</form>';
								
											
				}
				if(isset($_POST['up']))
					{
						$fields=explode(",",$fields);
						$sql_up="update ".$table." set `".$fields[1]."`='$_POST[1]'";
								for($i=2;$i<$r;$i++)
										{
											$sql_up=$sql_up.", `".$fields[$i]."`='$_POST[$i]' ";
										}
										
					
						echo $sql_up=$sql_up." where ".$xyz."='$_GET[p]'";
						if(mysqli_query($con,$sql_up))
						{
							echo '<script>window.location="?";</script>';
						}
					}
			if(isset($_GET['d']))
				{
					//echo $xyz;
						$sql="delete from ".$table." where ".$xyz."='$_GET[d]'";
						mysqli_query($con,$sql);
				}
			
		
		}
?>







