<?php

$email = $_GET["_email"];


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

    $sql = "UPDATE website_user SET is_admin = '1' WHERE email='".$email."'";
    $result = $conn->query($sql);

?>