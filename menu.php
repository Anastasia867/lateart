<?php
// menu.php — розширене меню LateArt Caffeine
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню — LateArt Caffeine</title>
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
                <li><a href="#coffee">Кава</a></li>
                <li><a href="#brunch">Сніданки</a></li>
                <li><a href="#desserts">Десерти</a></li>
                <li><a href="cart.php" class="cart-link">Кошик</a></li>
            </ul>
        </nav>
        <div class="subpage-hero">
            <h1>Меню LateArt Caffeine</h1>
            <p>Обирайте, комбінуйте та відкривайте нові поєднання смаків.</p>
            <a href="order.php" class="btn primary">Зробити замовлення</a>
        </div>
    </header>

    <main class="menu-page">
        <section id="coffee" class="menu-section">
            <div class="section-header">
                <h2>Кавові напої</h2>
                <p>Зерна обсмаження light та medium, авторські рецепти й альтернативні методи заварювання.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item">
                    <div>
                        <h3>Еспресо «Single Origin»</h3>
                        <p>Гватемала Huehuetenango, ноти какао, карамелі та тропічних фруктів.</p>
                    </div>
                    <span class="price">58 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Капучино з фісташкою</h3>
                        <p>Подвійний еспресо, вершкове молоко, домашній фісташковий сироп.</p>
                    </div>
                    <span class="price">89 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Раф чорничний</h3>
                        <p>Сливки, ваніль, пюре чорниці та тростинний цукор.</p>
                    </div>
                    <span class="price">105 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>V60 Ефіопія Гуджі</h3>
                        <p>Аромат журавлини, жасмину та білого винограду. Приготування 4 хв.</p>
                    </div>
                    <span class="price">125 грн</span>
                </article>
            </div>
        </section>

        <section id="brunch" class="menu-section">
            <div class="section-header">
                <h2>Сніданки та боули</h2>
                <p>Готуємо цілий день, аби ви могли відчути енергію правильного харчування.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item">
                    <div>
                        <h3>Абоут тост з лососем</h3>
                        <p>Цільнозерновий хліб, крем-чіз, слабосолений лосось, яйце пашот.</p>
                    </div>
                    <span class="price">168 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Скрємбл з трюфельною олією</h3>
                        <p>Фермерські яйця, пармезан, рукола та трюфельна олія.</p>
                    </div>
                    <span class="price">152 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Смузі боул «Манго-Матча»</h3>
                        <p>Банан, манго, шпинат, матча, кокосовий йогурт, гранола власного приготування.</p>
                    </div>
                    <span class="price">132 грн</span>
                </article>
            </div>
        </section>

        <section id="desserts" class="menu-section">
            <div class="section-header">
                <h2>Десерти та випічка</h2>
                <p>Щодня випікаємо свіжі десерти. Також можна оформити попереднє замовлення на торти.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item">
                    <div>
                        <h3>Тарт «Солона карамель»</h3>
                        <p>Мигдалевий тарт, карамель з фльор-де-сель та вершковий крем.</p>
                    </div>
                    <span class="price">120 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Мусовий торт чорничний</h3>
                        <p>На кокосовій бісквітній основі з прошарком чорничного конфі.</p>
                    </div>
                    <span class="price">148 грн</span>
                </article>
                <article class="menu-item">
                    <div>
                        <h3>Макарон сет 6 шт.</h3>
                        <p>Пісташка, лайм-базилік, шоколад-м'ята, малина, ваніль, фундук.</p>
                    </div>
                    <span class="price">210 грн</span>
                </article>
            </div>
        </section>

        <section id="events" class="menu-section highlighted">
            <div class="section-header">
                <h2>Події тижня</h2>
                <p>Спеціальні івенти та пропозиції, які можна забронювати онлайн.</p>
            </div>
            <div class="events-grid">
                <article class="event-card">
                    <h3>Латте-арт майстер-клас</h3>
                    <p>Субота, 11:00 — навчимо малювати серця, тюльпани та розетти. У вартість входять три чашки кави та десерт.</p>
                    <span class="price">650 грн</span>
                    <a href="order.php" class="btn tertiary">Забронювати</a>
                </article>
                <article class="event-card">
                    <h3>Вечір дегустації фільтр-кави</h3>
                    <p>Неділя, 18:00 — 5 видів світлого обсмаження з Колумбії, Кенії, Коста-Ріки.</p>
                    <span class="price">520 грн</span>
                    <a href="order.php" class="btn tertiary">Зареєструватись</a>
                </article>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> LateArt Caffeine. Усі права захищено.</p>
        <div class="footer-links">
            <a href="index.php#contact">Контакти</a>
            <a href="cart.php">Кошик</a>
            <a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a>
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
