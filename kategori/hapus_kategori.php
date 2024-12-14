<?php
require '../functions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

$id = $_GET["id"];

if (hapus_kategori($id) > 0) {
	echo 
		"<script>
		alert ('kategori produk berhasil di hapus!');
		document.location.href = 'kategori.php';
		</script>";
} else {
	"<script>
		alert ('kategori produk gagal di hapus!');
		document.location.href = 'kategori.php';
		</script>";
}

?>