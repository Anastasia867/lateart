<?php
session_start();

if (!isset($_SESSION["cart"])) {
    echo 0;
    exit;
}

$count = 0;
foreach ($_SESSION["cart"] as $item) {
    $count += $item["quantity"];
}

echo $count;
