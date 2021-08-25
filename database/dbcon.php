<?php
	
	$conn = new mysqli('remotemysql.com', 'Chu2uV1pit', 'JPWCBdTMWd', 'Chu2uV1pit');

	//Local
	//$conn = new mysqli('127.0.0.1', 'root', 'password', 'cesa_vote');
	
	if(!$conn){
		die("Error: Failed to connect to database");
		echo "Error occured when connecting to database";
	}
?>	