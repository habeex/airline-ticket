<?php

$email = $_POST["email"];
include '../partials/global.php';

require_once ($path . 'airline-ticket/php/connect.php');

$sql = "UPDATE website_user SET is_admin = 0 WHERE email = '".$email."';";
$result = $db->query($sql);

if($email == $_SESSION["logged"]){
	header ('Location: ' . '/auth/logout.php');
}else{
	header ('Location: ' . '/views/users.php');
}
?>