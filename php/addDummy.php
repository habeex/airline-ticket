<?php

// connect and set option
$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once $path.'php/connect.php';
$sql = "INSERT INTO website_user VALUES ('anand@something.com', 'password', 'token', '1')";
$db->query($sql);

// insert dummy airline
$sql = "INSERT INTO airline VALUES ('9W', 'Jet Airways', 'some logo')";
$db->query($sql);

$sql = "ALTER SESSION SET nls_date_format='yyyy-mm-dd'";
$db->query($sql);

// insert dummy flight
$sql = "INSERT INTO flight VALUES ('9W343', 'Mumbai', 'Singapore', '2015-05-10', '2015-06-10', '200', 'ON TIME', 'anand@something.com', '400', '9W')";
$db->query($sql);
?>