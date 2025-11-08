<?php
// order.php

$host = 'localhost';
$db   = 'lateart_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $product = $_POST['product'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;

    $stmt = $pdo->prepare("INSERT INTO orders (name, email, product, quantity) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $product, $quantity]);

    echo "Дякуємо, ваше замовлення прийнято!";
}
?>
