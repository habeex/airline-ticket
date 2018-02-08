<?php

$path = $_SERVER['DOCUMENT_ROOT'] . "/";
include( $path . "views/partials/global.php" );

$firstname = $_POST["passenger-firstname"];
$lastname = $_POST["passenger-lastname"];
$self = $_POST["self"];
$email = $_SESSION["logged"];
$diet = $_POST["diet"];
$passport = $_POST["passenger-passport"];
$country = $_POST["passenger-country"];
$phone = $_POST["passenger-phone"];

require_once ($path . 'php/connect.php');

$sql = "INSERT into passenger Values('".$firstname."', '".$lastname."', '".$self."','".$email."', '".$phone."', '".$passport."', '".$country."', '".$diet."');";
$result = $db->query($sql);

header ('Location: ' . '/views/users/passengers.php');
?>