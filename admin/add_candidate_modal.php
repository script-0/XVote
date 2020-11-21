<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<center>Add Candidate</center>
						</div>
					</div>
				</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Position</label>
						<select class="form-control" name="position">
							<option></option>
							<?php
								require_once 'dbcon.php';
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
						<label>Prénom</label>
						<input class="form-control" type="text" name="firstname" placeholder="Entrez votre prénom" required="true">
					</div>
					<div class="form-group">
						<label>Nom</label>
						<input class="form-control" type="text" name="lastname" placeholder="Entrez votre nom" required="true">
					</div>

					<div class="form-group">
						<label>Niveau</label>
						<select class="form-control" name="year_level">
							<option></option>
							<option>1st Year</option>
							<option>2nd Year</option>
							<option>3rd Year</option>
							<option>4th Year</option>
							<option>5th Year</option>
						</select>
					</div>

					<div class="form-group">
						<label>Genre</label>
						<select class="form-control" name="gender">
							<option></option>
							<option>Homme</option>
							<option>Femme</option>
						</select>
					</div>


					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" required>
					</div>
					<button name="save" type="submit" class="btn btn-primary">Enregistrez</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
			</div>




			<?php
			require_once 'dbcon.php';

			if (isset($_POST['save'])) {
				$position = $_POST['position'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$year_level = $_POST['year_level'];
				$gender = $_POST['gender'];
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				$image_name = addslashes($_FILES['image']['name']);
				$image_size = getimagesize($_FILES['image']['tmp_name']);

				move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
				$location = "upload/" . $_FILES["image"]["name"];


				$conn->query("INSERT INTO candidate(position,firstname,lastname,year_level,gender,img)values('$position','$firstname','$lastname','$year_level','$gender','$location')") or die(mysql_error());
			}
			?>
		</div>

		<!-- /.modal-content -->

	</div>

	<!-- /.modal-dialog -->

</div>