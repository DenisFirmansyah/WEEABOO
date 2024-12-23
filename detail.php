<?php 
require ('component/functions.php');
if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
} else {
    // Jika tidak login, redirect atau tampilkan pesan error
    $user_id = null; // atau arahkan ke halaman login
    
}
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT p.*, u.username FROM pixel p JOIN user u ON p.user_id = u.id WHERE p.id = ?";

$stmt = $connect->prepare($sql);
if (!$stmt) {
    die("Statement preparation failed: " . $connect->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
if (!$data) {
    die("No data found for ID $id.");
}

if ($data) {
    // Periksa apakah user yang login memiliki gambar ini
    $is_owner = $user_id && $data['user_id'] == $user_id;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEEABOO - Growtopia Anime Community</title>
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/public/detail.css">
</head>
<body>
    <?php
		include "component/header.php"
	?>
    <div class="detail-box">
        <img src="https://<?= $data["image"] ?>" alt="<?= $data["char"] ?>" class="detail-photo">
        <div style="padding-inline: 20px; padding-block: 20px;">
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
                <?php if (isset($is_owner) && $is_owner) { ?>
                <tr>
                    <td>
                        <a href="edit.php?id=<?= $data['id'] ?>">
                            <button style="padding-inline: 10px; padding-block: 4px">Edit</button>
                        </a>
                        <a href="delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?');">
                            <button style="padding-inline: 10px; padding-block: 4px">Delete</button>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</body>
</html>