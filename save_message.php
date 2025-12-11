<?php
session_start();
require "db_connect.php";

function clean($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

$name = clean($_POST["name"] ?? "");
$email = clean($_POST["email"] ?? "");
$message = clean($_POST["message"] ?? "");

if ($message === "" || $name === "") {
    echo "ERROR";
    exit;
}

$sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

echo "OK";
exit;
?>
