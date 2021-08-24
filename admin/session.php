<?php
	require '../database/dbcon.php';
	session_start(); 
	$session_id = "";
	$user_query;
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { 
		header("location:index.php");
	}
	$session_id=$_SESSION['id'];
	$user_query = $conn->query("SELECT * FROM user WHERE user_id = '$session_id'") or die(mysqli_errno());
	$user_row = $user_query->fetch_array();
	$user_username = $user_row['firstname']." ".$user_row['lastname'];
?>