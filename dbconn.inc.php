<?php
function dbConnect(){
    //this dbconn file is for the mysql demo on the MAMP server
	$host = "localhost"; // this is typically just "localhost"
	$user = "id1360972_elliott"; // user name
	$pwd = "170592"; // database password
	$database = "id1360972_mysqldemo"; // database name

	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database) or die("could not connect to server");

	// return $conn to the fucntion call
	return $conn;}
?>
