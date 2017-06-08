<?php 
session_start();
$sessid = session_id();
session_regenerate_id(true); 
require("fx.php");

$flag = (isset($_GET['flag'])) ? $_GET['flag'] : null;
switch ( $flag ) {
		case "masuk":
			login($flag);
			break;
		case "logout":
			keluar();
			break;
		case "reg";	
			register();
			break;
		case "forgot";	
			forgot_password();
			break;
		default:
			login_form();
	}
	

function register()
{

	ini_set("SMTP","mail.chemsain.com");
	//ini_set("SMTP","localhost");
	
	// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
	ini_set("smtp_port","25");

	// Please specify the return address to use
//	ini_set('sendmail_from', 'jrosy_a@yahoo.com');


$username = $_POST['username'];
$fname = $_POST['fname'];
$email = $_POST['email'];


if(empty($username)){
		die("<br><h2><p align='center'>Please enter your username</p></h2>"
			."<br><p align='center'><a href=index.php>Back</a></p>");
	}
		
	if(empty($fname)){
		die("<br><h2><p align='center'>Please enter your name</p></h2>"
			."<br><p align='center'><a href=index.php>Back</a></p>");
	}
	if(empty($email)){
		die("<br><h2><p align='center'>Please enter your email</p></h2>"
			."<br><p align='center'><a href=index.php>Back</a></p>");
	}

	
//Let's check if this username is already in use

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
		
	echo	$user_check = "SELECT username from ws_users where username='$username'";
		$result_check = mysql_query($user_check) or die(mysql_error());
		$crow = mysql_fetch_row($result_check);
		if($crow > 0){
		die("<br><h2><p align='center'>Username is already in use!</p></h2>"
			."<br><p align='center'><a href=http://localhost/ieims/um/reg.php>Back</a></p>");
	}

	

$sql_reg = "INSERT INTO ws_users SET username='$username',fname='$fname',email='$email'";
mysql_query($sql_reg) or die(mysql_error());

echo $sql_sel="SELECT uid,email FROM ws_users ORDER BY uid DESC LIMIT 1;";
$res_sel = mysql_query($sql_sel);
$ss = mysql_fetch_array($res_sel);
$uid	= $ss['uid'];
$email	= $ss['email'];

echo $sql_staff = "INSERT INTO ws_staff SET staff='$fname',uid='$uid'";
mysql_query($sql_staff) or die(mysql_error());


	

	$subject = 'ID Request for E-Waste Registration'; 
	$message = "\n\nUsername: ".$username."\n\n Your application has been received and will be processed. Your 'Password' will be sent to you by email.\n\n Thank You. \n\n This is computer generated, no signature is required. "; 
	$headers = "From: rosie.agang@chemsain.com\r\nReply-To: rosie.agang@chemsain.com";
	$mail_sent = @mail( $email, $subject, $message, $headers);


	if($mail_sent)  {
	echo "Your mail was sent successfully"; 
	echo $email;
	} else  
	{
	echo "We encountered an error sending your mail";
	}	
		
//	header ("Location:index.php");

}	

function forgot_password()
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	
	
if(empty($username)){
		die("<br><h2><p align='center'>Please enter your username</p></h2>"
			."<br><p align='center'><a href=index.php>Back</a></p>");
	}
	if(empty($email)){
		die("<br><h2><p align='center'>Please enter your email</p></h2>"
			."<br><p align='center'><a href=index.php>Back</a></p>");
	}
	
	//Let's check if this username is already in use

	
mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());

	 $user_check = "SELECT count(uid) as exist from ws_users where username='$username' and email='$email'";
		$resultL = mysql_fetch_array(mysql_query($user_check));
		$exist = $resultL[exist];
		
		if($exist=='0'){
		die("<br><h2><p align='center'>Your Username and email does not match. Please contact the Administrator</p></h2>"
			."<br><p align='center'><a href=http:index.php>Back</a></p>");
		}
		else
		{
		
		echo $update_sql = "UPDATE ws_users SET password ='81dc9bdb52d04dc20036dbd8313ed055' where username ='$username' ";
		mysql_query($update_sql) or die(mysql_error());
		if(!$update_sql){
					die("<br><h3><p align='center'>Update failed !! Please contact the administrator.</p></h3>"
						."<br><p align='center'><a href=http:index.php>Back</a></p>");
				}
		}
	header ("Location:index.php");
}

	
function keluar() {
require("config.php");

$sessid	= $_GET['ses'];	
	//$sessid = session_id();
	$username=$_SESSION ['username'];
	$pw=$_SESSION ['password'];
	
	
	$userCk="select * from it_userlog where ulog_sessionid='$sessid'";
	$results = $conn->query($userCk);
	while($resU = $results->fetch_array()) {
   
	$sid	= $resU['ulog_sessionid'];
	}

	 $user_tab=$conn->query("UPDATE it_userlog SET ulog_outdt=now() where ulog_sessionid='$sid'");
	
	
	//session_unset(); 
	session_destroy(); 
	header ("Location:index.php");
} 


