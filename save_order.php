<?php
session_start();
require "db_connect.php"; // створює $conn

$name     = $_POST['name'];
$phone    = $_POST['phone'];
$delivery = $_POST['delivery'];
$time     = $_POST['delivery_time'] ?? "";
$payment  = $_POST['payment'];
$message  = $_POST['message'] ?? "";

$items = $_POST['items'];   // JSON
$total = $_POST['total'];   // число

// Додаємо час доставки до повідомлення
if ($delivery === "courier") {
    $message .= " | Час доставки: " . $time;
}

$sql = "INSERT INTO orders 
(name, phone, message, items, total_amount, delivery_method, payment_method)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssiss",
    $name,
    $phone,
    $message,
    $items,
    $total,
    $delivery,
    $payment
);

$stmt->execute();

// Очищаємо кошик
$_SESSION["cart"] = [];
$_SESSION["order_success"] = true;

header("Location: order.php");
exit;
?>



