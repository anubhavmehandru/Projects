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

                                <div class="col-md-12">
                                                <div class="panel panel-default">
                                                        <h4 class="pull-center" style="margin-left:15px;">My Calls</h4>
                                                          <!--     
                                                        <div class="panel-footer search">
                                                               <table class="tool">
                                                                <tr>
                                                                    <th><span class="glyphicon"> Name </span></th>
                                                                    <th><input type="text" size="15" id="nm" style="font-size:12px;"></th>
                                                                    
                                                                    <th><span class="glyphicon"> Technology</span></th>
                                                                    <th><select id="tech" style="padding:2px;font-size:12px;">
                                                                            <option value="">All</option>
                                                                            <option>System Expert</option>
                                                                            <option>Network Expert</option>
                                                                            <option>A+</option>
                                                                            <option>N+</option>
                                                                            <option>MCITP</option>
                                                                            <option>CCNA</option>
                                                                            <option>Linux</option>
                                                                            <option>CCNP</option>
                                                                            <option>C</option>                                                                            
                                                                            <option>php</option>
                                                                            <option>.net</option>
                                                                            <option>Java</option>
                                                                            <option>Web Designing</option>
                                                                            <option>CCNP</option>
                                                                        </select></th>
                                                                    <th><span class="glyphicon"> Enquiry Type</span></th>
                                                                    <th><select id="entype" style="padding:2px;font-size:12px;">
                                                                            <option value="">All</option>
                                                                            <option value="Walking">Walk-in</option>
                                                                            <option value="By Phone">By Phone</option>
                                                                            
                                                                        </select>
                                                                    </th>
                                                                    <th><span class="glyphicon"> Status </span></th>
                                                                    <th><select id="status" style="padding:2px;font-size:12px;">
                                                                            <option value="all">All</option>
                                                                            <option value="0" selected="selected">Pending</option>
                                                                            <option value="2">Lost</option>
                                                                            
                                                                        </select>
                                                                    </th>
                                                                    
                                                                        <th>
                                                                            <input type="submit" value="Go" id="go" class="btn btn-info">
                                                                        </th>
                                                                </tr>
                                                            </table>
                                                        </div>-->
                                                        <div class="panel-body">
                                                                        
                                                        </div>
                                                        <div class="panel-footer">
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
           
            if(isset($_GET['d']))
            {
                    $sql="delete from enquiry where `id`='$_GET[d]'";
                    if(mysqli_query($con,$sql))
                    {
                        echo '<script>window.location="?";</script>';
                    }
            }
           
           
           
           
           
           
           
           ?>