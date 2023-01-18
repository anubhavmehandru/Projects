<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 /*
 $con=mysql_connect("localhost","root","");
    if(!$con)
    {
        echo mysql_error();
    }
    mysql_select_db("3cm_service");
   */
   //online 
   /*
 $con=mysql_connect("dbservice.db.10635043.hostedresource.com","dbservice","God!@#1234");
					 
    if(!$con)
    {
        echo mysql_error();
    }
    mysql_select_db("dbservice");
   */
   
   /*
 $con=mysql_connect("newdbservice.db.10635043.hostedresource.com","newdbservice","God!@#1234");
					 
    if(!$con)
    {
        echo mysql_error();
    }
    mysql_select_db("newdbservice");
*/
$con=mysqli_connect("sg2nlmysql59plsk.secureserver.net:3306","mehandru","Mehandru@#123","service-ldh");
					 
if(!$con)
{
    echo mysqli_error($con);
}

    

	
	?>
