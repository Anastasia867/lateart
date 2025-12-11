<?php
session_start();

$cart = $_SESSION["cart"] ?? [];
$total = 0;

foreach ($cart as $item) {
    $total += $item["price"] * $item["quantity"];
}

// Доставка рахується завжди, навіть якщо кошик порожній
$delivery_cost = ($total < 300 && $total > 0) ? 40 : 0;
$final_sum = $total + $delivery_cost;
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кошик — LateArt Caffeine</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "header.php"; ?>

<header class="subpage-header">
    <h1>Ваш кошик</h1>
    <p class="cart-subtitle">Перевірте замовлення перед оформленням.</p>
</header>

<main class="cart-page">

<section class="cart-items">
    <h2>Обрані позиції</h2>

<?php if (empty($_SESSION["cart"])): ?>

    <div class="cart-empty-block">
        <p class="empty-text">Ваш кошик порожній 😢</p>
        <a href="menu.php" class="btn primary">Перейти до меню</a>
    </div>

<?php else: ?>

    <form action="update_cart.php" method="POST">
        <button type="submit" name="action" value="clear" class="clear-cart-btn">
            🧹 Очистити кошик
        </button>
    </form>

    <?php foreach ($_SESSION["cart"] as $id => $p): 
        $sum = $p["price"] * $p["quantity"];
        $total += $sum;
    ?>
        <div class="cart-card">
            <div class="cart-card-info">
                <h3><?= $p["name"] ?></h3>
                <p class="cart-price">Ціна: <?= $p["price"] ?> грн</p>
                <p class="cart-sum"><b><?= $sum ?> грн</b></p>
            </div>

            <div class="cart-controls">
                <form action="update_cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="action" value="minus">
                    <button class="qty-btn minus-btn">–</button>
                </form>

                <span class="qty-number"><?= $p["quantity"] ?></span>

                <form action="update_cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="action" value="plus">
                    <button class="qty-btn plus-btn">+</button>
                </form>

                <form action="update_cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="hidden" name="action" value="delete">
                    <button class="delete-btn">×</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

<?php
$delivery_cost = ($total < 300) ? 40 : 0;
$final_sum = $total + $delivery_cost;
?>

    <div class="cart-total-block">
        <p class="total-text">Разом:</p>
        <p class="total-amount"><?= $final_sum ?> грн</p>
    </div>

    <a href="order.php" class="btn primary">Оформити замовлення</a>

<?php endif; ?>
</section>

<div class="cart-summary">
    <div class="summary-row">
        <span>Сума</span>
        <span><?= $total ?> грн</span>
    </div>

    <div class="summary-row">
        <span>Доставка</span>
        <?= $delivery_cost > 0 ? "<span>{$delivery_cost} грн</span>" : "<span style='color:#6a4df1;'>0 грн</span>" ?>
    </div>

    <div class="summary-total">
        <span>Разом</span>
        <span><?= $final_sum ?> грн</span>
    </div>
</div>

</main>

<script src="script.js"></script>
</body>
</html>


