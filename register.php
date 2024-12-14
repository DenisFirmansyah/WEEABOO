<?php
require 'component/functions.php';

// if (!isset($_SESSION["login"])) {
// 	header('Location: login.php');
// 	exit;
// }	

if (isset($_POST["register"])) {
	
	if (register($_POST) > 0) {
		echo"<script> 
				alert ('Account created successfully!');
			</script>";
		header('Location: login.php');
	} else {
		echo mysqli_error($connect);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WEEABOO - Growtopia Anime Community</title>
	<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
	<!-- Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/public/register.css">
</head>
<body>
	<div class="log-con">
		<form action="" method="post">
			<div class="uplog">
				<div class="user-icon">
					<a href="index.php">
						<img src="img/weaboo-2.png" width="100%" style="border-radius: 50%; ">
					</a>
				</div>
				<h1>Register an Account</h1>
			</div>
			<div class="data-input">
				<div class="input-group">
					<label for="username">
						<i class="fa fa-user"></i>
					</label>
					<input type="text" name="username" id="username" placeholder="USERNAME" required autocomplete="off">
				</div>
				<div class="input-group">
					<label for="password">
						<i class="fa fa-lock"></i>
					</label>
					<input type="password" name="password" id="password" placeholder="PASSWORD" required autocomplete="off">
				</div>
				<div class="input-group">
					<label for="password2">
						<i class="fa fa-lock"></i>
					</label>
					<input type="password" name="password2" id="password2" placeholder="KONFIRMASI PASSWORD" required autocomplete="off">
				</div>	
			</div>
			<button type="submit" name="register">Register</button>
		</form>
	</div>
</body>
</html>