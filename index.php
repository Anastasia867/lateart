<?php
// index.php — головна сторінка кафе LateArt
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LateArt Caffeine — Кав'ярня з характером</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="hero">
        <nav class="top-nav">
            <div class="logo">LateArt<span>.</span></div>
            <button class="nav-toggle" aria-label="Відкрити меню">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="index.php#about">Про нас</a></li>
                <li><a href="menu.php">Меню</a></li>
                <li><a href="index.php#specials">Пропозиції</a></li>
                <li><a href="index.php#contact">Контакти</a></li>
                <li><a href="cart.php" class="cart-link">Кошик</a></li>
            </ul>
        </nav>
        <div class="hero-content">
            <h1>Кава з характером та історією</h1>
            <p>LateArt Caffeine — це авторські кавові мікси, сезонні десерти та атмосфера, що надихає. Завітайте на сніданок, візьміть каву з собою або зробіть онлайн-замовлення.</p>
            <div class="hero-actions">
                <a href="menu.php" class="btn primary">Перейти до меню</a>
                <a href="#contact" class="btn secondary">Забронювати столик</a>
            </div>
        </div>
        <div class="hero-media">
            <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=900&q=80" alt="Фірмова кава LateArt">
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
                    <p>Ми контролюємо кожний етап: від відбору зерна до профілю обсмаження. Завдяки цьому кожна чашка має стабільний смак і багатий аромат.</p>
                </article>
                <article class="about-card">
                    <h3>Сезонні пропозиції</h3>
                    <p>Щомісяця експериментуємо з новими напоями та десертами, надихаючись світовими тенденціями Specialty Coffee.</p>
                </article>
                <article class="about-card">
                    <h3>Комфорт для гостей</h3>
                    <p>Вільний простір, багато розеток, швидкісний Wi-Fi та фонова музика — все, аби ви могли працювати чи відпочивати.</p>
                </article>
            </div>
        </section>

        <section id="specials" class="section specials">
            <div class="section-header">
                <h2>Топ позиції цього тижня</h2>
                <p>Найпопулярніші напої та страви, які обирають наші гості.</p>
            </div>
            <div class="card-grid">
                <article class="menu-card">
                    <img src="https://images.unsplash.com/photo-1504753793650-d4a2b783c15e?auto=format&fit=crop&w=600&q=80" alt="Флет вайт з мигдальним молоком">
                    <div class="menu-card-body">
                        <span class="menu-tag">Авторська кава</span>
                        <h3>Флет Вайт «Нічний Київ»</h3>
                        <p>Подвійний еспресо з нотами темного шоколаду, мигдальне молоко та солона карамель.</p>
                        <div class="menu-card-footer">
                            <span class="price">98 грн</span>
                            <a href="order.php" class="btn tertiary">Замовити</a>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="https://images.unsplash.com/photo-1542326237-94b1c5a538d7?auto=format&fit=crop&w=600&q=80" alt="Матча латте">
                    <div class="menu-card-body">
                        <span class="menu-tag">Без кофеїну</span>
                        <h3>Матча-латте на вівсяному молоці</h3>
                        <p>Органічний порошок матча з Кіото, збитий з вівсяним молоком та медовим сиропом.</p>
                        <div class="menu-card-footer">
                            <span class="price">115 грн</span>
                            <a href="order.php" class="btn tertiary">Замовити</a>
                        </div>
                    </div>
                </article>
                <article class="menu-card">
                    <img src="https://images.unsplash.com/photo-1543362906-acfc16c67564?auto=format&fit=crop&w=600&q=80" alt="Чізкейк">
                    <div class="menu-card-body">
                        <span class="menu-tag">Десерти</span>
                        <h3>Баскський чізкейк</h3>
                        <p>Ніжний крем-чіз з ваніллю мадагаскар та карамелізованою скоринкою.</p>
                        <div class="menu-card-footer">
                            <span class="price">135 грн</span>
                            <a href="order.php" class="btn tertiary">Замовити</a>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="section experience">
            <div class="experience-media">
                <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=900&q=80" alt="Бариста готує каву">
            </div>
            <div class="experience-content">
                <h2>Зануртесь в атмосферу LateArt</h2>
                <p>Дегустаційні сети, майстер-класи з латте-арту та вечори з живою музикою — ми постійно створюємо нові враження для наших гостей. Слідкуйте за анонсами у соцмережах.</p>
                <ul class="feature-list">
                    <li>Свіжозмелені зерна щогодини</li>
                    <li>Веганські та безглютенові опції</li>
                    <li>Професійна команда бариста</li>
                </ul>
                <a href="menu.php#events" class="btn primary">Події тижня</a>
            </div>
        </section>

        <section id="contact" class="section contact">
            <div class="section-header">
                <h2>Зв'яжіться з нами</h2>
                <p>Залиште заявку на бронювання столика або співпрацю.</p>
            </div>
            <div class="contact-grid">
                <div class="contact-card">
                    <h3>Локація</h3>
                    <p>вул. Ярославів Вал, 23, Київ</p>
                    <p>Пн–Пт: 08:00–22:00<br>Сб–Нд: 09:00–23:00</p>
                    <p>Телефон: <a href="tel:+380501234567">+38 (050) 123-45-67</a></p>
                </div>
                <form class="contact-form" action="order.php" method="POST">
                    <div class="form-row">
                        <label for="name">Ім'я</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-row">
                        <label for="product">Бажане замовлення</label>
                        <input type="text" id="product" name="product" placeholder="Наприклад, Флет Вайт">
                    </div>
                    <div class="form-row">
                        <label for="quantity">Кількість</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                    </div>
                    <button type="submit" class="btn primary">Надіслати</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> LateArt Caffeine. Усі права захищено.</p>
        <div class="footer-links">
            <a href="https://www.instagram.com" target="_blank" rel="noopener">Instagram</a>
            <a href="https://www.facebook.com" target="_blank" rel="noopener">Facebook</a>
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
