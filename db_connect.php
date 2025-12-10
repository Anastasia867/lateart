<?php
$conn = new mysqli("localhost", "root", "", "lateart_db");

if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}
?>