<?php
require_once "db_connect.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$id]);
$order = $stmt->fetch();

$items = json_decode($order['cart_payload'], true);
?>
<!DOCTYPE html>
<html>
<head><title>Замовлення #<?= $id ?></title></head>
<body>

<h1>Замовлення #<?= $id ?></h1>

<p><strong>Ім’я:</strong> <?= htmlspecialchars($order['name']) ?></p>
<p><strong>Телефон:</strong> <?= htmlspecialchars($order['phone']) ?></p>
<p><strong>Коментар:</strong> <?= htmlspecialchars($order['message']) ?></p>

<h2>Страви</h2>
<ul>
<?php foreach ($items as $item): ?>
    <li><?= $item['name'] ?> — <?= $item['quantity'] ?> × <?= $item['price'] ?> грн</li>
<?php endforeach; ?>
</ul>

<p><strong>Сума:</strong> <?= $order['total_amount'] ?> грн</p>

<a href="admin.php">← Повернутись</a>

</body>
</html>
