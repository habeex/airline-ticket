<?php

// connect and set option
include '../partials/global.php';


require_once $path . 'airline-ticket/php/connect.php';


$flight_id = $_POST["flight_id"];
$departure = $_POST["departure"];
$arrival = $_POST["arrival"];
$departure_date = substr($_POST["departure_date"], 0, 10);
$departure_time = substr($_POST["departure_date"], 11);
$arrival_date = substr($_POST["arrival_date"], 0, 10);
$arrival_time = substr($_POST["arrival_date"], 11);
$passenger_limit = $_POST["passenger_limit"];
$status = $_POST["status"];
$status_changed_by = $_SESSION["logged"];
$price = $_POST["price"];
$airline_code = $_POST["airline_code"];

$sql = "INSERT INTO flight VALUES('".$flight_id."', '".$departure."', '".$arrival."', '".$departure_date."', '".$arrival_date."', '".$departure_time."', '".$arrival_time."', '".$passenger_limit."', '".$status."', '".
	$status_changed_by."', '".$price."', '".$airline_code."');";

$db->query($sql);

header('Location:' . "../flights.php" );
?>  
