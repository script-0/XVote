<?php
	require_once 'admin/dbcon.php';
	
	if(isset($_POST['login'])){
		$idno=$_POST['idno'];
		$password=$_POST['password'];
	
		$result = $conn->query("SELECT voters_id, status FROM voters WHERE id_number = '$idno' && password = '$password'") or die(mysqli_errno());
		$numberOfRows = $result->num_rows;
		if($numberOfRows > 0){
			$row = $result->fetch_array();
			if($row['status'] =='Voted'){				
				echo " <br>
						<center>
							<font color= 'red' size='3'>You Can Only Vote Once</font>
							<br>
							You will redirect to <a href=
						</center>";
			}
			session_start();
			$_SESSION['voters_id'] = $row['voters_id'];
			header('location:vote.php');
		}
		
		if($voted == 1){
			echo " <br><center><font color= 'red' size='3'>You Can Only Vote Once</center></font>";
		}else{
			echo " <br><center><font color= 'red' size='3'>Your account is still disabled</center></font>";
		}
	
	}
?>