<?php

$email = $_POST["email"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";
include( $path . "views/partials/global.php" );

require_once ($path . 'php/connect.php');

$sql = "UPDATE website_user SET is_admin = 0 WHERE email = '".$email."';";
$result = $db->query($sql);

if($email == $_SESSION["logged"]){
	header ('Location: ' . '/auth/logout.php');
}else{
	header ('Location: ' . '/views/users.php');
}
?>