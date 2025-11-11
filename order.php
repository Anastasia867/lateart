<?php
// order.php — обробка замовлення та зворотного зв'язку LateArt Caffeine
$host    = 'localhost';
$db      = 'lateart_db';
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$message = '';
$error   = '';
$orderData = [
    'name'     => '',
    'email'    => '',
    'product'  => '',
    'quantity' => 1,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderData['name']     = trim($_POST['name'] ?? '');
    $orderData['email']    = trim($_POST['email'] ?? '');
    $orderData['product']  = trim($_POST['product'] ?? '');
    $orderData['quantity'] = (int) ($_POST['quantity'] ?? 1);

    if ($orderData['name'] && filter_var($orderData['email'], FILTER_VALIDATE_EMAIL)) {
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            $stmt = $pdo->prepare('INSERT INTO orders (name, email, product, quantity) VALUES (?, ?, ?, ?)');
            $stmt->execute([
                $orderData['name'],
                $orderData['email'],
                $orderData['product'],
                max(1, $orderData['quantity']),
            ]);
            $message = 'Дякуємо, ваше замовлення прийнято! Ми зв\'яжемося з вами протягом 10 хвилин для підтвердження.';
        } catch (PDOException $e) {
            $error = 'Помилка під час збереження замовлення. Спробуйте пізніше.';
        }
    } else {
        $error = 'Будь ласка, перевірте коректність контактних даних.';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Замовлення — LateArt Caffeine</title>
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
                <li><a href="cart.php">Кошик</a></li>
            </ul>
        </nav>
        <div class="subpage-hero">
            <h1>Оформлення замовлення</h1>
            <p>Заповніть форму, і наша команда підтвердить замовлення найближчим часом.</p>
        </div>
    </header>

    <main class="menu-page">
        <?php if ($message): ?>
            <section class="highlighted">
                <div class="section-header">
                    <h2><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p>Номер телефону для уточнень: <a href="tel:+380501234567">+38 (050) 123-45-67</a>.</p>
                </div>
                <div class="info-grid">
                    <div class="info-card">
                        <h3>Ваше ім'я</h3>
                        <p><?php echo htmlspecialchars($orderData['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="info-card">
                        <h3>Email</h3>
                        <p><?php echo htmlspecialchars($orderData['email'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <div class="info-card">
                        <h3>Замовлення</h3>
                        <p><?php echo $orderData['product'] ? htmlspecialchars($orderData['product'], ENT_QUOTES, 'UTF-8') : 'Менеджер уточнить позиції.'; ?></p>
                    </div>
                    <div class="info-card">
                        <h3>Кількість</h3>
                        <p><?php echo max(1, (int) $orderData['quantity']); ?></p>
                    </div>
                </div>
                <div class="hero-actions" style="margin-top: 32px;">
                    <a href="menu.php" class="btn primary">Продовжити перегляд меню</a>
                    <a href="index.php" class="btn secondary">Повернутися на головну</a>
                </div>
            </section>
        <?php else: ?>
            <section class="menu-section">
                <div class="section-header">
                    <h2>Заповніть дані</h2>
                    <p>Укажіть ваші контактні дані й позиції замовлення. Ми підтвердимо час доставки чи самовивозу.</p>
                </div>
                <?php if ($error): ?>
                    <div class="info-card" style="border-left: 6px solid #ff5c5c;">
                        <h3>Упс! Щось пішло не так.</h3>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                <?php endif; ?>
                <form class="contact-form" action="order.php" method="POST">
                    <div class="form-row">
                        <label for="name">Ім'я</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($orderData['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($orderData['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>
                    <div class="form-row">
                        <label for="product">Що бажаєте замовити?</label>
                        <input type="text" id="product" name="product" value="<?php echo htmlspecialchars($orderData['product'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Наприклад, Капучино та чізкейк">
                    </div>
                    <div class="form-row">
                        <label for="quantity">Кількість порцій</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="<?php echo max(1, (int) $orderData['quantity']); ?>">
                    </div>
                    <button type="submit" class="btn primary">Надіслати</button>
                </form>
            </section>
        <?php endif; ?>
    </main>

    <footer class="footer">
        <p>© <?php echo date('Y'); ?> LateArt Caffeine. Усі права захищено.</p>
        <div class="footer-links">
            <a href="index.php">Головна</a>
            <a href="menu.php">Меню</a>
            <a href="cart.php">Кошик</a>
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
