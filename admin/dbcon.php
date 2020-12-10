<?php
	$conn = new mysqli('localhost', 'root', '', 'cesa_voting');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
	$conn->set_charset("utf8");
?>	