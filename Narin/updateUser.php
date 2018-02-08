<?php
session_start();
$email =  $_SESSION['email'];
$pwd =  $_SESSION['pwd'];

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

    $sql = "UPDATE website_user SET password = '".$pwd."' WHERE email='".$email."'";
      

    $result = $conn->query($sql);
    




?>
<label>Successfully changed password</label>

