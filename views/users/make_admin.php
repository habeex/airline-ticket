<?php

$email = $_POST["email"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'php/connect.php');

$sql = "UPDATE website_user SET is_admin = 1 WHERE email = '".$email."';";
$result = $db->query($sql);

header ('Location: ' . '/views/users.php');

?>