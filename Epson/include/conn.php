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
   
 $con=mysqli_connect("dbservice.db.10635043.hostedresource.com","dbservice","God!@#1234","3cm_service");
    if(!$con)
    {
        echo mysqli_error();
    }
    mysql_select_db("3cm_service");
   
?>
