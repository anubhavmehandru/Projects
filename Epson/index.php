<?php include 'include/header.php';?>
 <!-----------------Start Container & end Footer-------------------------------->                                       
                                        
    <?php
            
            if(!isset($_GET['page']))
            {
                    
                     
                    include 'main.php';
                
            }
            else{
                $a=$_GET['page'];
                include $a.'.php';
            }
    
    
    
    
    
    ?>
                                        
                                        
  <!---Start Footer--------------------------------------------------------> 
  <?php include 'include/footer.php';?>