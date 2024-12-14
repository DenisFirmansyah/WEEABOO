<?php
require ('component/functions.php');
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
	exit;
}

if (isset($_POST["submit"])) {
	if (tambah($_POST) > 0) {
		echo 
		"<script>
		alert ('Data Was Created Successfully!');
		// document.location.href = '../halaman_admin.php';
		</script>"
		;

	} else {
		echo "Data Failed to Create!";
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
			<p>UPLOAD PIXEL ART</p>
		</header>
		
		<form action="" method="post" enctype="multipart/form-data">
            <div class="group">
                <!-- <label for="image">
                    <img src="" id="image-preview" alt="">
                    <div>Choose your Image</div>
                    <input type="file" name="image" id="image" accept="image/*">
                </label> -->
                <table>
                    <tr>
                        <td>
                            <label for="image">Render Link</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input class="input" type="text" name="image" id="image" placeholder="s3.amazonaws.com/world.growtopiagame.com/weeaboo.png" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>example: s3.amazonaws.com/world.growtopiagame.com/weeaboo.png</td>
                    </tr>
                    <tr>
                        <!-- <div class="input-group">
                            <label for="merek">merek</label>
                            <select class="input" name="merek_id" id="merek">
                                <?php foreach($merek as $mrk) : ?>
                                    <option value="<?php echo $mrk['id'] ?>"><?php echo $mrk["merek"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div> -->
                        <td>
                            <label for="char">Char Name</label>
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input class="input" type="text" name="char" id="char" placeholder="Enter Character Name" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="anime">Anime Name</label>
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input class="input" type="text" name="anime" id="anime" placeholder="Enter Anime Name" required autocomplete="off">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="world">World</label>
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input class="input" type="text" name="world" id="world" placeholder="Enter your Art World" required autocomplete="off">
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
                            <input type="hidden" name="user" id="user" value="<?= $_SESSION['user']['id'] ?>" />
                        </td>
                    </tr>
                </table>
                <div style="display: flex; justify-content: end;">
                    <button type="submit" name="submit">Upload</button>
                </div>
            </div>
		</form>
	</div>
	<script>
		const fileInput = document.querySelector('#image');
		const dropzone = document.querySelector('.group div')
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