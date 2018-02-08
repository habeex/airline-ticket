<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<?php

$pwd = $_GET["_pwd"];
session_start();

$_SESSION["pwd"] = $pwd;

?>