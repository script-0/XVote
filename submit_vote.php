<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
		$postes = $conn->query("SELECT `class_name` FROM `postes`") or die(mysqli_errno());
		$tmp;
		while ($poste = $postes->fetch_array()) {
			if( isset( $_SESSION[ $poste["class_name"] . "_id"] ) && $_SESSION[ $poste["class_name"] . "_id"] !=""){
				$tmp = $_SESSION[ $poste['class_name'] . "_id"];
				$conn->query("INSERT INTO `votes` VALUES('', '$tmp', '$_SESSION[voters_id]')") or die(mysql_error());
			}
		}
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysql_error());
		header("location:./admin/canvassing.php?voters_id=".$_SESSION['voters_id']."&token=CESAGI2022");	
?> 