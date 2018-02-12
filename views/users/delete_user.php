<?php

$email = $_POST["email"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'airline-ticket/php/connect.php');

$sql = "DELETE FROM website_user WHERE email = '".$email."';";
$result = $db->query($sql);

header ('Location: ' . '../users.php');

?>