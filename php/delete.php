<?php

require_once 'connect.php'; 

// prepare
$sql = "DROP table passenger;";

$db->query($sql);


$sql = "DROP table booking;";

$db->query($sql);

$sql = "DROP table flight;";

$db->query($sql);


$sql = "DROP table airline;";

$db->query($sql);


$sql = "DROP table website_user;";

$db->query($sql);



?>
