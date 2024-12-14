<?php 
require ('component/functions.php');
$pixel = query("SELECT p.*, u.username FROM pixel p INNER JOIN user u ON p.user_id = u.id ");

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
	<title>WEEABOO - Growtopia Anime Community</title>
	<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
	<!-- icons -->
		<script src="https://unpkg.com/feather-icons"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- css -->
		<link rel="stylesheet" type="text/css" href="css/public/index.css">
		<link rel="manifest" href="manifest.json">
</head>
<body>
	<?php
		include "component/header.php"
	?>
    <!-- <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
    </div>
	<span id="filter" class="gateway filter-btn" onclick="openNav()">Filter</span> -->
	

	<div class="container">
        <?php foreach($pixel as $data) : ?>
			<div class="photo-group">
				<div class="photo-box">
					<div>
						<a href="detail.php?id=<?php echo $data["id"]; ?>">
							<img src="https://<?php echo $data["image"]; ?>" alt=<?php echo $data["char"]; ?> >
						</a>
					</div>
				</div>
				<table class="photo-detail">
					<tr>
						<td>Name</td>
						<td style="padding-inline: 10px;">:</td>
						<td><?php echo $data["char"]; ?></td>
					</tr>
					<tr>
						<td>Anime/Game Name</td>
						<td style="padding-inline: 10px;">:</td>
						<td><?php echo $data["anime"]; ?></td>
					</tr>
					<tr>
						<td>World</td>
						<td style="padding-inline: 10px;">:</td>
						<td style="text-transform: uppercase;"><?php echo $data["world"]; ?></td>
					</tr>
					<tr>
						<td>Author</td>
						<td style="padding-inline: 10px;">:</td>
						<td><?php echo $data["username"]; ?></td>
					</tr>
				</table>
            </div>
		<?php endforeach; ?>
    </div>
	<?php
		include "component/footer.php"
	?>

	<!-- icons -->
	<script src="app.js">
    </script>
</body>
</html>