<?php
session_start();
require "db_connect.php";

$name = trim($_POST['name'] ?? "");
$email = trim($_POST['email'] ?? "");
$message = trim($_POST['message'] ?? "");

if ($name === "" || $email === "") {
    $_SESSION["contact_error"] = "Будь ласка, заповніть усі обовʼязкові поля.";
    header("Location: index.php#contact");
    exit;
}

$sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

$_SESSION["contact_success"] = "Ваше повідомлення надіслано!";
header("Location: index.php#contact");
exit;
?>
