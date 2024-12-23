<?php
require 'component/functions.php';

if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

$user_id = $_SESSION['user']['id'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Proses update data
	$image = $_POST['image'] ?? '';
	$char = $_POST['char'] ?? '';
	$anime = $_POST['anime'] ?? '';
	$world = $_POST['world'] ?? '';

	$sql = "UPDATE pixel SET image = ?, char = ?, anime = ?, world = ? WHERE id = ? AND user_id = ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param("sssii", $image, $char, $anime, $world, $id, $user_id);
	$stmt->execute();

	if ($stmt->affected_rows > 0) {
		header("Location: detail.php?id=$id");
	} else {
		echo "Update failed or no changes made.";
	}
	exit;
}

// Ambil data lama
$sql = "SELECT * FROM pixel WHERE id = ? AND user_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
	die("No data found or you don't have permission.");
}

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
	<link rel="stylesheet" type="text/css" href="css/public/upload.css">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
	<?php
		include "component/header.php"
	?>
	<div class="container">
		<header>
			<h1>EDIT PIXEL ART</h1>
		</header>

		<form method="POST">
			<div class="group">
				<table>
					<tr>
						<td>
							<label for="image">Render link</label>
						</td>
						<td>:</td>
						<td>
							<input class="input" type="text" name="image" id="image" placeholder="Enter renderlink here" value="<?= htmlspecialchars($data['image']) ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="char">Char Name</label>
						</td>
						<td>:</td>
						<td>
							<input class="input" type="text" name="char" id="char" placeholder="Enter Character Name" value="<?= htmlspecialchars($data['char']) ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="anime">Anime Name</label>
						</td>
						<td>:</td>
						<td>
							<input class="input" type="text" name="anime" id="anime" placeholder="Enter Anime Name" value="<?= htmlspecialchars($data['anime']) ?>" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="world">World</label>
						</td>
						<td>:</td>
						<td>
							<input class="input" type="text" name="world" id="world" placeholder="Enter your Art World" value="<?= htmlspecialchars($data['world']) ?>" required>
						</td>
					</tr>
					<tr>
                        <td>
                            <label for="user">Author</label></td>
                        <td>
                            :
                        </td>
                        <td>
                            <div style="padding-left: 4px; margin-block: 10px;"><?= $_SESSION['user']['username'] ?></div>
                            <input class="input" type="hidden" name="user" id="user" value="<?= $_SESSION['user']['id'] ?>" />
                        </td>
                    </tr>
				</table>
				<div style="display: flex; justify-content: end;">
					<button type="submit" name="submit">Update</button>
				</div>
			</div>
		</form>
	</div>
	<script>
		const fileInput = document.querySelector('#gambar');
		const dropzone = document.querySelector('.image-preview div')
		fileInput.addEventListener('change', function (e) {
			const { files } = e.target;
			const url = URL.createObjectURL(files[0])
			const img = document.querySelector('#image-preview');
			img.src = url;
		})
		fileInput.addEventListener('dragenter', function () {
			dropzone.classList.add('dragover');
		});

		fileInput.addEventListener('dragleave', function () {
			dropzone.classList.remove('dragover');
		});
	</script>

</body>

</html>