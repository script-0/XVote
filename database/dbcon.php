<?php

	require_once '../environnements/db.php';
	
	$conn = new mysqli(DB_URL, DB_USER, DB_PASSWORD, DB_NAME);
	
	if(!$conn){
		die("Error: Failed to connect to database");
		echo "Error occured when connecting to database";
	}
?>	