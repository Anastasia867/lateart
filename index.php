<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LateArt Caffeine — Кав'ярня з характером</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="home">

<?php include "header.php"; ?>

<?php if (!empty($_SESSION["contact_success"])): ?>
<div class="toast show">
    <p><?= $_SESSION["contact_success"] ?></p>
</div>

<script>
setTimeout(() => {
    document.querySelector(".toast")?.classList.remove("show");
}, 3000);
</script>

<?php unset($_SESSION["contact_success"]); endif; ?>

<header class="hero">

    <div class="hero-content">
        <h1>Кава з характером та історією</h1>
        <p>
            LateArt Caffeine — це авторські кавові мікси, сезонні десерти та атмосфера, що надихає.
            Завітайте на сніданок, візьміть каву з собою або оформіть онлайн-замовлення.
        </p>

        <div class="hero-actions">
            <a href="menu.php" class="btn primary">Перейти до меню</a>
            <a href="cart.php" class="btn tertiary">Перейти в кошик</a>
        </div>
    </div>

    <div class="hero-media">
        <img src="images/cava_gol.png" alt="Кава LateArt">
    </div>
</header>


<main>

<section id="about" class="section about">
    <div class="section-header">
        <h2>LateArt — більше, ніж кава</h2>
        <p>Ми поєднуємо локальні обсмажування, авторські рецепти та сервіс, що запам'ятовується.</p>
    </div>

    <div class="about-grid">
        <article class="about-card">
            <h3>Обсмажка власного виробництва</h3>
            <p>Контроль кожного етапу від зерна до чашки.</p>
        </article>

        <article class="about-card">
            <h3>Сезонні пропозиції</h3>
            <p>Новинки меню щомісяця.</p>
        </article>

        <article class="about-card">
            <h3>Комфорт для гостей</h3>
            <p>Wi-Fi, музика, затишок та ідеальна атмосфера.</p>
        </article>
    </div>
</section>


<section id="specials" class="section specials">

    <div class="section-header">
        <h2>Топ позиції цього тижня</h2>
        <p>Наші найулюбленіші напої та десерти.</p>
    </div>

    <div class="card-grid">

        <!-- Флет Вайт -->
        <article class="menu-card">
            <img src="images/fletwhite.png" alt="Флет Вайт">
            <div class="menu-card-body">
                <span class="menu-tag">Авторська кава</span>
                <h3>Флет Вайт «Нічний Київ»</h3>
                <p>Темний шоколад, мигдальне молоко, солона карамель.</p>

                <div class="menu-card-footer">
                    <span class="price">98 грн</span>

                    <button class="btn tertiary add-btn"
        data-add-to-cart
        data-id="11"
        data-name="Флет Вайт «Нічний Київ»"
        data-price="98">
    Замовити
</button>

                </div>
            </div>
        </article>

        <!-- Матча -->
        <article class="menu-card">
            <img src="images/matcha.png" alt="Матча">
            <div class="menu-card-body">
                <span class="menu-tag">Без кофеїну</span>
                <h3>Матча-латте</h3>
                <p class="muted">Японський зелений чай матча, збите молоко, мед або ваніль за бажанням.</p>

                <div class="menu-card-footer">
                    <span class="price">115 грн</span>

                    <button class="btn tertiary add-btn"
        data-add-to-cart
        data-id="12"
        data-name="Матча-латте"
        data-price="115">
    Замовити
</button>

                </div>
            </div>
        </article>

        <!-- Чізкейк -->
        <article class="menu-card">
            <img src="images/chiscake.png" alt="Чізкейк">
            <div class="menu-card-body">
                <span class="menu-tag">Десерти</span>
                <h3>Баскський чізкейк</h3>
                <p class="muted">Вершковий сир, яйця, цукор, вершки на хрусткій основі з печива. </p>
                <div class="menu-card-footer">
                    <span class="price">135 грн</span>

                    <button class="btn tertiary add-btn"
    data-add-to-cart
    data-id="13"
    data-name="Баскський чізкейк"
    data-price="135">
    Замовити
</button>


                </div>
            </div>
        </article>

    </div>
</section>


<section id="contact" class="section contact">
    <div class="section-header">
        <h2>Зв'яжіться з нами</h2>
        <p>Залиште заявку на бронювання або оформіть індивідуальне замовлення.</p>
    </div>

    <div class="contact-grid">

        <div class="contact-card">
            <h3>Локація</h3>
            <p>м. Черкаси, вул. Ярославів Вал, 27</p>
            <p>Пн–Пт: 08:00–20:00<br>Сб–Нд: 09:00–19:00</p>
            <p>Телефон: <a href="tel:+380508734156">+38 (050) 873-41-56</a></p>
        </div>

        <form id="contactForm" class="contact-form" method="POST" autocomplete="off">


            <div class="form-row">
                <label for="name">Ім'я</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-row">
                <label for="message">Коментар</label>
                <textarea id="message" name="message" rows="3" placeholder="Ваше повідомлення"></textarea>
            </div>

            <button type="submit" class="btn primary">Надіслати</button>
        </form>
    </div>
</section>

</main>

<?php include "footer.php"; ?>

<script src="script.js"></script>
</body>
</html>

