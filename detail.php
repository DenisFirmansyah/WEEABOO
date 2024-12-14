<?php 
require ('component/functions.php');
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT p.*, u.username FROM pixel p INNER JOIN user u ON p.user_id = u.id WHERE p.id = ?";

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
                <tr>
                    <?php if (isset($_SESSION['user'])) {?>
                        <button>
                            Edit
                        </button>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>