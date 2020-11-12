<?php
	$conn = new mysqli('localhost', 'root', 'Shaquillo@25', 'voting');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>	