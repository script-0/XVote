<?php
	include("database/dbcon.php");
	session_start();
	$postes = $conn->query("SELECT `id` , `class_name` FROM `postes`") or die(mysqli_errno());
	$posteID; //Don't delete
	if(!isset($_SESSION['voters_id'])){
		header("location:index.php");
	}
	while ($poste = $postes->fetch_array()){
		$posteClassName = $poste['class_name'];
		
		if( isset( $_SESSION[ $posteClassName . "_id"] ) && $_SESSION[ $posteClassName. "_id"] !=""){
			
			$posteID = $_SESSION[ $posteClassName. "_id"];
			$conn->query("INSERT INTO `votes` (`candidate_id` , `voters_id` , `poste_id`) VALUES( '$posteID', '$_SESSION[voters_id]','$poste[id]')") ;//or die(mysql_error());
		}else{
			$conn->query("INSERT INTO `votes` (`candidate_id` , `voters_id` , `poste_id`) VALUES( 0, '$_SESSION[voters_id]','$poste[id]')") ; //or die(mysql_error());
		}
	}
	$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
	session_destroy();
	header("location:results.php?token=CESAGI2022");	
?> 