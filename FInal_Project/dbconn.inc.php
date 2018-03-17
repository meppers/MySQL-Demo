<?php
function dbConnect(){
    //this dbconn file is for the mysql demo on the MAMP server
	$host = "localhost"; // this is typically just "localhost"
	$user = "root"; // user name
	$pwd = "root"; // database password
	$database = "MySQL_Demo"; // database name

	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database) or die("could not connect to server");

	// return $conn to the fucntion call
	return $conn;}
?>