<?php
$host = "localhost"; 
$user = "root";       
$pass = "";           
$db = "lateart_db";   

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Помилка підключення: " . $conn->connect_error);
} else {
  echo "Успішне підключення до бази даних!";
}
?>
