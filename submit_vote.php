<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
		$postes = $conn->query("SELECT `class_name` FROM `postes`") or die(mysqli_errno());
		$tmp;
		while ($poste = $postes->fetch_array()) {			
			$posteClassName = $poste['class_name'];
			if( isset( $_SESSION[ $posteClassName . "_id"] ) && $_SESSION[ $posteClassName. "_id"] !=""){
				$tmp = $_SESSION[ $posteClassName. "_id"];
				$conn->query("INSERT INTO `votes` VALUES('', '$tmp', '$_SESSION[voters_id]','$posteClassName')") or die(mysql_error());
			}else{
				$conn->query("INSERT INTO `votes` VALUES('', -1, '$_SESSION[voters_id]','$posteClassName')") or die(mysql_error());
			}
		}
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		header("location:results.php?token=CESAGI2022");	
?> 