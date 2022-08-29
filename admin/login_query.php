<?php
	require_once '../database/dbcon.php';
	
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query = $conn->query("SELECT * FROM user WHERE username ='$username'") or die(mysqli_error($conn));
		$rows = $query->num_rows;
		$fetch = $query->fetch_array();		
		$isPasswordCorrect = password_verify($password,$fetch['password']);								
			if ($rows == 0){
				echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</font></center>";
			}else if ($rows > 0){
				if(!$isPasswordCorrect){	
					echo " <br><center><font color= 'red' size='3'>Your password or username seems wrong.</font></center>";
					die();
				}
				session_start();
				$_SESSION['id'] = $fetch['user_id'];
				header("location:candidate.php");
			}
	}
?>