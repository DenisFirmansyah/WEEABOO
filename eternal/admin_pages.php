<?php
require ('../component/functions.php');
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

//ambil data dari tabel kamera /query data kamera
$pixel = query("SELECT p.*, u.username FROM pixel p INNER JOIN user u ON p.user_id = u.id");

//tombol cari ditekan
if (isset($_GET["cari"])) {
	$pixel = cari($_GET["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>halaman admin</title>
	<link rel="stylesheet" type="text/css" href="../halaman_admin.css">
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
						<a href="logout.php"><img src="img/logout.png"></a>
					</div>
				</div>
			</header>
			<div class="form">
				<form action="">
					<a href=" " class="daf">daftar produk</a>
					<a href="kategori/kategori.php" class="cat">kategori produk</a>
				</form>
			</div>
		</div>
		<div class="choosen">
			<a href="../produk/tambah.php"><img src="../img/add.png" alt="add">Tambah Produk</a>
			<form action="" method="get">
				<input type="text" name="keyword" size="50" autofocus placeholder="cari berdasarkan merek/tipe.." autocomplete="off">
				<button type="submit" name="cari">Cari Produk!</button>
			</form>
		</div>
		<div class="table">
			<table>
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
		<?php foreach($pixel as $row) : ?>
		<tr>
			<td><?php echo $i; ?></td>				
			<td><a href="produk/ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> |
				<a href="produk/hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data produk?')">hapus</a>
			</td>
			<td><?php echo $row["char"]; ?> </td>
			<td><?php echo $row["anime"]; ?></td>
			<td><img style="width: 100px; height: 100px;" src="../<?php echo $row["image"]; ?>" alt="gambar kamera"></td>
			<td><?php echo $row["world"]; ?></td>
			<td class="desk"><?php echo nl2br($row["username"]); ?></td>
			<td>Rp. <?php echo $row["id"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</table>
		</div>
	</div>
	
	<!-- <script>
		let top_seller_radio = document.querySelectorAll('.top_seller');
		top_seller_radio.forEach(function(top_seller){
			top_seller.addEventListener('change', function(e){
				let xhr = new XMLHttpRequest()
				xhr.open("POST", 'top_seller.php', true);
				//Send the proper header information along with the request
				xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhr.onreadystatechange = function() {//Call a function when the state changes.
				    if(xhr.readyState == 4 && xhr.status == 200) {
				        alert(xhr.responseText);
				    }
				}
				xhr.send('id='+e.target.value);
			})
		})
	</script> -->
</body>
</html>	