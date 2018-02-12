<?php

// connect and set option
$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once $path . 'airline-ticket/php/connect.php';

$flight_id = $_POST["flight_id"];
$departure_date = $_POST["departure_date"];


$sql = "DELETE FROM flight WHERE flight_id = '".$flight_id."' AND departure_date = '".$departure_date."';";

$result = $db->query($sql);

header ('Location: '.'../flights.php');

?>  
