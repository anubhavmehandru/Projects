  <script type="text/javascript" src="js/addajax.js"></script>
    
<?php
        $limit=1;
       
        
        if(isset($_GET['p']))
        {
            $start=$_GET['p']*$limit;
        }
        else{
                $start=0;
        }
        ?>					

                                <div class="col-md-12" style="margin-top:-15px;">
                                                <div class="panel panel-default">
												        <h4 class="pull-center" style="margin:0px;padding:2px;height:35px;">DASHBOARD</h4>
														
                                                        <div class="panel-body" style="padding:0px 2px;margin:0px;">
														</div>
                                                        <div class="panel-footer panel-foot" style="padding:0px;">
                                                            <table class="tool pull-right" >
                                                                <tr>
                                                                        <th>
                                                                            <span class="glyphicon"> 
                                                                                        <span id="first" style="cursor: pointer;">   First   </span> | 
                                                                                        <span id="Prev" style="cursor: pointer;">    Prev    </span>| 
                                                                                        <span id="next" style="cursor: pointer;">    Next    </span> | 
                                                                                        <span id="last" style="cursor: pointer;">    Last    </span>
                                                                            </span>
                                                                        </th>
                                                                </tr>
                                                            </table>
                                                            <br/><br/>
                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        
      <!-------------------------Start Add Enquiry -------------->                                          
                                        
                   <?php
                        if(isset($_GET['callid']))
						{
						    $sql1="delete from `call` where id=".$_GET['callid'];
							if(mysqli_query($con,$sql1))
							{
								echo "<script>window.location='index.php?page=main';</script>";
							}				
						}
                 ?>
                                        
                                        
                                        
        