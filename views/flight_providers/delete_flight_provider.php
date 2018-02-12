<?php

$code = $_POST["airline_code"];

$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'airline-ticket/php/connect.php');

$sql = "DELETE FROM airline WHERE airline_code = '".$code."';";
$result = $db->query($sql);

header ('Location: ' . '../flight_providers.php');

?>