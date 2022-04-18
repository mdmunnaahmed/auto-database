<?php
session_start();
include("db_connect.php");

if (isset($_POST['Save'])) {

	$fname = mysqli_real_escape_string($db, $_POST["fname"]);
	$lname = mysqli_real_escape_string($db, $_POST["lname"]);
	$email = mysqli_real_escape_string($db, $_POST["email"]);
	$pass = mysqli_real_escape_string($db, $_POST["password"]);
	$username = mysqli_real_escape_string($db, $_POST["username"]);

	$sql = "SELECT * FROM Administrator WHERE Email='$email' && Firstname='$fname' ";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		$enter = "INSERT INTO Administrator (Firstname,Sirname,Email,Password,Username) VALUES('$fname','$lname','$email','$pass','$user')";
		$db->query($enter);
		$_SESSION['upload'] = "yes";
		header("Location:index.php");
	} else {
		$_SESSION['error'] = "Administrator already exist";
		header("Location:index.php");
	}
}

if (isset($_POST['Subjects'])) {

	$name = mysqli_real_escape_string($db, $_POST["sname"]);
	$code = mysqli_real_escape_string($db, $_POST["scode"]);
	$grade = mysqli_real_escape_string($db, $_POST["grade"]);
	$hours = mysqli_real_escape_string($db, $_POST["hours"]);
	$teacher = mysqli_real_escape_string($db, $_POST["teacher"]);

	$sql = "SELECT * FROM Subjects WHERE Subject_Name='$name' && Subject_Code='$code' ";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		$enter = "INSERT INTO Subjects (Subject_Name,Subject_Code,Subject_Grade,Subject_Teacher,Subject_Hours) VALUES('$name','$code','$grade','$teacher','$hours')";
		$db->query($enter);
		$_SESSION['upload2'] = "yes";
		header("Location:index.php");
	} else {
		$_SESSION['error'] = "Administrator already exist";
		header("Location:index.php");
	}
}
if (isset($_POST['Saved'])) {

	$fname = mysqli_real_escape_string($db, $_POST["fname"]);
	$lname = mysqli_real_escape_string($db, $_POST["lname"]);
	$email = mysqli_real_escape_string($db, $_POST["email"]);
	$phone = mysqli_real_escape_string($db, $_POST["phone"]);

	if (isset($_POST["mr"])) {
		$mtitle = "Mr";
	} elseif (isset($_POST["miss"])) {
		$mtitle = "Miss";
	} elseif (isset($_POST["mrs"])) {
		$mtitle = "Mrs";
	} elseif (isset($_POST["dr"])) {
		$mtitle = "Dr";
	} elseif (isset($_POST["pro"])) {
		$mtitle = "Pro";
	} else {
		$mtitle = "";
	}

	$sql = "SELECT * FROM Teachers WHERE Email='$email' && Sirname='$lname' ";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		$enter = "INSERT INTO Teachers (Teacher_Title,Firstname,Sirname,Phone,Email) VALUES('$mtitle','$fname','$lname','$phone','$email')";
		$db->query($enter);
		$_SESSION['upload3'] = "yes";
		header("Location:index.php");
	} else {
		$_SESSION['error'] = "Administrator already exist";
		header("Location:index.php");
	}
}
if (isset($_POST['Saved2'])) {

	$fname = mysqli_real_escape_string($db, $_POST["fname"]);
	$lname = mysqli_real_escape_string($db, $_POST["lname"]);
	$gender = mysqli_real_escape_string($db, $_POST["gender"]);
	$dob = mysqli_real_escape_string($db, $_POST["dob"]);
	$gname = mysqli_real_escape_string($db, $_POST["gname"]);
	$phone = mysqli_real_escape_string($db, $_POST["gphone"]);
	$addres = mysqli_real_escape_string($db, $_POST["address"]);

	$sql = "SELECT * FROM Students WHERE Sirname='$lname' && Guardian_Name='$gname' ";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if ($count == 0) {
		$enter = "INSERT INTO Students (Firstname,Sirname,Gender,DOB,Address,Guardian_Name,Guardian_Phone)
						    VALUES('$fname','$lname','$gender','$dob','$addres','$gname','$phone')";
		$db->query($enter);
		$_SESSION['upload4'] = "yes";
		header("Location:index.php");
	} else {
		$_SESSION['error'] = "Administrator already exist";
		header("Location:index.php");
	}
}
