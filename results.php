<?php
if (!isset($_GET['token'])  || $_GET['token'] != "CESAGI2022") {
	header("location:index.php");
}
include('voteHead.php');
require 'admin/dbcon.php';
session_start();
?>

<body>

	<script src="js/voteCard.js"></script>
	<?php include('side_bar_anonyme_user.php'); ?>
	<form method="POST" action="results.php?token=CESAGI2022" class="rootContainer">

		<div class="refreshDiv">
			<button class="refreshButton" type="submit" name="submit"><i class = "fa fa-refresh fa-large" ></i>  Refresh</button>
		</div>
		<?php
		$postes = $conn->query("SELECT `id`, `name` , `class_name` FROM `postes`") or die(mysqli_errno());
		$postes_class = array();
		while ($poste = $postes->fetch_array()) {
			$query = $conn->query("SELECT * FROM `candidate` WHERE `position` = '" . $poste['id'] . "'") or die(mysqli_errno());
			if ($query->num_rows > 0) {
				$queryVote = $conn->query("SELECT count(*) as total FROM `votes` WHERE `poste_class_name` = '" . $poste['class_name'] . "'") or die(mysqli_errno());
				$total = $queryVote->fetch_array();
		?>
				<div class="voteContainer">
					<!--<div class="panel panel-primary">-->
					<div class="posteTitle">
						<center><?php echo $poste['name'] . " ( " . $total['total'] . " Votes )"; ?></center>
					</div>
					<div class="rowCard">
						<?php
						while ($fetch = $query->fetch_array()) {
							$id = $fetch['candidate_id'];
							$queryVote = $conn->query("SELECT count(*) as nbVotes FROM `votes` WHERE  candidate_id = '$id'") or die(mysqli_errno());
							$nbVotes = $queryVote->fetch_array();
						?>
							<div class="columnCard">
								<div class="card">
									<img src="admin/<?php echo $fetch['img'] ?>">
									<div class="containerCard">
										<h2 class="nameCard"><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></h2>
										<p class="levelCard"><?php echo $fetch['year_level'] ?></p>
										<div class="reportBar">
											<span class="bar">
												<span class="value"></span>
											</span>

											<div class="skill-per" per="<?php echo ($total['total'] == 0) ? 0 : $nbVotes['nbVotes'] * 100 / $total['total']; ?>"></div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
		<?php
			}
		}
		?>
	</form>
</body>
<?php include('script.php') ?>
<script>
	$('.skill-per').each(function() {
		var $this = $(this);
		var value = ($(this).parent().children()[0]).childNodes[1];
		var per = $this.attr('per');
		$this.css("width", per + '%');
		$({
			animatedValue: 0
		}).animate({
			animatedValue: per
		}, {
			duration: 1000,
			step: function() {
				value.style.width = this.animatedValue + '%';
				$this.attr('per', Math.floor(this.animatedValue) + '%');
			},
			complete: function() {
				value.style.width = this.animatedValue + '%';
				$this.attr('per', Math.floor(this.animatedValue) + '%');
			}
		});
	});
</script>

</html>