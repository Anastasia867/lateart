<?php
session_start();

// Кошик
$cart = $_SESSION["cart"] ?? [];
$total = 0;

foreach ($cart as $item) {
    $total += $item["price"] * $item["quantity"];
}

// Базова доставка (буде змінена JS при виборі доставки)
$delivery_cost = ($total < 300) ? 40 : 0;
$final_sum = $total + $delivery_cost;
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

<?php if (!empty($_SESSION["order_success"])): ?>
<div id="toast" class="toast show">
    <p>Ваше замовлення успішно оформлено! Ми скоро звʼяжемося ☕💜</p>
</div>

<script>
setTimeout(() => {
    document.getElementById("toast")?.classList.remove("show");
    fetch("clear_success.php");
}, 3500);
</script>
<?php endif; ?>

<?php include "header.php"; ?>

<header class="subpage-header">
    <h1>Оформлення замовлення</h1>
</header>

<main class="menu-page">

<?php if (empty($cart)): ?>
    <div class="highlighted" style="padding:40px; text-align:center;">
        <h2>Ваш кошик порожній 😢</h2>
        <p>Додайте страви та напої, щоб оформити замовлення.</p>
        <a href="menu.php" class="btn primary">Перейти до меню</a>
    </div>
</main>
</body>
</html>
<?php exit; ?>
<?php endif; ?>

<section class="menu-section">

<form method="POST" action="save_order.php" class="contact-form" id="orderForm">

    <!-- Ім’я -->
    <label>Ваше ім’я</label>
    <input type="text" name="name" id="name" required>
    <small id="nameHint" class="hint">Ім’я повинно містити тільки українські літери (2–30 символів).</small>

    <!-- Телефон -->
    <label>Телефон</label>
    <input type="text" name="phone" id="phone" required placeholder="+380 XX XXX XX XX">
    <small id="phoneHint" class="hint">Телефон у форматі +380 XX XXX XX XX.</small>

    <!-- Спосіб доставки -->
    <label>Спосіб доставки</label>
    <select name="delivery" id="delivery" required>
        <option value="">Оберіть…</option>
        <option value="courier">Кур’єр</option>
        <option value="pickup">Самовивіз</option>
    </select>

    <!-- Час доставки -->
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

    <!-- Спосіб оплати -->
    <label>Спосіб оплати</label>
    <select name="payment" id="payment" required>
        <option value="">Оберіть…</option>
        <option value="cash">Готівка</option>
        <option value="card">Картка</option>
    </select>

    <!-- Коментар -->
    <label>Коментар</label>
    <textarea name="message"></textarea>

    <!-- Список товарів -->
    <div class="order-cart-block">
        <h2 class="order-cart-title">Ваше замовлення</h2>

        <?php foreach ($cart as $item): ?>
            <div class="order-item-card">
                <div class="order-item-info">
                    <h3><?= htmlspecialchars($item["name"]) ?></h3>
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
            <h3 id="finalSum"><?= $final_sum ?> грн</h3>
        </div>
    </div>

    <input type="hidden" name="items" value='<?= json_encode(array_values($cart), JSON_UNESCAPED_UNICODE) ?>'>
    <input type="hidden" name="total" value="<?= $total ?>">

    <button type="submit" class="btn primary" id="submitBtn" disabled>
        Підтвердити замовлення
    </button>

</form>

<script>
// ======== ВАЛІДАЦІЯ ========
const nameInput = document.getElementById("name");
const phoneInput = document.getElementById("phone");
const deliverySelect = document.getElementById("delivery");
const paymentSelect = document.getElementById("payment");
const submitBtn = document.getElementById("submitBtn");

const finalSumEl = document.getElementById("finalSum");
const total = <?= $total ?>;

// Функція оновлення доставки
function updateFinalSum() {
    if (deliverySelect.value === "pickup") {
        finalSumEl.textContent = total + " грн";
    } else if (deliverySelect.value === "courier") {
        let d = total < 300 ? 40 : 0;
        finalSumEl.textContent = (total + d) + " грн";
    }
}

// Показати час доставки лише при кур’єрі
deliverySelect.addEventListener("change", () => {
    document.getElementById("time-wrapper").style.display =
        deliverySelect.value === "courier" ? "block" : "none";

    updateFinalSum();
});

// Телефон
function formatPhone(value) {
    let digits = value.replace(/\D/g, "");
    if (!digits.startsWith("380")) digits = "380" + digits;
    digits = digits.slice(0, 12);

    let f = "+380";
    if (digits.length > 3) f += " " + digits.slice(3, 5);
    if (digits.length > 5) f += " " + digits.slice(5, 8);
    if (digits.length > 8) f += " " + digits.slice(8, 10);
    if (digits.length > 10) f += " " + digits.slice(10, 12);
    return f;
}

function validatePhone() {
    phoneInput.value = formatPhone(phoneInput.value);
    const clean = phoneInput.value.replace(/\D/g, "");
    return /^380(39|50|63|66|67|68|91|92|93|94|95|96|97|98|99)\d{7}$/.test(clean);
}

function validateName() {
    return /^[А-Яа-яІіЇїЄєҐґ' -]{2,30}$/.test(nameInput.value.trim());
}

function updateButtonState() {
    const ok =
        validateName() &&
        validatePhone() &&
        deliverySelect.value !== "" &&
        paymentSelect.value !== "";

    submitBtn.disabled = !ok;
    submitBtn.classList.toggle("enabled", ok);
}

nameInput.addEventListener("input", updateButtonState);
phoneInput.addEventListener("input", updateButtonState);
deliverySelect.addEventListener("change", updateButtonState);
paymentSelect.addEventListener("change", updateButtonState);
</script>

<script src="script.js"></script>
</body>
</html>


