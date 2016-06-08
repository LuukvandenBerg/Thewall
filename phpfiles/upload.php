<?php
	include("db.php");

	$filename = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];

	$tmp_name = $_FILES['file']['tmp_name'];
	$naam = $_POST['Usernamefile'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	echo $filename . $naam . $title . $description;

	if (isset($filename)) {
		if (!empty($filename)) {
			$location = '../uploads/';

			move_uploaded_file($_FILES['file']['tmp_name'], $location.$filename);

				$infoadd = "INSERT INTO files (name, title, description, filename) VALUES ('$naam','$title','$description','$filename')";
                $result2 = $connect->query($infoadd);
                header ("location: ../index.php");

		}else {
			echo 'Please choose a file.';
		}
	}


?>