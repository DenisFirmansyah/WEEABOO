<?php 

require ('../component/functions.php');

if (!isset($_GET["id"]) ) {
	header("Location: halaman_produk.php");
	exit;
}
$id = $_GET["id"];
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id WHERE kamera.id = $id")[0];




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail kamera</title>
</head>
<body>
		<img src="../<?php echo $kamera["gambar"]; ?>" alt="gambar kamera">
	<ul>
		<li>merek : <?php echo $kamera["merek"]; ?></li>
		<li>tipe : <?php echo $kamera["tipe"]; ?></li>
		<li>harga : Rp.<?php echo $kamera["harga"]; ?></li>
		<li>kondisi : <?php echo $kamera["kondisi"]; ?></li>
		<li>deskripsi produk : <br><?php echo nl2br($kamera["deskripsi"]); ?></li>
	</ul>
	<a href="link wa">beli via whatsapp!</a>
</body>
</html>
