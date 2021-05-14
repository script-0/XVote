<?php
	require_once 'admin/dbcon.php';
	
	if(isset($_POST['login'])){
		$idno=$_POST['idno'];
		$password=$_POST['password'];
		$isDisable = true;
		$result = $conn->query("SELECT voters_id, status FROM voters WHERE id_number = '$idno' && password = '$password'") or die(mysqli_errno());
		$numberOfRows = $result->num_rows;
		if($numberOfRows > 0){
			$row = $result->fetch_array();
			if($row['status'] =='Voted'){		
				echo " <br>
						<center>
							<font color= 'red' size='3'>You Can Only Vote Once</font>
							<br>
							Results Available <a href='results.php?token=CESAGI2022'> here </a>
						</center>";
				$isDisable = false;
			}
			session_start();
			$_SESSION['voters_id'] = $row['voters_id'];
			header('location:vote.php');
		}
		
		if($isDisable){
			echo " <center>
						<br>
						<font color= 'red' size='3'>Your account is still disabled</font>
						<br>
						Results Available <a href='results.php?token=CESAGI2022'> here </a>
				   </center>";
		}
	
	}
?>