<?php session_start();
 date_default_timezone_set("Asia/Kolkata");
 if(!isset($_SESSION['ulog']))
                        {
                                echo '<script>window.location="login.php";</script>';
                        }
        if($_SESSION['status']=="staff")
            {
                echo "<script>window.location='staff/';</script>";
            }
   include 'include/conn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title>Service Center</title>
       <script type="text/javascript" src="js/jquery.js"></script>
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mystyle.css" rel="stylesheet">

	
    </head>
    <body>
                                <div class="navbar navbar-inverse navbar-static-top" >
								<div class="container">	
                                            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeader-collepse">
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                                            <span class="icon-bar"></span>
                                            </button>
                                            <div class="collapse navbar-collapse navHeader-collepse">
                                                            <ul class="nav navbar-nav">                                                                    
                                                                            <li><a href="?page=enquiry">Add Call</a></li>
                                                                            <li><a href="?">Calls</a></li>
                                                                            <li><a href="?page=user">User</a></li>
                                                                            
																			<!--  <li><a href="?page=oenquiry">Old Enquiry</a></li>
                                                                            <li><a href="?page=add">Admissions</a></li>
                                                                            <li><a href="?page=slot">Batch</a></li>
                                                                            <li><a href="?page=certificate">Certificate</a></li>
                                                                            <li><a href="?page=bday">Birthday</a></li>
                                                                            <li><a href="#report" data-toggle="modal">Reports</a></li>-->
                                                                            <li><a href="#cpass" data-toggle="modal">Change Password</a></li>
                                                                            <li><a href="?page=logout">Logout</a></li>
                                                            </ul>
                                            </div>
                                        </div>
						
				</div>
                                <div class="container">
                                    <div class="row con">
                   
                                        
                                        
                                        
                                        
                                        
                                        
                                        
<div class="modal fade" id="report" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Report</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                <div class="row">
                                                        <?php
                                                            $sql="select * from enquiry";
                                                            $sql1="select * from enquiry where status='0'";
                                                            $sql2="select * from enquiry where status='1'";
                                                            $sql3="select * from enquiry where status='2'";
                                                            
                                                            $result=mysql_query($sql);
                                                            $result1=mysql_query($sql1);
                                                            $result2=mysql_query($sql2);
                                                            $result3=mysql_query($sql3);
                                                            
                                                            $a=$total=mysql_num_rows($result);
                                                            $b=$pending=mysql_num_rows($result1);
                                                            $c=$lost=mysql_num_rows($result2);
                                                            $d=$complete=mysql_num_rows($result3);
                                                            
                                                            //$total=850;
                                                            //$pending=100;
                                                            //$lost=300;
                                                            //$complete=50;
                                                            
                                                            if($total<200)
                                                            {
                                                                $total=$total*100;
                                                            
                                                                $pending=$pending*100;
                                                               $lost=$lost*100;
                                                            
                                                                $complete=$complete*100;
                                                            }
                                                            $total=($total/100)*10;
                                                            $pending=($pending/100)*10;
                                                            $lost=($lost/100)*10;
                                                            $complete=($complete/100)*10;
                                                            
                                                            //echo $total."<br/>";
                                                            //echo $pending."<br/>";
                                                            //echo $lost."<br/>";
                                                            //echo $complete."<br/>";
                                                            
                                                        ?>
                                                            <div class="col-xs-2 com" style="height:<?php echo $total; ?>px;"></div>
                                                            <div class="col-xs-2 com" style="height:<?php echo $pending;?>px;margin-top:<?php echo $m=$total-$pending;?>px;"></div>
                                                            <div class="col-xs-2 com" style="height:<?php echo $lost; ?>px;margin-top:<?php echo $y=$total-$lost; ?>px"></div>
                                                            <div class="col-xs-2 com" style="height:<?php echo $complete; ?>px;margin-top:<?php echo $y=$total-$complete; ?>px"></div>
                                                </div> 
                                                <div class="row lb">
                                                            <div class="col-xs-2">Total</div>
                                                            <div class="col-xs-2">Pending</div>
                                                            <div class="col-xs-2">Complete</div>
                                                            <div class="col-xs-2">Lost</div>
                                                </div> 
                                                
                                                <div class="row lb">
                                                            <div class="col-xs-2"><?php echo $a; ?></div>
                                                            <div class="col-xs-2"><?php echo $b; ?></div>
                                                            <div class="col-xs-2"><?php echo $c; ?></div>
                                                            <div class="col-xs-2"><?php echo $d; ?></div>

                                                            
                                                </div> 
                                                
                                                    
                                            </div>
                                            <div class="modal-footer">
                                                            <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                            
                                            </div>
                            </form>
                    </div>

</div>

</div>              
                                               
  
                                        
                                        
                                        
                                        
<div class="modal fade" id="cpass" role="dailog">                                        
        <div class="modal-dialog">
                    <div class="modal-content">
                            <form class="form-horizontal" method="post">
                                            <div class="modal-header">
                                                    <h4>Change Password</h4>
                                                  <button type="button" class="close pull-right" style="margin-top:-45px;" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body" style="overflow:hidden;">
                                                       
                                                    <form class="form-horizontal" method="post" name="frm">


                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">Old Password </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="oldpass" class="form-control" required="required">
                                                                    </div>

                                                            </div>
                                                            <div class="form-group">
                                                                    <label class="col-md-3 control-label">New Password </label>
                                                                    <div class="col-md-8">
                                                                            <input type="text" name="newpass" class="form-control" required="required">
                                                                    </div>

                                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                            
                                                            
                                                        <div class="form-group">
                                                                <div class="col-md-12" style="text-align:right;">
                                                                         <button class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                                                         <button class="btn btn-primary " type="submit" name="cpass">Submit</button>
                                                                </div>

                                                        </div>
                                                            
                                            </div>
                                 </form>
                            </form>
                    </div>

</div>

</div>              
                                        
<?php
        if(isset($_POST['cpass']))
        {
           echo  $query="select password from login where `id`='".$_SESSION['ulog']."'";
            $result=mysql_query($query);
            if($row=  mysql_fetch_array($result))
            {
                    if($row['password']==$_POST['oldpass'])
                    {
                           $sql="update login set `password`='$_POST[newpass]' where `id`='".$_SESSION['ulog']."'";
                           if(mysql_query($sql))
                           {
                                echo '<script>window.location="index.php";</script>';
                           }
                          
                    }
                    else{
                        echo '<script>alert("Old Password Not Mactch");</script>';
                    }
                
            }
            
        }


?>