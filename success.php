<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Замовлення оформлено</title>
<link rel="stylesheet" href="style.css">

<style>
/* Затемнення */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(2px);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
}

/* Вікно успіху */
.popup-window {
    background: #fff;
    padding: 40px;
    border-radius: 24px;
    width: 90%;
    max-width: 420px;
    text-align: center;
    box-shadow: 0 12px 40px rgba(0,0,0,0.15);
    animation: popupShow 0.35s ease-out;
}

/* Темна тема */
body.dark-theme .popup-window {
    background: #1e1d2b;
    color: #fff;
}

@keyframes popupShow {
    from { transform: scale(0.85); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

/* Кнопка */
.popup-window .btn {
    margin-top: 25px;
}
</style>
</head>

<body>

<?php include "header.php"; ?>

<div class="popup-overlay">
    <div class="popup-window">
        <h2>Замовлення успішно оформлено 🎉</h2>
        <p>Ми вже готуємо ваші смаколики!</p>
        <p style="opacity:0.7; font-size:14px;">Перехід до меню через <span id="timer">5</span>…</p>

        <a href="menu.php" class="btn primary">Повернутися до меню</a>
    </div>
</div>

<script>
// Лічильник 5 → 0
let time = 5;
let span = document.getElementById("timer");

let interval = setInterval(() => {
    time--;
    span.textContent = time;

    if (time === 0) {
        clearInterval(interval);
        window.location.href = "menu.php";
    }
}, 1000);
</script>

</body>
</html>

