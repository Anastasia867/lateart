<?php
session_start();

// ПІДКЛЮЧЕННЯ ДО БД (PDO)
$host = 'localhost';
$db   = 'lateart_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Помилка підключення до БД: " . $e->getMessage());
}

$error = "";

// 🔐 АВТОРИЗАЦІЯ
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // Отримуємо адміна з бази
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin["password_hash"])) {

        // СТВОРЮЄМО СЕСІЮ
        $_SESSION["admin_id"] = $admin["id"];
        $_SESSION["admin_username"] = $admin["username"];

        header("Location: admin.php");
        exit;

    } else {
        $error = "Невірний логін або пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід в адмінку</title>
</head>
<body>

<h2>Вхід адміністратора</h2>

<?php if ($error): ?>
<p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Логін:</label>
    <input type="text" name="username" required>

    <label>Пароль:</label>
    <input type="password" name="password" required>

    <button type="submit">Увійти</button>
</form>

</body>
</html>
