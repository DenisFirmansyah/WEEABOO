<?php 
require 'component/functions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pixel = "SELECT p.*, u.username FROM pixel p INNER JOIN user u ON p.user_id = u.id WHERE p.id = ?";

$stmt = $connect->prepare($sql);

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

//cek apakah tombol submit sudah pernah di tekan
if (isset($_POST["submit"])) {
	if (ubah($_POST) > 0) {
		echo 
		"<script>
		alert ('Data Updated!');
		</script>";

	} else {
		echo "data produk gagal diubah!";
		echo "<br>";
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
	<link rel="stylesheet" type="text/css" href="addchange_items.css">
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
			<h1>Ubah Data Produk</h1>
		</header>
		<div class="back">
			<a href="../halaman_admin.php">Kembali Ke Daftar Produk</a>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="image-preview">
					<label for="gambar">
						<img src="<?php echo $pixel["image"] ?>" id="image-preview" alt="gambar kamera">
						<div>Pilih atau drop gambar</div>
						<input type="file" name="gambar" id="gambar" accept="image/*">
					</label>
			</div>
			<div class="row">
				<input type="hidden" name="id" id="id" value="<?php echo $pixel["id"]; ?>">
				<input type="hidden" name="oldImage" value="<?php echo $pixel["image"]; ?>">

				<!-- <div class="input-group">
					<label for="merek">merek : </label>
					<select class="input" name="merek_id" id="merek">
					<?php foreach($merek as $mrk) : ?>
						<option <?php echo $pixel['merek_id'] == $mrk['id'] ? 'selected' : '' ?> value="<?php echo $mrk['id'] ?>"><?php echo $mrk["merek"] ?></option>
					<?php endforeach; ?>
					</select>
				</div> -->
				<div class="input-group">
					<label for="char">Character Name : </label>
					<input class="input" type="text" name="char" id="char" required autocomplete="off" value="<?php echo $pixel["char"] ?>">> 
				</div>
			</div>
			<div class="row">
				<div class="input-group">
					<label for="anime">Anime Name : </label>
					<input class="input" type="text" name="anime" id="anime" required autocomplete="off" value="<?php echo $pixel['anime'] ?>"> 
				</div>
				<div class="input-group">
					<label for="world">World : </label>
				<input class="input" type="text" name="world" id="world" required autocomplete="off" value="<?php echo $pixel["world"] ?>"> 
				</div>
			</div>
			<!-- <div class="input-group">
				<label for="deskripsi">Author : </label>
				<textarea class="input" rows="6" cols="30" name="user" id="user" required><?php echo $pixel["user"] ?></textarea>
			</div> -->
				<button type="submit" name="submit" onclick="return confirm('Apakah anda yakin ingin mengubah data produk?')">Ubah Data Prduk</button>
		</form>
	</div>
	<script>
		const fileInput = document.querySelector('#gambar');
		const dropzone = document.querySelector('.image-preview div')
		fileInput.addEventListener('change', function(e){
			const {files} = e.target;
			const url = URL.createObjectURL(files[0])
			const img = document.querySelector('#image-preview');
			img.src = url;
		})
		fileInput.addEventListener('dragenter', function() {
			dropzone.classList.add('dragover');
		});

		fileInput.addEventListener('dragleave', function() {
			dropzone.classList.remove('dragover');
		});
	</script>

</body>
</html>