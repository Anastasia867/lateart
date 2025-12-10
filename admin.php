<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

$host = 'localhost';
$db   = 'lateart_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// Отримуємо всі замовлення
$stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Адмін — Замовлення</title>

<style>
table { width:100%; border-collapse: collapse; margin-top:20px;}
th,td { padding:12px; border-bottom:1px solid #ccc; vertical-align: top;}
th { background:#eee; }
pre { background:#f7f7f7; padding:8px; border-radius:6px; }

/* Бейджі статусів */
.status {
    padding: 6px 12px;
    border-radius: 6px;
    color: #fff;
    font-weight: bold;
    display: inline-block;
    font-size: 14px;
}
.status-new { background:#007bff; }
.status-work { background:#ff9800; }
.status-done { background:#4caf50; }
.status-cancel { background:#e53935; }

/* Кнопки зміни статусів */
.action-btn {
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color:white;
    font-size: 13px;
    margin-right:4px;
}
.btn-new { background:#007bff; }
.btn-work { background:#ff9800; }
.btn-done { background:#4caf50; }
.btn-cancel { background:#e53935; }
.btn-delete {
    background: #000;
}
.btn-delete:hover {
    opacity: 0.8;
}

.action-btn:hover { opacity:0.8; }
</style>
</head>
<body>

<h2>Адмін-панель — Замовлення</h2>

<p>
Ви увійшли як <strong><?= $_SESSION["admin_username"] ?></strong>
 | <a href="logout.php">Вийти</a>
</p>

<table>
<tr>
    <th>ID</th>
    <th>Ім’я</th>
    <th>Телефон</th>
    <th>Доставка</th>
    <th>Оплата</th>
    <th>Коментар</th>
    <th>Товари</th>
    <th>Сума</th>
    <th>Статус</th>
    <th>Дії</th>
    <th>Дата</th>
</tr>

<?php foreach ($orders as $o): 
    $items = json_decode($o["items"], true);
?>
<tr>
    <td><?= $o["id"] ?></td>
    <td><?= htmlspecialchars($o["name"]) ?></td>
    <td><?= htmlspecialchars($o["phone"]) ?></td>
    <td><?= htmlspecialchars($o["delivery_method"]) ?></td>
    <td><?= htmlspecialchars($o["payment_method"]) ?></td>
    <td><?= htmlspecialchars($o["message"] ?: "-") ?></td>

    <td><pre><?= json_encode($items, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?></pre></td>

    <td><?= $o["total_amount"] ?> грн</td>

    <td>
        <?php
        echo match ($o["status"]) {
            "new"    => "<span class='status status-new'>Нове</span>",
            "work"   => "<span class='status status-work'>В роботі</span>",
            "done"   => "<span class='status status-done'>Виконано</span>",
            "cancel" => "<span class='status status-cancel'>Скасовано</span>",
            default  => "<span class='status status-new'>Нове</span>",
        };
        ?>
    </td>

    <td>
        <a class="action-btn btn-new" href="update_status.php?id=<?= $o['id'] ?>&s=new">Нове</a>
        <a class="action-btn btn-work" href="update_status.php?id=<?= $o['id'] ?>&s=work">В роботі</a>
        <a class="action-btn btn-done" href="update_status.php?id=<?= $o['id'] ?>&s=done">Готово</a>
        <a class="action-btn btn-cancel" href="update_status.php?id=<?= $o['id'] ?>&s=cancel">Скасувати</a>
        <a class="action-btn btn-delete" 
       href="delete_order.php?id=<?= $o['id'] ?>" 
       onclick="return confirm('Точно видалити це замовлення?')">
       Видалити
         </a>
    </td>

    <td><?= $o["created_at"] ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>

