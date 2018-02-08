<?php // config.php basically contains these 4 constants
// define("db_host", "localhost");
// define("db_uid", "root"); // change this to yours
// define("db_pwd", ""); // change this to yours (I won't show mine)
// define("db_name", "cs2102"); // this is the one that we created earlier in this lecture


define("db_host", "127.0.0.1");
define("db_uid", "root"); // change this to yours
define("db_pwd", ""); // change this to yours (I won't show mine)
define("db_name", "cs2102"); // this is the one that we created earlier in this lecture



$db = new mysqli(db_host, db_uid, db_pwd, db_name);
if ($db->connect_errno) { // are we connected properly?
	$conn = new mysqli(db_host, db_uid, db_pwd);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	

	$sql = "CREATE DATABASE cs2102";

	
	if ($conn->query($sql) === TRUE) {
	    echo "Database created successfully";
	} else {
	    echo "Error creating database: " . $conn->error;
	}
}



?>