<?php	include('voteHead.php');
		include('sess.php');
		include('./admin/dbcon.php');
?>

<body>
	<div id="row">
		<?php
		include('side_bar.php');
		$postes = $conn->query("SELECT `class_name` FROM `postes`") or die(mysqli_errno());
		if (isset($_POST['submit'])) {
			while ($poste = $postes->fetch_array()) {
				if (!isset($_POST[$poste['class_name'] . "_id"])) {
					$_SESSION[$poste['class_name'] . "_id"] = "";
				} else {
					$_SESSION[$poste['class_name'] . "_id"] = $_POST[$poste['class_name'] . "_id"];
				}
			}
		}
		?>
	</div>
	<center>
		<div class="col-lg-8" style="margin-left:240px;">
			<?php
			$flag = true;
			$postes = $conn->query("SELECT `name` , `class_name` FROM `postes`") or die(mysqli_errno());
			while ($poste = $postes->fetch_array()) {
			?>
				<div class="alert <?php $flag = !$flag; echo !$flag ? "alert-info" : "alert-success";?>">
					<label><?php echo $poste['name']; ?></label>
					<br />
					<?php
					if (!$_SESSION[$poste['class_name']."_id"]) {
					} else {
						$fetch = $conn->query("SELECT * FROM `candidate` WHERE `candidate_id` = " . $_SESSION[$poste["class_name"] . "_id"])->fetch_array();
						echo $fetch['firstname'] . " " . $fetch['lastname'] . " " . "<img src = 'admin/" . $fetch['img'] . "' style = 'height:80px; width:80px; border-radius:500px;' />";
					}
					?>
				</div>
			<?php
			}
			?>
				<br />
				<button style="margin-bottom:20px;" type="submit" data-toggle="modal" data-target="#result" class="btn btn-success">Submit Final Vote</button>
			</div>
	</center>
	<div class="modal fade" id="result" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">

					</h4>
				</div>


				<div class="modal-body">
					<p class="alert alert-danger">Are you sure you want to submit your Votes? </p>
				</div>

				<div class="modal-footer">
					<a href="submit_vote.php"><button type="submit" class="btn btn-success"><i class="icon-check"></i>&nbsp;Yes</button></a>
					<a href="vote.php"><button class="btn btn-danger" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Back</button></a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</body>
<?php include('script.php') ?>

</html>