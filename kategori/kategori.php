<?php
require ('../functions.php');
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}
//ambil data dari tabel merek
$merek = query("SELECT * FROM merek");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>kategori produk</title>
	<link rel="stylesheet" type="text/css" href="kategori.css">
	<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;700&family=Poppins:wght@100;200;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="container">
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
				<a href=" " class="cat">kategori produk</a>
			</form>
		</div>
		<div class="choosen">
			<a href="tambah_kategori.php"><img src="../img/add.png" alt="add">Tambah Kategori</a> 
		</div>
		<div class="table">
			<table>
			<tr>
				<th>no</th>
				<th>aksi</th>
				<th>merek</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($merek as $row) : ?>
			<tr>
				<td><?php echo $i; ?></td>				
				<td><a href="ubah_kategori.php?id=<?php echo $row["id"]; ?>">ubah</a> |
				<a href="hapus_kategori.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus kategori produk?')">hapus</a>
				</td>
				<td><?php echo $row["merek"]; ?> </td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>
		</table>
		</div>
	</div>
</body>
</html>	