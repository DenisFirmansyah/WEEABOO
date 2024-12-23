<?php
session_start();
require('component/functions.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user']['id'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "DELETE FROM pixel WHERE id = ? AND user_id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: dashboard.php");
} else {
    die("Delete failed or you don't have permission.");
}
exit;
