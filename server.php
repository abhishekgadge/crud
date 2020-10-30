<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
        $id = 0;
	$name = "";
	$assignment = "";
	$grade = "";
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$assignment = $_POST['assignment'];
                $grade = $_POST['grade'];

		mysqli_query($db, "INSERT INTO info (name, assignment, grade) VALUES ('$name', '$assignment', '$grade')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

// ...

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['assignment'];
        $grade = $_POST['grade'];

	mysqli_query($db, "UPDATE info SET name='$name', assignment='$assignment',grade='$grade' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}