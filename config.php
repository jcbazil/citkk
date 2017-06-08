<?php

$DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'sa';
$DBPass   = 'root';
$DBName   = 'citkk';
$_SERVER['SERVER_NAME']='localhost'; 
$_SERVER['SERVER_NAME2']='195.168.1.2:8080';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

 
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}	
	
 


 
	
	


?>