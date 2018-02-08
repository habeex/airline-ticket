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

$sql = "SELECT * FROM passenger WHERE passport='".$passport."' AND user_email='".$email."' AND self='".$self."';";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);

if (empty($row)) {
	$sql = "INSERT into passenger Values('".$firstname."', '".$lastname."', '".$self."','".$email."', '".$phone."', '".$passport."', '".$country."', '".$diet."');";

	$result = $db->query($sql);
} else {
	$sql = "UPDATE passenger SET first_name='".$firstname."', last_name='".$lastname."',  phone='".$phone."', country='".$country."', diet='".$diet."') WHERE passport='".$passport."' AND user_email='".$email."' AND self='".$self."';";

	$result = $db->query($sql);
}

header ('Location: ' . '/views/users/profile.php');
?>