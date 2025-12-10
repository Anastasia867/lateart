<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню — LateArt Caffeine</title>

    <link rel="stylesheet" href="style.css">
</head>
<body class="menu">
    <section class="menu-hero">
  <h1>Меню LateArt Caffeine</h1>
  <p>Обирайте, комбінуйте та відкривайте нові поєднання смаків.</p>
  <a href="#coffee" class="btn primary">Зробити замовлення</a>
</section>


    <main class="menu-page">
        <section id="coffee" class="menu-section">
            <div class="section-header">
                <h2>Кавові напої</h2>
                <p>Зерна обсмаження light та medium, авторські рецепти й альтернативні методи заварювання.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item" data-name="Еспресо «Single Origin»" data-price="58">
                    <figure>
                        <img src="images/espresso_single_origin.png" alt="Еспресо Single Origin">
                    </figure>
                    <div>
                        <h3>Еспресо «Single Origin»</h3>
                        <p>Гватемала Huehuetenango, ноти какао, карамелі та тропічних фруктів.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">58 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Капучино з фісташкою" data-price="89">
                    <figure>
                        <img src="images/kapuchino_fistashka.png" alt="Капучино з фісташкою">
                    </figure>
                    <div>
                        <h3>Капучино з фісташкою</h3>
                        <p>Подвійний еспресо, вершкове молоко, домашній фісташковий сироп.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">89 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Горіховий раф" data-price="105">
                    <figure>
                        <img src="images/raf.png" alt="Горіховий раф">
                    </figure>
                    <div>
                        <h3>Горіховий раф</h3>
                        <p>Сливки, ваніль, горіхи та тростинний цукор.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">105 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Глясе" data-price="125">
                    <figure>
                        <img src="images/glase.png" alt="Глясе">
                    </figure>
                    <div>
                        <h3>Глясе</h3>
                        <p>Глясе — це популярний мікс кави і морозива. Багато кавоманів люблять його за те, що це і десерт, і охолоджуючий напій одночасно.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">125 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
            </div>
        </section>

        <section id="brunch" class="menu-section">
            <div class="section-header">
                <h2>Сніданки та боули</h2>
                <p>Готуємо цілий день, аби ви могли відчути енергію правильного харчування.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item" data-name="Аво-тост з лососем" data-price="168">
                    <figure>
                        <img src="images/avo-tost.png" alt="Аво-тост з лососем">
                    </figure>
                    <div>
                        <h3>Аво-тост з лососем</h3>
                        <p>Цільнозерновий хліб, крем-чіз, слабосолений лосось, яйце пашот.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">168 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Скрємбл з трюфе" data-price="152">
                    <figure>
                        <img src="images/scramble_truffle.png" alt="Скрємбл з трюфельною олією">
                    </figure>
                    <div>
                        <h3>Скрємбл з трюфельною олією</h3>
                        <p>Фермерські яйця, пармезан, рукола та трюфельна олія.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">152 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Смузі боул «Манго-Матча»" data-price="132">
                    <figure>
                        <img src="images/smoothie_bowl_mango_matcha.png" alt="Смузі боул Манго-Матча">
                    </figure>
                    <div>
                        <h3>Смузі боул «Манго-Матча»</h3>
                        <p>Банан, манго, шпинат, матча, кокосовий йогурт, гранола власного приготування.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">132 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
            </div>
        </section>

        <section id="desserts" class="menu-section">
            <div class="section-header">
                <h2>Десерти та випічка</h2>
                <p>Щодня випікаємо свіжі десерти. Також можна оформити попереднє замовлення на торти.</p>
            </div>
            <div class="menu-list">
                <article class="menu-item" data-name="Тарт «Солона карамель»" data-price="120">
                    <figure>
                        <img src="images/tart_solana_karamel.png" alt="Тарт Солона карамель">
                    </figure>
                    <div>
                        <h3>Тарт «Солона карамель»</h3>
                        <p>Мигдалевий тарт, карамель з фльор-де-сель та вершковий крем.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">120 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Мусовий торт чорничний" data-price="148">
                    <figure>
                        <img src="images/chornichnyi_tort.png" alt="Мусовий торт чорничний">
                    </figure>
                    <div>
                        <h3>Мусовий торт чорничний</h3>
                        <p>На кокосовій бісквітній основі з прошарком чорничного конфі.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">148 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
                </article>
                <article class="menu-item" data-name="Макарон сет 6 шт." data-price="210">
                    <figure>
                        <img src="images/makaron_set.png" alt="Макарон сет 6 шт.">
                    </figure>
                    <div>
                        <h3>Макарон сет 6 шт.</h3>
                        <p>Фісташка, лайм-базилік, шоколад-м'ята, малина, ваніль, фундук.</p>
                    </div>
                    <div class="menu-cta">
                        <span class="price">210 грн</span>
                        <button class="btn add-btn" data-add-to-cart>Додати в кошик</button>
                    </div>
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

    <script src="script.js"></script>
</body>
</html>
