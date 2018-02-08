<?php

$code = $_POST["code"];
$name = $_POST["name"];
$url = $_POST["url"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'php/connect.php');

$sql = "INSERT into airline Values('".$code."', '".$name."', '".$url."')";
$result = $db->query($sql);

header ('Location: ' . '/views/flight_providers.php');

?>