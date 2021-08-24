<?php
	include("database/dbcon.php");
	session_start();
	$postes = $conn->query("SELECT `class_name` FROM `postes`") or die(mysqli_errno());
	$posteID; //Don't delete
	if(!isset($_SESSION['voters_id'])){
		header("location:index.php");
	}
	echo '<script> console.log("Voter ID : '.$_SESSION['voters_id'].'");</script>'; 
	while ($poste = $postes->fetch_array()){
		$posteClassName = $poste['class_name'];
		echo '<script> console.log("PosteClass : '.$posteClassName.'");</script>';
		if( isset( $_SESSION[ $posteClassName . "_id"] ) && $_SESSION[ $posteClassName. "_id"] !=""){
			echo '<script> console.log("Poste Session : '.$_SESSION[ $posteClassName . "_id"].'");</script>';
			$posteID = $_SESSION[ $posteClassName. "_id"];
			$conn->query("INSERT INTO `votes` (`candidate_id` , `voters_id` , `poste_class_name`) VALUES( '$posteID', '$_SESSION[voters_id]','$posteClassName')") or die(mysql_error());
		}else{
			$conn->query("INSERT INTO `votes` (`candidate_id` , `voters_id` , `poste_class_name`) VALUES( 0, '$_SESSION[voters_id]','$posteClassName')") or die(mysql_error());
		}
	}
	$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
	session_destroy();
	header("location:results.php?token=CESAGI2022");	
?> 