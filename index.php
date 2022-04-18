<?php
session_start(); //if you are going to use session in ur page its good practice to put it as a first line on your page
include("db_connect.php"); //this line should be first or second to ensure that the database and tables are created first before being used down below on the page
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<script src="js/jquery.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>





<body>
	<?php if (isset($_SESSION['upload'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				swal({
						title: "Admin added successfully",
						text: "Do you want to add another one?",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "green",
						confirmButtonText: "OK!",
						closeOnConfirm: true,
						closeOnCancel: true,
						buttonsStyling: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$('#exampleModal').modal('show');
						}
					});

			});
		</script>


	<?php
		session_destroy();
	} ?>

	<?php if (isset($_SESSION['upload2'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				swal({
						title: "Subject added successfully",
						text: "Do you want to add another one?",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "green",
						confirmButtonText: "OK!",
						closeOnConfirm: true,
						closeOnCancel: true,
						buttonsStyling: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$('#exampleModals').modal('show');
						}
					});

			});
		</script>


	<?php
		session_destroy();
	} ?>

	<?php if (isset($_SESSION['upload3'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				swal({
						title: "Teacher added successfully",
						text: "Do you want to add another one?",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "green",
						confirmButtonText: "OK!",
						closeOnConfirm: true,
						closeOnCancel: true,
						buttonsStyling: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$('#exampleModals3').modal('show');
						}
					});

			});
		</script>


	<?php
		session_destroy();
	} ?>

	<?php if (isset($_SESSION['upload4'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				swal({
						title: "Student added successfully",
						text: "Do you want to add another one?",
						type: "success",
						showCancelButton: true,
						confirmButtonColor: "green",
						confirmButtonText: "OK!",
						closeOnConfirm: true,
						closeOnCancel: true,
						buttonsStyling: false
					},
					function(isConfirm) {
						if (isConfirm) {
							$('#exampleModals4').modal('show');
						}
					});

			});
		</script>


	<?php
		session_destroy();
	} ?>

	<?php if (isset($_SESSION['error'])) { ?>
		<script type="text/javascript">
			$(document).ready(function() {
				sweetAlert("Oops...", "There is arleady an entry with those details in the system", "error");
			});
		</script>
	<?php
		session_destroy();
	} ?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;
				<?php
				$sqln = "SELECT * FROM School ";
				$rgetb = mysqli_query($db, $sqln);
				$numb = mysqli_num_rows($rgetb);
				if ($numb != 0) {
					while ($foundl = mysqli_fetch_array($rgetb)) {
						$name = $foundl['School_Name'];
						$email = $foundl['School_Email'];
						$phone = $foundl['School_Phone'];
					}
					echo "$name";
				}




				?>
			</a>
			<h class="text-success" style="float:right"><?php echo $email; ?></h></br>
			<h class="text-info" style="float:right"><?php echo $phone; ?></h>
		</div>
	</nav>
	<div class="col-md-6 well" style="width:25%">

		<table class='table table-striped'>

			<thead>
				<caption>
					<h4 class="text-primary">Administrator Table</h4>
				</caption>

				<tr>
					<th>SN</th>
					<th>Name</th>
					<th>Username</th>
					<th>Password</th>

				</tr>
			</thead>
			<tbody>
				<?php $sql = "SELECT * FROM Administrator  ";
				$rget = mysqli_query($db, $sql);
				$num = mysqli_num_rows($rget);
				if ($num != 0) {

					while ($foundk = mysqli_fetch_array($rget)) {
						$fname = $foundk['Firstname'];
						$sname = $foundk['Sirname'];
						$id = $foundk['id'];
						$user = $foundk['Username'];
						$pass = $foundk['Password'];
						$email = $foundk['Email'];

						echo "
								<tr class='success'>
								   <td>$id</td>
									<td>$fname $sname</td>
									<td>$user</td>
									<td>$pass</td>									
								</tr>";
					}
				}
				?>
			</tbody>
		</table>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-plus"></span> Add Admin</button>



	</div>
	<div class="col-md-6 well" style="width:25%">
		<div class="col-md-3">

			<table class='table table-striped'>
				<thead>
					<caption>
						<h4 class="text-primary">Subjects Table</h4>
					</caption>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Teacher </th>
						<th>Hours</th>

					</tr>
				</thead>
				<tbody>
					<?php $sql = "SELECT * FROM Subjects  ";
					$rget = mysqli_query($db, $sql);
					$num = mysqli_num_rows($rget);
					if ($num != 0) {

						while ($foundk = mysqli_fetch_array($rget)) {
							$sname = $foundk['Subject_Name'];
							$tname = $foundk['Subject_Teacher'];
							$id = $foundk['id'];
							$hours = $foundk['Subject_Hours'];

							echo "
								<tr class='success'>
								<td>$id</td>
									<td>$sname</td>
									<td>$tname</td>
									<td>$hours</td>									
								</tr>";
						}
					}
					?>
				</tbody>
			</table>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals"><span class="glyphicon glyphicon-plus"></span> Add Subjects</button>

		</div>

	</div>
	<div class="col-md-6 well" style="width:25%">
		<div class="col-md-3">

			<table class='table table-striped'>
				<thead>
					<caption>
						<h4 class="text-primary">Teachers Table</h4>
					</caption>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Email </th>

					</tr>
				</thead>
				<?php $sql = "SELECT * FROM Teachers  ";
				$rget = mysqli_query($db, $sql);
				$num = mysqli_num_rows($rget);
				if ($num != 0) {

					while ($foundk = mysqli_fetch_array($rget)) {
						$tt = $foundk['Teacher_Title'];
						$fname = $foundk['Firstname'];
						$sname = $foundk['Sirname'];
						$phone = $foundk['Phone'];
						$email = $foundk['Email'];
						$id = $foundk['id'];

						echo "
								<tr class='success'>
									<td>$id </td>
									<td>$tt $fname $sname</td>
									<td>$email</td>
											</tr>";
					}
				}
				?>
			</table>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals3"><span class="glyphicon glyphicon-plus"></span> Add Teacher</button>

		</div>

	</div>
	<div class="col-md-6 well" style="width:25%">
		<div class="col-md-3">

			<table class='table table-striped'>
				<thead>
					<caption>
						<h4 class="text-primary">Students Table</h4>
					</caption>
					<tr>
						<th>SN</th>
						<th>Name</th>
						<th>Gender </th>
						<th>Guardian</th>

					</tr>
				</thead>
				<tbody>
					<?php $sql = "SELECT * FROM Students  ";
					$rget = mysqli_query($db, $sql);
					$num = mysqli_num_rows($rget);
					if ($num != 0) {

						while ($foundk = mysqli_fetch_array($rget)) {
							$fname = $foundk['Firstname'];
							$sname = $foundk['Sirname'];
							$guardian = $foundk['Guardian_Name'];
							$gender = $foundk['Gender'];
							$id = $foundk['id'];

							echo "
								<tr class='success'>
								   <td>$id</td>
									<td>$fname $sname</td>
									<td>$gender</td>
									<td>$guardian</td>								
								</tr>";
						}
					}
					?>
				</tbody>
			</table>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModals4"><span class="glyphicon glyphicon-plus"></span> Add Students</button>

		</div>

	</div>
	<center>
		<div style="margin-top: 37%">
			<h4 class="text-primary">Designed and Developed by mvumapatrick@gmail.com</h4>
		</div>
	</center>
	<center><a href="https://www.linkedin.com/in/patrick-mvuma-890957a5/">Click here to Follow me on Linkedin&nbsp;<i class="fab fa-linkedin"></i></a></center>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#222d32;">
		<div class="modal-dialog" role="document">
			<div class="modal-header" style="background:#222d32">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
					<center>
						FILL THE FORM BELOW TO ADD ADMINISTRATOR
					</center>
				</h4>
			</div>

			<form action="upload.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Fistname</span>
								<input type="text" class="form-control" name="fname" value="" placeholder="Enter Firstname">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Lastname</span>
								<input type="text" class="form-control" name="lname" value="" placeholder="Enter Lastname">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Username</span>
								<input type="text" class="form-control" name="username" value="" placeholder="Enter Username">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Email</span>
								<input type="email" class="form-control" name="email" value="" placeholder="Enter Email">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Password</span>
								<input type="password" class="form-control" name="password" value="" placeholder="Enter Password">
							</div>

						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="Save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#222d32;">
		<div class="modal-dialog" role="document">
			<div class="modal-header" style="background:#222d32">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
					<center>
						FILL THE FORM BELOW TO ADD SUBJECTS
					</center>
				</h4>
			</div>

			<form action="upload.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Subject Name</span>
								<input type="text" class="form-control" name="sname" value="" placeholder="Enter Subject Name ">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Subject Code</span>
								<input type="text" class="form-control" name="scode" value="" placeholder="Enter Subject Code">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Select Teacher</span>
								<select style='height:37px;width:100%;border:1px solid;' name="teacher" id='studyname'>
									<option>Select option</option>

									<?php
									$ramend = "SELECT * FROM Teachers";
									$amendf = mysqli_query($db, $ramend);

									while ($founda = mysqli_fetch_array($amendf)) {
										$sname = $founda['Firstname'];
										echo "<option> $sname</option>";
									}

									?>
								</select>
							</div>

							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Subject Grade</span>
								<input type="text" class="form-control" name="grade" value="" placeholder="Enter Subject Grade">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Subject Hours</span>
								<input type="number" class="form-control" name="hours" value="" placeholder="Enter Subject Hours">
							</div>

						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="Subjects" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="exampleModals3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#222d32;">
		<div class="modal-dialog" role="document">
			<div class="modal-header" style="background:#222d32">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
					<center>
						FILL THE FORM BELOW TO ADD SCHOOL TEACHER
					</center>
				</h4>
			</div>

			<form action="upload.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="input-group" style="margin-bottom:10px">
								<p style="margin-bottom:10px;">
									<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
									<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
									<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>
									<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
									<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
								</p>
							</div>

							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Fistname</span>
								<input type="text" class="form-control" name="fname" value="" placeholder="Enter Firstname">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Lastname</span>
								<input type="text" class="form-control" name="lname" value="" placeholder="Enter Lastname">
							</div>

							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Email</span>
								<input type="email" class="form-control" name="email" value="" placeholder="Enter Email">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Phone</span>
								<input type="text" class="form-control" name="phone" value="" placeholder="Enter Phone">
							</div>

						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="Saved" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal fade" id="exampleModals4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#222d32;">
		<div class="modal-dialog" role="document">
			<div class="modal-header" style="background:#222d32">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight: bold;color: #F0F0F0">
					<center>
						FILL THE FORM BELOW TO ADD STUDENT
					</center>
				</h4>
			</div>

			<form action="upload.php" method="POST">
				<div class="modal-content">
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Fistname</span>
								<input type="text" class="form-control" name="fname" value="" placeholder="Enter Firstname">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Lastname</span>
								<input type="text" class="form-control" name="lname" value="" placeholder="Enter Lastname">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Select gender</span>
								<select style='height:37px;width:100%;border:1px solid;' name="gender" id='studyname'>
									<option>Select option</option>
									<option>Male</option>
									<option>Female</option>

								</select>
							</div>

							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Date of Birth</span>
								<input type="date" class="form-control" name="dob" value="" placeholder="Enter DOB">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Address</span>
								<input type="text" class="form-control" name="address" value="" placeholder="Enter Address">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Guardian Name</span>
								<input type="text" class="form-control" name="gname" value="" placeholder="Enter Guardian Name">
							</div>
							<div class="input-group" style="margin-bottom:10px">
								<span class="input-group-addon">Guardian Phone</span>
								<input type="text" class="form-control" name="gphone" value="" placeholder="Enter Guardian Phone">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="Saved2" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>