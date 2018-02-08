

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

    $sql = "DELETE from website_user where email = '".$email."'";
    $result = $conn->query($sql);
    




?>