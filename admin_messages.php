<?php
require "db_connect.php";

$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
?>

<h2>Повідомлення користувачів</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Імʼя</th>
        <th>Email</th>
        <th>Повідомлення</th>
        <th>Дата</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["message"] ?></td>
        <td><?= $row["created_at"] ?></td>
        <td>
    <form action="delete_message.php" method="POST" onsubmit="return confirm('Видалити повідомлення?');">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit" class="btn-delete">🗑 Видалити</button>
    </form>
</td>

    </tr>
    <?php endwhile; ?>
</table>

