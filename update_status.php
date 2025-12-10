<?php
session_start();
if (!isset($_SESSION["admin_id"])) exit("Access denied");

$host = 'localhost';
$db   = 'lateart_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

$id = $_GET["id"] ?? 0;
$status = $_GET["s"] ?? "";

$allowed = ["new", "work", "done", "cancel"];


if (!in_array($status, $allowed)) die("Invalid status");

$stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
$stmt->execute([$status, $id]);

header("Location: admin.php");
exit;
