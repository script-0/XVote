<?php
	//To Deploy
	//$conn = new mysqli('db4free.net', 'cesa_user', 'cesa_password', 'cesa_vote');

	//Local
	$conn = new mysqli('127.0.0.1', 'root', 'password', 'cesa_vote');
	
	if(!$conn){
		die("Error: Failed to connect to database");
		echo "Error occured when connecting to database";
	}
?>	