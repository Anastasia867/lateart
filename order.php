<?php
session_start();
$cart = $_SESSION["cart"] ?? [];
$total = 0;
if (!empty($_SESSION["order_success"])) {
    echo "<section class='highlighted'><h2>Замовлення успішно оформлено 🎉</h2><p>Ми скоро звʼяжемося!</p></section>";
    unset($_SESSION["order_success"]);
}

foreach ($cart as $item) {
    $total += $item["price"] * $item["quantity"];
}

$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $delivery = trim($_POST["delivery"]);
    $time = trim($_POST["delivery_time"]);
    $payment = trim($_POST["payment"]);
    $msg = trim($_POST["message"]);

    if (!$cart) {
        $error = "Ваш кошик порожній.";
    } elseif (!preg_match('/^[A-Za-zА-Яа-яІіЇїЄєҐґ\'\- ]{2,30}$/u', $name)) {
        $error = "Ім’я може містити лише букви.";
    } elseif (!preg_match('/^\+?[0-9]{9,13}$/', $phone)) {
        $error = "Некоректний номер.";
    } elseif ($delivery === "courier" && !$time) {
        $error = "Оберіть час доставки.";
    } elseif (!$payment) {
        $error = "Оберіть спосіб оплати.";
    } else {
        $_SESSION["cart"] = [];
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформлення замовлення</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "header.php"; ?>

<header class="subpage-header">
    <h1>Оформлення замовлення</h1>
</header>

<main class="menu-page">

<?php if ($success): ?>

<section class="highlighted">
    <h2>Ваше замовлення прийнято 🎉</h2>
    <p>Ми скоро звʼяжемося!</p>
    <a href="menu.php" class="btn primary">Повернутись до меню</a>
</section>

<?php else: ?>

<section class="menu-section">

<?php if (!empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="save_order.php" class="contact-form">


    <label>Ваше ім’я</label>
    <input type="text" name="name" required>

    <label>Телефон</label>
    <input type="text" name="phone" required>

    <label>Спосіб доставки</label>
    <select name="delivery" required>
        <option value="">Оберіть…</option>
        <option value="courier">Кур’єр</option>
        <option value="pickup">Самовивіз</option>
        <option value="nova_poshta">Нова Пошта</option>
    </select>

    <div id="time-wrapper" style="display:none;">
        <label>Час доставки</label>
        <select name="delivery_time" id="delivery_time">
            <option value="">Оберіть час…</option>
            <option value="asap">Якомога швидше</option>
            <option>10:00–11:00</option>
            <option>11:00–12:00</option>
            <option>12:00–13:00</option>
            <option>13:00–14:00</option>
            <option>14:00–15:00</option>
            <option>15:00–16:00</option>
            <option>16:00–17:00</option>
            <option>17:00–18:00</option>
            <option>18:00–19:00</option>
            <option>19:00–20:00</option>
            <option>20:00–21:00</option>
        </select>
    </div>

    <label>Спосіб оплати</label>
    <select name="payment" required>
        <option value="">Оберіть…</option>
        <option value="cash">Готівка</option>
        <option value="card">Картка</option>
    </select>

    <label>Коментар</label>
    <textarea name="message"></textarea>

    <div class="order-cart-block">
        <h2 class="order-cart-title">Ваше замовлення</h2>

        <?php if (!$cart): ?>
            <p class="empty-order-text">Ваш кошик порожній 😢</p>
        <?php else: ?>

            <?php foreach ($cart as $item): ?>
                <div class="order-item-card">
                    <div class="order-item-info">
                        <h3><?= $item["name"] ?></h3>
                        <p>Кількість: <?= $item["quantity"] ?></p>
                        <p>Ціна: <?= $item["price"] ?> грн</p>
                    </div>
                    <div class="order-item-sum">
                        <?= $item["price"] * $item["quantity"] ?> грн
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="order-total-box">
                <p>Разом:</p>
                <h3><?= $total ?> грн</h3>
            </div>

        <?php endif; ?>
    </div>
    <input type="hidden" name="items" value='<?= json_encode($cart, JSON_UNESCAPED_UNICODE) ?>'>
<input type="hidden" name="items" value='<?= json_encode($cart, JSON_UNESCAPED_UNICODE) ?>'>


    <button type="submit" class="btn primary">Підтвердити замовлення</button>
</form>

</section>

<?php endif; ?>

</main>

<script src="script.js"></script>
</body>
</html>

