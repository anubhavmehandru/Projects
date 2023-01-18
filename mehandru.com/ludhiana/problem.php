<div class="col-md-12">
        <div class="panel panel-default">
                <form class="form-horizontal" method="post">
                         <div class="panel-body">
							<h4>Problem</h4>
                                <hr/>
								<div class="form-group" id="onsiteaddress">
                                        <label class="col-lg-2 control-label">Problem </label>
                                        <div class="col-lg-10">
                                                <textarea class="form-control" rows="2" name="address" required="required"></textarea>
                                        </div>
                                </div>
                </div>
                <div class="panel-footer panel-foot">
                    <div>
                        <button class="btn btn-warning " type="reset">Reset</button>
                        <button class="btn btn-primary " type="submit" name="sub">Submit</button>
                    </div> 
                </div>
             </form>
        </div>

<?php
    if(isset($_POST['sub']))
    {
        include 'include/conn.php';
		
		$user=$_SESSION['user'];
		$date=date("y-m-d");
		$address=$_POST['address'];	
		$time=date("h:i:sa");
		
		$sql="insert into `problem` values(null,'$user','$address','','$date','$time')";
		if(mysqli_query($con,$sql))
		{
			echo "<script>window.location='index.php?page=problem';</script>";
		}
           
    }
?>
<script>
		$(document).ready(function(){
				
					$("#problem p:odd").css({"text-align":"right"});
					$("#problem p:even").css({"text-align":"left"});
		
		});
</script>
	 <div class="panel panel-default">
                <div class="panel-body" id="problem">
							<h4>History</h4>
                                <hr/>
								
						<?php
							$sq="select * from `problem` order by id desc";
							$result=mysqli_query($con,$sq);
							while($row=mysqli_fetch_array($result))
							{
								echo "<p> <b style='color:green'>".$row['user']." :- </b>".$row['problem']."</p>";
								echo "<p>".$row['solution']."</p>";
								echo "<hr/>";
							}

						?>
                </div>
        </div>














</div>