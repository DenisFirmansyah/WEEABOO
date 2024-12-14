<?php
require ('../component/functions.php');

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

//ambil data dari tabel kamera /query data kamera
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id");

//tombol cari ditekan
if (isset($_GET["cari"])) {
	$kamera = cari($_GET["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
		<h1>Daftar Produk</h1>
		<p>halo <?php echo $_SESSION["user"]["username"]; ?></p>
		<a href="tambah.php">Tambah Data Produk</a> 
	<br>
		<a href="../halaman_admin.php">kembali ke halaman admin!</a>
	<br><br>
	<form action="" method="get">
		<input type="text" name="keyword" size="50" autofocus placeholder="cari berdasarkan merek/tipe.." autocomplete="off">
		<button type="submit" name="cari">Cari Produk!</button>
	</form>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>no</th>
			<th>aksi</th>
			<th>merek</th>
			<th>tipe</th>
			<th>gambar</th>
			<th>kondisi</th>
			<th>deskripsi</th>
			<th>harga</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach($kamera as $row) : ?>
		<tr>
			<td><?php echo $i; ?></td>				
			<td><a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
				<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data produk?')">hapus</a>
			</td>
			<td><?php echo $row["merek"]; ?> </td>
			<td><?php echo $row["tipe"]; ?></td>
			<td><img style="width: 100px; height: 100px;" src="../<?php echo $row["gambar"]; ?>" alt="gambar kamera"></td>
			<td><?php echo $row["kondisi"]; ?></td>
			<td><?php echo nl2br($row["deskripsi"]); ?></td>
			<td>Rp. <?php echo $row["harga"]; ?></td>

		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
	</div>
</body>
</html>