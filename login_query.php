<?php
	require_once 'repositories/voter_repository.php';
	require_once 'environnements/dev.php';
	
	$voter_repo = new VoterRepository();
	
	if(isset($_POST['login'])){
		$idno = $_POST['idno'];
		$password = $_POST['password'];
		$result = $voter_repo->login($idno,$password);
		$numberOfRows = $result->num_rows;
		if($numberOfRows > 0){
			$row = $result->fetch_array();
			$isPasswordCorrect = password_verify($password,$row['password']);
			if(!$isPasswordCorrect){
				echo " <center>
						<br>
						<font color= 'red' size='3'>Bad Matricule / password </font>
						<br>
						Results Available <a href='results.php?token=CESAGI2022'> here </a>
				   </center>";
				die();
			}
			if($row['status'] =='Voted'){		
				echo " <br>
						<center>
							<font color= 'red' size='3'>You Can Only Vote Once</font>
							<br>
							Results Available <a href='" . RESULTS_LINK ."'> here </a>
						</center>";
				$isDisable = false;
			}
			else if( ! $row['account'] == 'Active'){
				echo " <center>
						<br>
						<font color= 'red' size='3'>Your account is still inactive</font>
						<br>
						Results Available <a href='" . RESULTS_LINK ."'> here </a>
				   </center>";
			}
			else{
				session_start();
				$_SESSION['voters_id'] = $row['voters_id'];
				header('location:vote.php');
			}
		}else{
			echo " <center>
						<br>
						<font color= 'red' size='3'>Bad Matricule / password </font>
						<br>
						Results Available <a href='" . RESULTS_LINK ."'> here </a>
				   </center>";
		}
	}
?>