?>
<link rel="stylesheet" href="log.css" type="text/css"  />

<script language="JavaScript">
	(function( $ ) {
  // constants
  var SHOW_CLASS = 'show',
      HIDE_CLASS = 'hide',
      ACTIVE_CLASS = 'active';
  
  $( '.tabs' ).on( 'click', 'li a', function(e){
    e.preventDefault();
    var $tab = $( this ),
         href = $tab.attr( 'href' );
  
     $( '.active' ).removeClass( ACTIVE_CLASS );
     $tab.addClass( ACTIVE_CLASS );
  
     $( '.show' )
        .removeClass( SHOW_CLASS )
        .addClass( HIDE_CLASS )
        .hide();
    
      $(href)
        .removeClass( HIDE_CLASS )
        .addClass( SHOW_CLASS )
        .hide()
        .fadeIn( 550 );
  });
})( jQuery );

</script>
<title>CITKK</title>
<?php
//This function will display the login form
function login_form()
{

$ip=$_SERVER['REMOTE_ADDR'];

?>
<body >
			
			
                <form action='index.php?flag=masuk' method='post' id="login">
				
				<h1>Login CITKK</h1>
				<fieldset id="inputs">
					<input name="username" type="text" placeholder="Username" autofocus="" required="">   
					<input name="password" type="password" placeholder="Password" required="">
						<input type="text" value='<?php echo $ip;?>' name='ip' readonly />
				</fieldset>
				<fieldset id="actions">
					<input type="submit" id="submit" value="Log in">
					<a href="reg.php?flag=forgot">Forgot your password?</a><a href="reg.php">Register</a>
				</fieldset>
				</form>
			
         
		 
   
    <script class="cssdeck" src="js/jquery.min.js"></script>
</body>
		
		

<?php	   
}

//This function is to log user in
function login()
{
	
	$sessid = session_id();
	//include('dbconfig.php');

	//Collecting info
	$username = addslashes($_POST['username']);
	$password = md5($_POST['password']);

	
	//Open a new connection to the MySQL server
	$mysqli = new mysqli('localhost','sa','root','citkk');

	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	
	$got = $mysqli->query("SELECT count(uid) as got   from it_users where username='$username'")->fetch_object()->got; 
	//echo $got; //output value

	
	if($got==0 or $got=='')
	{
		exit("<br><h3><p align='center'>Your Username $username does not exist. Please contact the Administrator.<a href=http://".$_SERVER['SERVER_NAME']."/wims/index.php>Back</a></p></h3>");
	}
	else
	{
	
	$results = ("SELECT * FROM it_users where username='$username' and password='$password'");
	$result = $mysqli->query($results);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
{
		
		$uid=$row['uid'];
		$pwd=$row['password'];
		
       // echo " Name: " . $row["fname"]. " " . $row["password"]. "<br>";
       $tm=date("d/m/Y H:i:s"); // 20/10/2010 09:58:52
				//$tm=date('Y-M-D H:i:s'); 
				$ip=$_SERVER['REMOTE_ADDR']; // IP NAMEess if the register_global is off else use  $ip=@$REMOTE_NAME;
			
			
		$insert_row = $mysqli->query("INSERT INTO it_userlog SET user_id='$uid',ulog_sessionid='$sessid',ulog_date=now(),ulog_ip='$ip'");

		if($insert_row){
			//print 'Success! ID of last inserted record i's : ' .$mysqli->insert_id .'<br />'; 
				auth($_POST['username'], md5($_POST['password']),$_POST['ip']); 
				header("Location:main_index.php");
				//header("Location:$div_url");
		}else{
			die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
	 
    }
} else {
    exit("<br><h2><p align ='center'>Username or Password not found!Please ask administrator for registration.<a href=http://".$_SERVER['SERVER_NAME']."/citkk/index.php>Back</a></p></h2>");
}
	
		
	}
}

ob_flush();
?>