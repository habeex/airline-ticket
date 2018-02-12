<?php

// connect and set option
$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path.'airline-ticket/php/connect.php');

$passport = $_POST["passport"];
$email = $_POST["email"];
$self = $_POST["self"];

$sql = "DELETE FROM passenger WHERE passport = '".$passport."' AND user_email = '".$email."' AND self = '".$self."';";

$result = $db->query($sql);

header ('Location: '.'/views/users/passengers.php');

?>  