<?php


require("header2.php");


?>

<!DOCTYPE html>
<html>

<body>
<head>
	
	<title>CIT </title>
<link rel="stylesheet" type="text/css" href="css/effect.css">
<link rel="stylesheet" type="text/css" href="css/default.css">
		<link rel="stylesheet" type="text/css" href="css/tabb/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/tabb/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/tabb/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/tabb/tabstyles.css" />
  
</head>

	
	 
    	
<div class="box effect7">
<?php 
//echo $group_no;
//echo $div_no;

if ($div_id ==1)//cit
	{

		?>
		
			<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk3/main.php?sess=$sessid'><img src='images/citkk.png' height='80' width='80' title='CITKK'></a>"; ?>
		 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/eoffice/emonster/main.php?uname=$username'><img src='images/emonster.png' height='80' width='80' title='E-Monster'></a>"; ?>
		 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo "<a href='http://".$_SERVER['SERVER_NAME2']."/echemsain/main_index.php?sess=$sessid''><img src='images/emaps.png' height='80' width='80' title='E-Maps'></a>"; ?>
		 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/index.php?flag=logout&ses=$sessid'><img src='images/locked.png' height='80' width='80' title='Logout'></a>"; ?>
		
<?php 
	}
	
	else if ($div_id ==2)//mo4
	{
	
?>
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/main.php?sess=$sessid'><img src='images/folder.png' height='60' width='60'title='CITKK'></a>"; ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/eoffice/emonster/main.php?sess=$sessid''><img src='images/emonster.png' height='60' width='60' title='E-Monster'></a>"; ?>
 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/index.php?flag=logout&ses=$sessid'><img src='images/logout.png'height='60' width='60' title='Logout'></a>"; ?>
<?php	
	}
		
	else if ($div_id ==3)//ev4
	{
	
?>
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/main.php?sess=$sessid'><img src='images/folder.png' height='60' width='60'title='CITKK'></a>"; ?>
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <?php echo "<a href='http://".$_SERVER['SERVER_NAME2']."/echemsain/main_index.php?uname=$username''><img src='images/dss.png' height='70' width='70' title='E-Maps'></a>"; ?>
 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/index.php?flag=logout&ses=$sessid'><img src='images/logout.png' height='60' width='60' title='Logout' title='Logout'></a>"; ?>
<?php	
	} 
else //all the other div
	{
	
?>
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/main.php?sess=$sessid'><img src='images/citkk.png' height='60' width='60'title='CITKK'></a>"; ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo "<a href='http://".$_SERVER['SERVER_NAME']."/citkk/index.php?flag=logout&ses=$sessid'><img src='images/locked.png' eight='60' width='60' title='Logout'></a>"; ?>
<?php	
	} 
?>
</div>
</body>



