<?php
ob_start();   
session_start();

// Перевірка обов'язкових полів
if (
    !isset($_POST["id"]) ||
    !isset($_POST["name"]) ||
    !isset($_POST["price"])
) {
    http_response_code(400);
    exit("Missing data");
}

$id = trim($_POST["id"]);
$name = trim($_POST["name"]);
$price = intval($_POST["price"]);

// Перевірка валідності
if ($id === "" || $id === "undefined") {
    http_response_code(400);
    exit("Invalid PRODUCT ID");
}

if ($name === "" || $name === "undefined") {
    http_response_code(400);
    exit("Invalid PRODUCT NAME");
}

if ($price <= 0) {
    http_response_code(400);
    exit("Invalid PRICE");
}

// Ініціалізація кошика
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// Додавання в кошик
if (!isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] = [
        "name" => $name,
        "price" => $price,
        "quantity" => 1
    ];
} else {
    $_SESSION["cart"][$id]["quantity"]++;
}

echo "OK";
?>



