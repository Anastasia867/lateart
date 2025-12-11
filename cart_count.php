<?php
session_start();
if (!isset($_SESSION["cart"])) {
    echo 0;
    exit;
}

echo array_sum(array_column($_SESSION["cart"], "quantity"));
?>
