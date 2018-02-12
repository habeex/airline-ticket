<?php

$code = $_POST["code"];
$name = $_POST["name"];
$url = $_POST["url"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'airline-ticket/php/connect.php');

$sql = "INSERT into airline Values('".$code."', '".$name."', '".$url."')";
$result = $db->query($sql);

header ('Location: ' . '../flight_providers.php');

?>