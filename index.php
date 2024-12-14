<?php 

require ('component/functions.php');
$kamera = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id ORDER BY id");
$new_product = $kamera[count($kamera)-1];
$top_seller = query("SELECT kamera.*, merek.merek FROM kamera JOIN merek ON merek.id = kamera.merek_id WHERE top_seller = 1")[0];

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
	<title>WEABOO - Growtopia Anime Community</title>
	<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
	<!-- icons -->
		<script src="https://unpkg.com/feather-icons"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- css -->
		<link rel="stylesheet" type="text/css" href="css/public/index.css">
</head>
<body>
	<?php
		include "component/header.php"
	?>
	<div class="gateway" style="position: fixed; top: 20; right: 0; margin-right: 30px;">
		Filter
	</div>

	<div class="container">
		<div class="photo-group">
			<div class="photo-box">
				<div>
					<a href="detail.php">
						<img src="https://s3.amazonaws.com/world.growtopiagame.com/weeaboo.png" alt="Komi-San" >
					</a>
				</div>
			</div>
			<table class="photo-detail">
				<tr>
					<td>Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Komi-San</td>
				</tr>
				<tr>
					<td>Anime Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Komi-san wa Komyushou Desu</td>
				</tr>
				<tr>
					<td>World</td>
					<td style="padding-inline: 10px;">:</td>
					<td>WEEABOO</td>
				</tr>
				<tr>
					<td>Author</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Waifou</td>
				</tr>
			</table>
		</div>
		<div class="photo-group">
			<div class="photo-box">
				<div>
					<img src="https://s3.amazonaws.com/world.growtopiagame.com/nishimiya.png" alt="Nishimiya"  height="100%">
				</div>
			</div>
			<table class="photo-detail">
				<tr>
					<td>Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Nishimiya Shouko</td>
				</tr>
				<tr>
					<td>Anime Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Koe no Katachi</td>
				</tr>
				<tr>
					<td>World</td>
					<td style="padding-inline: 10px;">:</td>
					<td>NISHIMIYA</td>
				</tr>
				<tr>
					<td>Author</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Schwi</td>
				</tr>
			</table>
		</div>
		<div class="photo-group">
			<div class="photo-box">
				<div>
					<img src="https://s3.amazonaws.com/world.growtopiagame.com/rezero.png" alt="Echidna" >
				</div>
			</div>
			<table class="photo-detail">
				<tr>
					<td>Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Echidna</td>
				</tr>
				<tr>
					<td>Anime Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Re: Zero, Season 2</td>
				</tr>
				<tr>
					<td>World</td>
					<td style="padding-inline: 10px;">:</td>
					<td>REZERO</td>
				</tr>
				<tr>
					<td>Author</td>
					<td style="padding-inline: 10px;">:</td>
					<td>prxerkun</td>
				</tr>
			</table>
		</div>
		<div class="photo-group">
			<div class="photo-box">
				<div>
					<img src="https://s3.amazonaws.com/world.growtopiagame.com/astolfo.png" alt="Astolfo" >
				</div>
			</div>
			<table class="photo-detail">
				<tr>
					<td>Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Astolfo</td>
				</tr>
				<tr>
					<td>Anime Name</td>
					<td style="padding-inline: 10px;">:</td>
					<td>Fate Series</td>
				</tr>
				<tr>
					<td>World</td>
					<td style="padding-inline: 10px;">:</td>
					<td>ASTOLFO</td>
				</tr>
				<tr>
					<td>Author</td>
					<td style="padding-inline: 10px;">:</td>
					<td>KOMEKO</td>
				</tr>
			</table>
		</div>
    </div>
	<?php
		include "component/footer.php"
	?>
	<!-- End of Navigation Bar -->
	<!-- <section class="landing-image">
		<p>SELAMAT DATANG DI <span>MiCAM</span></p>
	</section>
	<section class="promo">
		<div class="new-promo">
			<p class="line">NEW PRODUCT</p>
			<div class="items-np">
				<div class="left-np">
					<img style="width: 300px; height: 300px;" src="<?php echo $new_product['gambar']; ?>" alt="gambar kamera">
					<p>
						<?php echo $new_product["merek"];?> <?php echo $new_product["tipe"] ?>
					</p>
				</div>
				<div class="right-np">
					<ul>
						<li>harga : Rp.<?php echo $new_product["harga"]; ?></li>
						<li>kondisi : <?php echo $new_product["kondisi"]; ?></li>
						<li>deskripsi produk : <br><?php echo nl2br($new_product["deskripsi"]); ?></li>
					</ul>
					<div class="order-icon">
						<a href="whatsapp://send?text=<?= urlencode("Halo saya ingin pesan ".$new_product['merek'].' '.$new_product['tipe']) ?>&phone=+6289694018787">
							<div class="pesan">
								<img src="img/whatsapp.png">
								<p>Pesan Via WhatsApp</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="promo">
		<div class="new-promo">
			<p class="line">TOP SELLER</p>
			<div class="items-np">
				<div class="left-np">
					<img style="width: 300px; height: 300px;" src="<?php echo $top_seller['gambar']; ?>" alt="gambar kamera">
					<p>
						<?php echo $top_seller["merek"];?> <?php echo $top_seller["tipe"] ?>
					</p>
				</div>
				<div class="right-np">
					<ul>
						<li>harga : Rp.<?php echo $top_seller["harga"]; ?></li>
						<li>kondisi : <?php echo $top_seller["kondisi"]; ?></li>
						<li>deskripsi produk : <br><?php echo nl2br($top_seller["deskripsi"]); ?></li>
					</ul>
					<div class="order-icon">
						<a href="whatsapp://send?text=<?= urlencode("Halo saya ingin pesan ".$top_seller['merek'].' '.$top_seller['tipe']) ?>&phone=+6289694018787">
						<div class="pesan">
							<img src="img/whatsapp.png">
								<p>Pesan Via WhatsApp</p>
						</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<p>OUR SOCIAL MEDIA</p>
		<div class="social">
			<div class="instagram">
				<a href="https://instagram.com/micam888.camera?igshid=MzNlNGNkZWQ4Mg=="><img src="img/instagram.png"></a>
			</div>
			<div class="tiktok">
				<a href="https://www.tiktok.com/@micam888camera?_t=8dGmxLdwReb&_r=1"><img src="img/tik-tok.png"></a>
			</div>
			<div class="youtube">
				<a href="https://youtube.com/@micamera888"><img src="img/youtube.png"></a>
			</div>
		</div>
	</footer> -->

	<!-- icons -->
	<script>
      feather.replace()
    </script>

</body>
</html>