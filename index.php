<?php
	include("phpfiles/db.php");
?>	
<!DOCTYPE html>
<html>
<head>
	<title>The wall</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="Stylesheet" href="main.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<div class="menu">
			<h2>The wall</h2>
			<img src="images/hamburger.png" id="hamburger">
		</div>
		<hr>
		<div class="hide-menu">
			<ul>
				<li>Home</li>
				<li>Wall's</li>
				<li><a href="#loginForm">Login</li></li>
				<li><a href="#registerForm">Register</a></li>
				<li><a href="#uploadForm">Upload</a></li>
			</ul>
		</div>
		<div class="files">
		<?php

		$sql = "SELECT * FROM files";
		$result = $connect->query($sql);

		while($row = $result->fetch_assoc()){
			echo '<img src="uploads/' . $row["filename"] . '">';
		}


		?>
		</div>
		<hr>
		<div id="loginForm">
			<form action="phpfiles/login.php" method="POST">
				<input type="text" name="username" placeholder="Username"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="submit" name="submit" value="login">
			</form>
		</div>
		<hr>
		<div id="registerForm">
			<form method="POST" action="phpfiles/register.php">
				<input type="text" name="naam" placeholder="Name"><br>
				<input type="text" name="achternaam" placeholder="Surname"><br>
				<input type="text" name="username" placeholder="Username"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="password" name="repassword" placeholder="Repeat password"><br>
				<input type="email" name="email" placeholder="Email"><br>
				<input type="date" name="date" placeholder="Date of birth"><br>
				<input type="submit" name="submit" value="register">
			</form>
		</div>
		<hr>
		<div id="uploadForm">
			<form action="phpfiles/upload.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="Usernamefile" placeholder="Username"><br>
				<input type="text" name="title" placeholder="Title"><br>
				<textarea name="description" placeholder="description"></textarea><br>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Upload">
			</form>
		</div>
	</div>
</body>
</html>