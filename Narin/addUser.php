<?php

$email = $_GET["email"];
$password = $_GET["password"];
$authentication = $_GET["authentication"];
$admin = $_GET["admin"];

$servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'narinsd';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT into website_users Values('".$email."', '".$password."', '".$authentication."', '".$admin."')";
    $result = $conn->query($sql);

?>
