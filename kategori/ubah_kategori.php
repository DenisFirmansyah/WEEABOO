<?php 
require '../functions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}
//koneksi ke dbms

$connect = mysqli_connect("localhost", "root", "", "tokoonline");
//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
	if (ubah_kategori($_POST) > 0) {
		echo 
		"<script>
		alert ('kategori berhasil di ubah!');
		</script>";

	} else {
		echo "kategori gagal diubah!";
		echo "<br>";
		echo mysqli_error($connect);

	}
}
$id = $_GET['id'];
$mrk = query("SELECT * FROM merek WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah kategori Produk</title>
	<link rel="stylesheet" type="text/css" href="../addchange_items.css">
	<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
		<div class="head">
			<header>
				<div class="left-session">
					<h1>Halaman Admin</h1>
				</div>
				<div class="right-session">
					<div class="sapa">
						<p>Halo <?php echo $_SESSION["user"]["username"]; ?></p>
					</div>
					<div class="exit">
						<a href="../logout.php"><img src="../img/logout.png"></a>
					</div>
				</div>
			</header>
			<div class="form">
				<form action="">
					<a href="../halaman_admin.php" class="daf">daftar produk</a>
					<a href="../kategori/kategori.php" class="cat">kategori produk</a>
				</form>
			</div>
		</div>
		<header>
			<h1>Ubah kategori Produk</h1>
		</header>
		<div class="back">
			<a href="kategori.php">Kembali Ke kategori Produk</a>
		</div>
		<form action="" method="post">
				<input type="hidden" name="id" value="<?php echo $mrk["id"] ?>">

				<div class="input-group">
					<label for="merek">merek : </label>
					<input class="input" type="text" name="merek" id="merek" value="<?php echo $mrk["merek"]?>">
				</div>
				<button type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin mengubah kategori produk?')">Ubah kategori Prduk</button>
	</form>
	</div>
</body>
</html>