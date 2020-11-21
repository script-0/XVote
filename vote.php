<?php include('voteHead.php'); ?>
<?php include("sess.php") ?>

<body>

	<script src="js/voteCard.js"></script>
	<div id="wrapper">
		<?php include('side_bar.php'); ?>
	</div>
	<form method="POST" action="vote_result.php">
		<!-- President -->
		<?php
		$postes = $conn->query("SELECT `name` , `class_name` FROM `postes`") or die(mysqli_errno());
		while($poste = $postes->fetch_array()){
			$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = '" . $poste['name'] . "'") or die(mysqli_errno());
			if ($query->num_rows > 0) {
		?>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center><?php echo $poste['name'] ?></center>
						</div>
						<div class="panel-body">
							<div class="rowCard">
								<?php
								while ($fetch = $query->fetch_array()) {
								?>
									<div class="columnCard">
										<div class="card">
											<img src="admin/<?php echo $fetch['img'] ?>">
											<div class="containerCard">
												<h2><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></h2>
												<p class="titleCard"><?php echo $fetch['year_level'] ?></p>
												<div class="voteCheck fancyCheckbox" onclick="voteClicked(this)">
													<span class="vote_text">Je vote </span><input onclick="(function(e) {e.stopPropagation();})(event)" type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="<?php echo $poste['class_name'] . "_id" ?>" class="<?php echo $poste['class_name'] ?>">
												</div>
											</div>
										</div>
									</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
		<?php
			}
		}
		?>
		<center><button class="btn btn-success ballot" type="submit" name="submit">Submit Ballot</button></center>
	</form>
</body>
<?php include('script.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		<?php
		for ($index = 0; $index < $nb_postes; $index++) {
		?>
			$(".<?php echo $postes_class[$index] ?>").on("change", function() {
				if($(".<?php echo $postes_class[$index] ?>:checked").length == 1) {
					$(".<?php echo $postes_class[$index] ?>").attr("disabled", "disabled");
					$(".<?php echo $postes_class[$index] ?>:checked").removeAttr("disabled");
				} else {
					$(".<?php echo $postes_class[$index] ?>").removeAttr("disabled");
				}
			});
		<?php
		}
		?>
	});
</script>

</html>