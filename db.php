<?php
	$servername = "localhost";
	$username = "booking";
	$password = "DcboXEAh93dCQZfD";
	$dbname = "booking";

	//Create connection
	$db = new mysqli($servername, $username, $password, $dbname);
	
	//Check connection
	if($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}
?>