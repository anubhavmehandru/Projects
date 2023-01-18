<?php session_start();
       
   include 'include/conn.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery.js"></script>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mystyle.css" rel="stylesheet">
        <style>
            body{
                
                    background-image:url(img/bg.jpg);
            }
            
            </style>
    </head>
    <body>
                                            <?php
                                                //echo $_SERVER['REMOTE_ADDR'];
                                            ?>
                                <div class="navbar navbar-inverse navbar-static-top" >
                                    <h3>SERVICE MANAGEMENT SYSTEM</h3>        
				</div>
                                <div class="container">
                                    <div class="row">   
                                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " >
                                                    <div class="list-group">
                                                                 <span class="list-group-item">
																	<h4  class="ribbon">Login Panel</h4>
                                                                                  <form class="form-horizontal" method="post" autocomplete="off">
																					<div class="row">
																						<div class="col-md-2"></div>
                                                                                        <fieldset class="inputs col-md-8">
																							<div class="form-group ">
																									<div class="col-md-12">
																											<input type="text" name="user" value="<?php if(isset($_GET['user'])){ echo $_GET['user']; }else{ echo "User Name"; }?>" id="username"  onblur="if(this.value=='')this.value='User Name';" onfocus="if(this.value=='User Name')this.value='';"  class="form-control">
																									</div>
                                                                                            </div>
																							<div class="form-group">
																									<div class="col-md-12">
																											<input type="password" name="pass" value="Password" onblur="if(this.value=='')this.value='Password';" onfocus="if(this.value=='Password')this.value='';" id="password" class="form-control">
																									</div>
																							</div>
																						</fieldset>
																						 <div class="col-md-2"></div>
																					</div>
																					<div class="row">
																							<fieldset class="col-md-12">
																						   
                                                                                           <div class="form-group">
                                                                                                   <div class="col-md-12" style="text-align:center;">
																								   <br/>
                                                                                                            <button class="btn btn-warning " type="reset">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                            <button class="btn btn-primary " type="submit" name="sub">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                   </div>
                                                                                                  
                                                                                           </div>
																						    </fieldset>
                                                                                  </form>
                                                                 </span>
                                                    </div>
                                            </div>
                                        
                                    </div>
                                </div>
                                    
                                
                                <div class="navbar navbar-default navbar-fixed-bottom" style="min-height:25px;overflow:hidden;">
                                   <div class="container">
                                        <p class="navbar-text" style="margin:0px;margin-top:3px;">Developed By 3CM</p>
                                        <p class="navbar-text pull-right" style="margin:0px;margin-top:3px;">Proprietor: Devinder Mehandru </p>
										</a>
                                       <!-- <a href="..//www.3cmgroup.in" target="_blank" class=" pull-right navbar-btn btn-danger btn">3CM GROUP</a>-->
                                    </div>
                                </div>
        
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php
	   
	
    if(isset($_POST['sub']))
    {
           $sql="select * from login where `user`='$_POST[user]' and `password`='$_POST[pass]'";
            $result=mysqli_query($con,$sql);
            $abc=mysqli_num_rows($result);
            if($abc<=0)
                    {
                            echo '<script>alert("Not Valid User Name or Password");
									window.location="login.php?user='.$_POST['user'].'";
							</script>';
                    }
            else{
                            if($row=mysqli_fetch_array($result))
                                    {
                                            $_SESSION['ulog']=$row['id'];
                                            $_SESSION['user']=$row['user'];
                    
                                            $_SESSION['status']=$row['status'];
                                                echo '<script>
                                                                   window.location="index.php";
                                                      </script>';

                                    }
                    }
    }



?>