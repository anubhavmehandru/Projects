<?php include 'include/header.php';?>
 <!-----------------Start Container & end Footer-------------------------------->                                       
                                        
    <?php
            
            if(!isset($_GET['page']))
            {
                    
                    if($_SESSION['status']=="Front Desk")
					{
						include 'enquiry.php';
					}
                    else if($_SESSION['status']=="Coordinator")
					{
						include 'main.php';
					}
					else if($_SESSION['status']=="Stock Manager")
					{
						include 'spare.php';
					}
					else
					{
						include 'main.php';
					}
            }
            else{
                $a=$_GET['page'];
                include $a.'.php';
            }
    
    
    
    
    
    ?>
                                        
                                        
  <!---Start Footer--------------------------------------------------------> 
  <?php include 'include/footer.php';?>