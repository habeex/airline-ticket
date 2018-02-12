<?php
$path = $_SERVER['DOCUMENT_ROOT'] . "/";
session_start();
/// to logout of the current session
include($path."airline-ticket/auth/passwords.php"); 
logout();
/// redirect to readblogs.php
header('Location:'.'/index.php'); 
?>