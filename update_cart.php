<?php
session_start();

$id = $_POST["id"];
$action = $_POST["action"];

if ($action === "plus") $_SESSION["cart"][$id]["quantity"]++;
if ($action === "minus") {
    $_SESSION["cart"][$id]["quantity"]--;
    if ($_SESSION["cart"][$id]["quantity"] < 1) unset($_SESSION["cart"][$id]);
}
if ($action === "delete") unset($_SESSION["cart"][$id]);
if ($action === "clear") $_SESSION["cart"] = [];

header("Location: cart.php");
exit;


