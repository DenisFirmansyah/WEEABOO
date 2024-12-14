<?php
require 'funcions.php';

// if (!isset($_SESSION["login"])) {
// 	header('Location: login.php');
// 	exit;
// }	

if (isset($_POST["register"])) {
	
	if (registrasi($_POST) > 0) {
		echo"<script> 
				alert ('user baru berhasil di tambahkan!');
			</script>";
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
	<title>daftar admin</title>
	<link rel="stylesheet" type="text/css" href="daftaradmin.css">
	<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="log-con">
		<form action="" method="post">
			<div class="uplog">
				<div class="user-icon">
					<img src="img/security.png">
				</div>
				<h1>Daftar Akun admin</h1>
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
			<button type="submit" name="register">Daftar Sekarang!</button>
		</form>
	</div>
</body>
</html>