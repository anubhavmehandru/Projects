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
                
                    background-image:url(img/2.jpg);
            }
            
            </style>
    </head>
    <body>
                                            <?php
                                                //echo $_SERVER['REMOTE_ADDR'];
                                            ?>
                                <div class="navbar navbar-inverse navbar-static-top" >
                                            
				</div>
                                <div class="container">
                                    <div class="row">   
                                            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 " >
                                                    <div class="list-group">
                                                                 <span class="list-group-item">
                                                                                <h4>Login Panel</h4>
                                                                                  <form class="form-horizontal" method="post" autocomplete="off">
                            
                                                                                   
                                                                                           <hr/>

                                                                                           <div class="form-group">
                                                                                                   <label class="col-md-3 control-label" >Name </label>
                                                                                                   <div class="col-md-8">
                                                                                                           <input type="text" name="user" class="form-control">
                                                                                                   </div>
                                                                                                  
                                                                                           </div>
                                                                                           <div class="form-group">
                                                                                                   <label class="col-md-3 control-label">Password </label>
                                                                                                   <div class="col-md-8">
                                                                                                           <input type="password" name="pass" class="form-control">
                                                                                                   </div>
                                                                                                  
                                                                                           </div>
                                                                                           <br/>
                                                                                           <div class="form-group">
                                                                                                   <div class="col-md-12" style="text-align:right;">
                                                                                                            <button class="btn btn-warning " type="reset">Reset</button>
                                                                                                            <button class="btn btn-primary " type="submit" name="sub">Submit</button>
                                                                                                   </div>
                                                                                                  
                                                                                           </div>
                                                                                  </form>
                                                                 </span>
                                                    </div>
                                            </div>
                                        
                                    </div>
                                </div>
                                    
                                
                                <div class="navbar navbar-default navbar-fixed-bottom">
                                    <div class="container">
                                        <p class="navbar-text">Developed By 3CM-INFOTECH</p>
                                        <a href="..//www.3cmgroup.in" target="_blank" class=" pull-right navbar-btn btn-danger btn">3CM GROUP</a>
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
            if($abc==0)
                    {
                            echo '<script>alert("Not Valid User Name and Password");</script>';
                    }
            else{
                    
                            if($row=mysqli_fetch_array($result))
                                    {
                                            $_SESSION['ulog']=$row['id'];
                                            $_SESSION['user']=$row['user'];
                    
                                            $_SESSION['status']=$row['status'];
                                                echo '<script>alert("Welcome");
                                                                   window.location="index.php";
                                                      </script>';

                                    }
                    }
    }



?>