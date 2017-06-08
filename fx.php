<?php

function auth($login = '', $passwd = '',$ip = '') 
{
	//$sessid = session_id();
	//$login 		= $_GET['username'];
	$auth     = 0;
	$register = false;
	$authdata = null;
	
	if (isset($_SESSION['authdata'])) {
		$authdata = $_SESSION['authdata'];
	}
	
	# return false if login neither passed to func, nor in session / tida berjaya
	if (empty($login) && empty($authdata['login'])) {
		return 0;
	}

	# get login passed to function
	if (!empty($login)) {
		$username = $login;
		$pw       = $passwd;
		$ip       = $ip;

		$register = true;
	} else { 
		$username = $authdata['login'];
		$pw       = $authdata['password'];
	}
	
	include ('config.php');
	$conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
	
$ver = ("SELECT * FROM it_users where username='$username'");
	$xx = $conn->query($ver);

	$xx->data_seek(0);
	while($row = $xx->fetch_assoc())
	{

		if ( $pw == $row["password"] ) 
		{
	
		$auth = $row['userlevel'];

			if ($register) 
			{
	
			$_SESSION['authdata'] = array
			(
				'login'     => $row['username'], 
				'password'  => $row['password'], 
				'userlevel' => $row['userlevel'], 
				'uid'       => $row['uid'],
				
			);
		
	
			echo $checkAuth=("select * from vw_userStaff where username='$username' and password='$pw'");
			$resAuth = $conn->query($checkAuth);
			$resAuth->data_seek(0);
			while($st = $resAuth->fetch_assoc()) 
			{
				$uid	= $st['uid'];
				$staff_id	= $st['staff_id'];
						
			}
			$tm=date("d/m/Y H:i:s A");
			}	
		} else {
			# if passwords didn't match, delete authdata session data 
						
			unset($_SESSION['authdata']);
		}
		
	}	
		
		
	
	return $auth;
	//return $sid;
	
	
   
}
function head($auth) 
{
	$sessid = session_id();
		

	if ( $auth!=0) {
		if (isset($_SESSION['authdata'])) {
		$authdata = $_SESSION['authdata'];
	}
	
	# return false if login neither passed to func, nor in session
	if (empty($login) && empty($authdata['login'])) {
		return 0;
	}

	# get login passed to function
	if (!empty($login)) {
		$username = $login;
		$pw       = $passwd;
		$ip       = $ip;

		$register = true;
	} else {
		$username = $authdata['login'];
		$pw       = $authdata['password'];
		
	echo "Welcome $username ";
	
	}
	} else {
		echo "You are not authorized , please Login";  // get redirection to login 18/3/16
		
		  header('Location: http://'.$_SERVER['SERVER_NAME'].'/wimsv2');
		
	}
	echo " </span>";
}



# ###################################################################

function footprint($auth) 
{
	global $lang;

	?>

<table align='center' class='ok'>
	<tr background='#ffffff' >
		<td class='center'>Developed by Chemsain IT Sdn Bhd</td>
	</tr>
</table>

<?php
	
	
	
}

function admin (){

if ($lvl_id=='17'){

$actionView="<a href='javascript:edit_id=$uid;'><img src='images/edit.png'> 
&nbsp;&nbsp;&nbsp;&nbsp; <a href='javascript:del_id=$uid;'>Delete</a>";

} else {
$actionView='-';
}


}

?>