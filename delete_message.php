<?php
session_start();
require "db_connect.php";

if (!isset($_POST['id'])) {
    header("Location: admin_messages.php");
    exit;
}

$id = intval($_POST['id']);

$sql = "DELETE FROM messages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION["msg_success"] = "Повідомлення видалено.";
} else {
    $_SESSION["msg_error"] = "Помилка при видаленні.";
}

header("Location: admin_messages.php");
exit;
