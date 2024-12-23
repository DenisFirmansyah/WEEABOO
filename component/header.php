<head>
	<link rel="stylesheet" href="css/public/header.css">
</head>
<!-- Navigation Bar -->
	<nav id="navbar">
		<!-- LEFT GRID -->
		 <a href="/dashboard.php" style="text-decoration: none; color: white;">
			<div id="navbar-main">
						<div >
							<img src="img/weaboo-1.png" alt="weaboo" width="50">
						</div>
						<div>
							<div id="navbar-title">WEABOO</div>
							<div id="sub-title">Growtopia Anime Community</div>
						</div>
			</div>
		 </a>
		 <!-- <div id="navbar-middle">
			<form action="" method="get">
				<input type="text" name="keyword" size="auto" autofocus placeholder="Find your Char/Anime" autocomplete="on">
				<button type="submit" name="cari">Cari Produk!</button>
			</form>
		 </div> -->
		<!-- RIGHT GRID -->
		<div id="navbar-secondary">
			<?php if (isset($_SESSION['user'])) {?>
				<div class="name"><?= $_SESSION['user']['username'] ?></div>
				<div>
					<a href="upload.php" class="gateway">Upload</a>
					<a href="component/logout.php" class="gateway block">Logout</a>
				</div>
				<?php }else{?>
					<a href="register.php" class="gateway">Register</a>
					<a href="login.php" class="gateway">Login</a>
			<?php }?>
		</div>
	</nav>
	<!-- End of Navigation Bar -->