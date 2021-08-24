
<?php include ('head.php');?>
<body>
<?php
	function passFunc($len, $set = "")
		{
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
		} 
		
?>
    <div id="wrapper">

       <?php include ('side_bar.php');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h3 class="page-header">Registration</h3>
                </div>
				<div class = "col-lg-5">
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Detail Needed Below
                        </div>
                        <div class="panel-body" >
                         <form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>Matricule</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true">
													
											</div>
											
											<div class="form-group">
											<?php 
													$change =  passFunc(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
											?>	
												<label>Mot de Passe</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true" placeholder="Password"/>
													<input type = "button" value = "Generate" onclick = "document.getElementById('pass').value = '<?php echo $change?>'">
											</div>
											
											<div class="form-group">
												<label>Prénom</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="First name" required="true">
											</div>
											<div class="form-group">
												<label>Nom</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Last name" required="true">
											</div>
											
											<div class="form-group">
												<label>Niveau</label>
													<select class = "form-control" name = "year_level">
														<option></option>
														<option>1st Year</option>
														<option>2nd Year</option>
														<option>3rd Year</option>
														<option>4th Year</option>
														<option>5th Year</option>														
													</select>
											</div>
																	
											 	 <button name = "save" type="submit" class="btn btn-primary">Save Data</button>
												 
						  				 </div>
                                       
										
										</form>
								
							<?php 
								require '../database/dbcon.php';
								
								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$id_number=$_POST['id_number'];
									$year_level=$_POST['year_level'];
									$password = $_POST['password'];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysqli_errno());
									$count = $query->fetch_array();

									if ($count  > 0){ 
									?>
										<script>
											alert("ID Number Already Exist");
										</script>
									<?php
										}
										else{
										$conn->query("insert into voters(id_number, password, firstname,lastname,year_level,status) VALUES('$id_number', '$password','$firstname','$lastname','$year_level','Unvoted')");
									?>
									<script>
										alert('Voters Successfully Save');
										window.location.assign("http://localhost:80/XVote/");
									</script>
							<?php
									}
								} 
							?>
						  
						
						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
</body>

</html>

