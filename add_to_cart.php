<?php
session_start();

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (!isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] = [
        "name" => $name,
        "price" => $price,
        "quantity" => 1
    ];
} else {
    $_SESSION["cart"][$id]["quantity"]++;
}

header("Location: " . $_SERVER["HTTP_REFERER"]);
exit;

