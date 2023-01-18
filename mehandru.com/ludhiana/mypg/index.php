<?php session_start();
		
?>

<html>
		<head>
		
		</head>
		<body>
					<form method="post">
					Select Table<select name="tab1">
						<option>approval</option>
						<option>assign</option>
						<option>`call`</option>
						<option>comment</option>
						<option>delivered</option>
						<option>estimate</option>
						<option>login</option>
						<option>rassign</option>
						<option>stock</option>
						
				</select>
							<input type="submit" value="Go" name="sub"/>
					
					</form>
			
					<?php
						if(isset($_POST['sub']))
							{
									
									$_SESSION['a']=$_POST['tab1'];
									echo '<script>window.location="summery.php";</script>';
							
							}
							
					?>	
		</body>
		
		
</html>