<?php
require '../database/dbcon.php';
if (!$bool) {
?>
	<div class="modal fade" id="edit_candidate<?php echo $candidate_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<center>Edit Candidate</center>
							</div>
						</div>
					</h4>
				</div>

				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
						<input type="hidden" name="candidate_id" value="<?php echo $row['candidate_id'] ?>">
						<div class="form-group">
							<label>Position</label>
							<select class="form-control" name="position">
								<option><?php echo $poste_name; ?></option>
								<?php
								$postes = $conn->query("SELECT name FROM postes") or die(mysqli_errno());
								while ($poste = $postes->fetch_array()) {
								?>
									<option><?php echo $poste['name'] ?></option>
								<?php
								}
								?>
							</select>

						</div>

						<div class="form-group">
							<label>Firstname</label>
							<input class="form-control" type="text" name="firstname" required="true" value="<?php echo $row['firstname'] ?>">
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input class="form-control" type="text" name="lastname" value="<?php echo $row['lastname'] ?>" required="true">
						</div>

						<div class="form-group">
							<label>Year_Level</label>
							<select class="form-control" name="year_level" required="true">
								<option><?php echo $row['year_level'] ?></option>
								<option></option>
								<option>1st Year</option>
								<option>2nd Year</option>
								<option>3rd Year</option>
								<option>4th Year</option>
							</select>
						</div>

						<div class="form-group">
							<label>Gender</label>
							<select class="form-control" name="gender">
								<option><?php echo $row['gender'] ?></option>
								<option></option>
								<option>Homme</option>
								<option>Femme</option>
							</select>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image">
						</div>
						<button name="update" type="submit" class="btn btn-primary">Save Data</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>
	<!-- /.modal-content -->

	<?php
	if (isset($_POST['update'])) {
		$bool = true;
		$position = $_POST['position'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$year_level = $_POST['year_level'];
		$gender = $_POST['gender'];
		$candidate_id = $_POST['candidate_id'];
		$poste = $conn->query("SELECT id FROM postes WHERE name = '$position'")->fetch_array() or die(mysql_error());
		$poste_id = $poste['id'];

		if (!empty($_FILES['image']['name'])) {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
			$location = "upload/" . $_FILES["image"]["name"];
			$conn->query("UPDATE candidate SET position = '$poste_id', firstname = '$firstname', lastname = '$lastname', year_level = '$year_level', gender = '$gender',img='$location' WHERE candidate_id = '$candidate_id'") or die(mysql_error());
		} else {
			$conn->query("UPDATE candidate SET position = '$poste_id', firstname = '$firstname', lastname = '$lastname', year_level = '$year_level', gender = '$gender' WHERE candidate_id = '$candidate_id'") or die(mysql_error());
		}
		echo "<script> window.location='candidate.php' </script>";
	}
	?>

<?php
}
?>