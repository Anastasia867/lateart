<?php 
session_start();
require "db_connect.php";

function clean($str) {
    return htmlspecialchars(strip_tags(trim($str)), ENT_QUOTES, 'UTF-8');
}

$name     = clean($_POST['name'] ?? "");
$phone    = clean($_POST['phone'] ?? "");
$delivery = clean($_POST['delivery'] ?? "");
$time     = clean($_POST['delivery_time'] ?? "");
$payment  = clean($_POST['payment'] ?? "");
$message  = clean($_POST['message'] ?? "");
$items    = $_POST['items'] ?? "";
$total    = intval($_POST['total'] ?? 0);

// Перетворюємо JSON у масив
$decoded_items = json_decode($items, true);

// Перевіряємо чи це коректний масив
if (!is_array($decoded_items) || count($decoded_items) === 0) {
    $_SESSION["order_error"] = "Кошик порожній або пошкоджений.";
    header("Location: order.php");
    exit;
}

// Перекодуємо назад у чистий JSON
$items_json = json_encode($decoded_items, JSON_UNESCAPED_UNICODE);

// Валідації
if ($name === "") {
    $_SESSION["order_error"] = "Некоректне імʼя.";
    header("Location: order.php");
    exit;
}

if ($phone === "") {
    $_SESSION["order_error"] = "Некоректний телефон.";
    header("Location: order.php");
    exit;
}

if ($delivery === "") {
    $_SESSION["order_error"] = "Оберіть спосіб доставки.";
    header("Location: order.php");
    exit;
}

if ($delivery === "courier" && $time === "") {
    $_SESSION["order_error"] = "Оберіть час доставки.";
    header("Location: order.php");
    exit;
}

if ($payment === "") {
    $_SESSION["order_error"] = "Оберіть спосіб оплати.";
    header("Location: order.php");
    exit;
}

// Запис у базу
$sql = "INSERT INTO orders (name, phone, message, items, total_amount, delivery_method, payment_method) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssiss", $name, $phone, $message, $items_json, $total, $delivery, $payment);
$stmt->execute();

// Очищення кошика
$_SESSION["cart"] = [];
$_SESSION["order_success"] = true;

header("Location: order.php");
exit;



