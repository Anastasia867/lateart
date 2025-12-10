<?php
session_start();

// доступ тільки для адміна
if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

// перевірка id
if (!isset($_GET["id"])) {
    die("Invalid request");
}

$id = intval($_GET["id"]);

// підключення до БД
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

// 🔥 видалення замовлення
$stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
$stmt->execute([$id]);

// назад у адмінку
header("Location: admin.php");
exit;
?>
