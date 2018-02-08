<?php 
// connect and set option
$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once $path.'php/connect.php';

$sql = 'SELECT email, password, is_admin FROM website_user';
$results = $db->query($sql);
 
if(!$results)
{
  die('Could not fetch data: ' . mysql_error());
}
while($row = mysqli_fetch_array($results))
{
	$USERS[$row[0]] = $row[1];
	$ADMIN[$row[0]] = $row[2];
}
  
function check_logged(){ 
	/// checks if a valid user has logged into the system, otherwise redirects to login page 
     global $_SESSION, $USERS; 
     if (!array_key_exists($_SESSION["logged"],$USERS)) { 
          header("Location: ".$path."auth/login.php"); 
     }; 
 }
function is_user(){
	/// returns true if a valid user has logged into the system, otherwise returns false
	global $_SESSION, $USERS; 
	return array_key_exists("logged",$_SESSION) && array_key_exists($_SESSION["logged"],$USERS);
}
function logout(){
	/// logs out of the system by un-setting the "logged" attribute of the $_SESSION array
	global $_SESSION, $USERS; 
	unset($_SESSION["logged"]);
	unset($_SESSION["admin"]);
	unset($_SESSION["valid"]);
}
?>