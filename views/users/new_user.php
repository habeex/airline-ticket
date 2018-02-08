<?php

$email = $_POST["email"];
$password = $_POST["password"];
$authentication = 'token';
$admin = 0;

$path = $_SERVER['DOCUMENT_ROOT'] . "/";
include( $path . "views/partials/global.php" ); 

require_once ($path . 'php/connect.php');

$sql = "INSERT into website_user Values('".$email."', '".$password."', '".$authentication."', '".$admin."')";
$result = $db->query($sql);

if(!$result){
	$log = "notlog";
	///echo '<center><h3 style="color:red">User Already Exists</h3></center>';
	$_SESSION["valid"] = false;
	header('Location:' . '/views/users/create.php');
}else{
	$log = "log";
}

///header ('Location: ' . '/auth/login.php?ac=log&email=' . $email . '&password=' .$password); 
?>

<html>
	<form name='redirect' action='/auth/login.php' method='POST'>
		<input type='hidden' name='ac' value=<?php echo $log?>>
		<input type='hidden' name='email' value='<?php echo $email; ?>'>
		<input type='hidden' name='password' value='<?php echo $password; ?>'>
		<input type='submit' value='Proceed'>
	</form>

<script type='text/javascript'>
document.redirect.submit();
</script>
</html>