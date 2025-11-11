<?php
// cart.php — сторінка кошика LateArt Caffeine
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кошик — LateArt Caffeine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="subpage-header">
        <nav class="top-nav">
            <div class="logo">LateArt<span>.</span></div>
            <button class="nav-toggle" aria-label="Відкрити меню">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="index.php">Головна</a></li>
                <li><a href="menu.php">Меню</a></li>
                <li><a href="index.php#contact">Контакти</a></li>
            </ul>
        </nav>
        <div class="subpage-hero">
            <h1>Ваш кошик</h1>
            <p>Перевірте замовлення та вкажіть дані для доставки або самовивозу.</p>
        </div>
    </header>

    <main class="cart-page">
        <section class="cart-items">
            <h2>Обрані позиції</h2>
            <div class="cart-item">
                <div>
                    <h3>Флет Вайт «Нічний Київ»</h3>
                    <p>Авторський напій із солоною карамеллю та мигдальним молоком.</p>
                </div>
                <div class="cart-item-controls">
                    <div class="quantity">
                        <button aria-label="Зменшити">−</button>
                        <span>2</span>
                        <button aria-label="Збільшити">+</button>
                    </div>
                    <span class="price">196 грн</span>
                </div>
            </div>
            <div class="cart-item">
                <div>
                    <h3>Баскський чізкейк</h3>
                    <p>Карамелізована скоринка та ваніль мадагаскар.</p>
                </div>
                <div class="cart-item-controls">
                    <div class="quantity">
                        <button aria-label="Зменшити">−</button>
                        <span>1</span>
                        <button aria-label="Збільшити">+</button>
                    </div>
                    <span class="price">135 грн</span>
                </div>
            </div>
        </section>

        <aside class="cart-summary">
            <h2>Підсумок</h2>
            <div class="summary-row">
                <span>Сума</span>
                <span>331 грн</span>
            </div>
            <div class="summary-row">
                <span>Доставка</span>
                <span>Безкоштовно від 300 грн</span>
            </div>
            <div class="summary-total">
                <span>Разом</span>
                <span>331 грн</span>
            </div>
            <a href="order.php" class="btn primary">Оформити</a>
        </aside>
    </main>

    <section class="delivery-info">
        <div class="section-header">
            <h2>Як працює доставка</h2>
            <p>Працюємо щодня з 08:00 до 22:00. Самовивіз з кав'ярні або кур'єр у межах 5 км.</p>
        </div>
        <div class="info-grid">
            <div class="info-card">
                <h3>Час приготування</h3>
                <p>Зазвичай займає 15–20 хвилин. Про готовність повідомимо у месенджер.</p>
            </div>
            <div class="info-card">
                <h3>Оплата</h3>
                <p>Карткою онлайн, готівкою чи Apple Pay/Google Pay при отриманні.</p>
            </div>
            <div class="info-card">
                <h3>Лояльність</h3>
                <p>За кожні 100 грн — бонус 10 грн на наступне замовлення. Слідкуйте за акціями в застосунку.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> LateArt Caffeine. Усі права захищено.</p>
        <div class="footer-links">
            <a href="index.php">Головна</a>
            <a href="menu.php">Меню</a>
            <a href="https://t.me" target="_blank" rel="noopener">Telegram</a>
        </div>
    </footer>

    <script>
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelector('.nav-links');

        navToggle.addEventListener('click', () => {
            navToggle.classList.toggle('open');
            navLinks.classList.toggle('open');
        });
    </script>
</body>
</html>
