<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<?php

$email = $_GET["_email"];
session_start();

$_SESSION["email"] = $email;

?>