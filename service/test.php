<?php 
$server_name = "SG2NWPLS14SQL-v05.shr.prod.sin2.secureserver.net:1433";
$uid = "mehandru" ;
$pwd = "Mehandru@#123";
$db = "3cm-service" ;
$connection_info = array( "UID"=>$uid , "PWD"=>$pwd , "Database"=>$db) ; 
$conn = sqlsrv_connect($server_name , $connection_info);

if( $conn )  
{  
     echo "Connection established.\n";  
}  
else  
{  
     echo "Connection could not be established.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  

?>