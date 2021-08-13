<?php
	$conn = new mysqli('db4free.net', 'cesa_user', 'cesa_password', 'cesa_vote');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>	