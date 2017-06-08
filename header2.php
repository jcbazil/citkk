<?php
session_start();
$sessid = session_id();

require("config.php");
include("fx.php");
$auth = auth();
$d=date("d/m/Y ");
$tm=date("H:i:s A ");
$conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
	
 $scek="select * from it_userlog where ulog_sessionid='$sessid'";
		$sres = $conn->query($scek);
		 while($row = $sres->fetch_assoc()) 
		{
		$user_id=$row['user_id'];
		}
	
		
	
	$cek="select * from vw_userStaff where uid='$user_id'";
		$resul = $conn->query($cek);
		 while($st = $resul->fetch_assoc()) 
	{
	$username	= $st['username'];
	$fname	= $st['fname'];
	$sid	= $st['uid'];
	$div_id	= $st['div_id'];
	$ulvl_id	= $st['userlevel'];
		}
	

?>

<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>CITKK</title>
		
		

		<link rel="stylesheet" type="text/css" href="css/tabb/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/tabb/tabstyles.css" />
  		<link href="css/table.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<section>
				<div class="tabs tabs-style-bar">
					<nav>
						<ul>
							<li><img src='images/client_s.png' title='Client' align='center'>
							<?php  //echo head($auth);  
							echo " Today is $d $tm";
							
							?> </li>
					
						</ul>
					</nav>
					
				</div><!-- /tabs -->
			</section>
		
	</body>
</html>
