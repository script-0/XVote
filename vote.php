<?php include('voteHead.php'); ?>
<?php include("sess.php") ?>

<body>
	<div id="wrapper">
		<?php include('side_bar.php'); ?>
	</div>
	<form method="POST" action="vote_result.php">
		<!-- President -->
		<?php
		$postes = array(
			'President',
			'Vice President for Internal Affairs',
			'Vice President for External Affairs',
			'Secretary',
			'Auditor',
			'Treasurer',
			'PIO',
			'Business Manager',
			'Sgt. @ Arms',
			'Muse',
			'Escort'
		);

		$postes_class = array('president', 'vpinternal', 'vpexternal', 'secretary', 'auditor', 'treasurer', 'pio', 'busman', 'sgtarm', 'muse', 'escort');

		$nb_postes = count($postes);

		for ($index = 0; $index < $nb_postes; $index++) {
			$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = '".$postes[$index]."'") or die(mysqli_errno());
			if ($query->num_rows > 0) {
		?>
				<div class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center><?php echo $postes_class[$index] ?></center>
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
												<div class="voteCheck fancyCheckbox">
													<span class="vote_text">Je vote </span><input type="checkbox" value="<?php echo $fetch['candidate_id'] ?>" name="<?php echo $postes_class[$index]."_id" ?>" class="<?php echo $postes_class[$index] ?>">
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
		$(".president").on("change", function() {
			if ($(".president:checked").length == 1) {
				$(".president").attr("disabled", "disabled");
				$(".president:checked").removeAttr("disabled");
			} else {
				$(".president").removeAttr("disabled");
			}
		});

		$(".vpinternal").on("change", function() {
			if ($(".vpinternal:checked").length == 1) {
				$(".vpinternal").attr("disabled", "disabled");
				$(".vpinternal:checked").removeAttr("disabled");
			} else {
				$(".vpinternal").removeAttr("disabled");
			}
		});

		$(".vpexternal").on("change", function() {
			if ($(".vpexternal:checked").length == 1) {
				$(".vpexternal").attr("disabled", "disabled");
				$(".vpexternal:checked").removeAttr("disabled");
			} else {
				$(".vpexternal").removeAttr("disabled");
			}
		});

		$(".secretary").on("change", function() {
			if ($(".secretary:checked").length == 1) {
				$(".secretary").attr("disabled", "disabled");
				$(".secretary:checked").removeAttr("disabled");
			} else {
				$(".secretary").removeAttr("disabled");
			}
		});

		$(".auditor").on("change", function() {
			if ($(".auditor:checked").length == 1) {
				$(".auditor").attr("disabled", "disabled");
				$(".auditor:checked").removeAttr("disabled");
			} else {
				$(".auditor").removeAttr("disabled");
			}
		});

		$(".treasurer").on("change", function() {
			if ($(".treasurer:checked").length == 1) {
				$(".treasurer").attr("disabled", "disabled");
				$(".treasurer:checked").removeAttr("disabled");
			} else {
				$(".treasurer").removeAttr("disabled");
			}

		});
		$(".pio").on("change", function() {
			if ($(".pio:checked").length == 1) {
				$(".pio").attr("disabled", "disabled");
				$(".pio:checked").removeAttr("disabled");
			} else {
				$(".pio").removeAttr("disabled");
			}
		});
		$(".busman").on("change", function() {
			if ($(".busman:checked").length == 1) {
				$(".busman").attr("disabled", "disabled");
				$(".busman:checked").removeAttr("disabled");
			} else {
				$(".busman").removeAttr("disabled");
			}
		});
		$(".sgtarm").on("change", function() {
			if ($(".sgtarm:checked").length == 1) {
				$(".sgtarm").attr("disabled", "disabled");
				$(".sgtarm:checked").removeAttr("disabled");
			} else {
				$(".sgtarm").removeAttr("disabled");
			}
		});
		$(".muse").on("change", function() {
			if ($(".muse:checked").length == 1) {
				$(".muse").attr("disabled", "disabled");
				$(".muse:checked").removeAttr("disabled");
			} else {
				$(".muse").removeAttr("disabled");
			}
		});
		$(".escort").on("change", function() {
			if ($(".escort:checked").length == 1) {
				$(".escort").attr("disabled", "disabled");
				$(".escort:checked").removeAttr("disabled");
			} else {
				$(".escort").removeAttr("disabled");
			}
		});
	});
</script>

</html>