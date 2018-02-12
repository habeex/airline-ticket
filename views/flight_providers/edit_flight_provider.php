<?php

$code = $_POST["code"];
$name = $_POST["name"];
$url = $_POST["url"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'airline-ticket/php/connect.php');

$sql = "UPDATE airline SET name='".$name."', logo='".$url."' WHERE airline_code='".$code."';";
$result = $db->query($sql);

header ('Location: ' . '../flight_providers.php');

?>