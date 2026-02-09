<form action="add.php" method="post">
    <input type="date" name="log_date" required>

    <select name="category">
        <option value="勉強">勉強</option>
        <option value="開発">開発</option>
        <option value="休み">休み</option>
    </select>

    <input type="number" name="duration" placeholder="分" required>

    <input type="text" name="memo" placeholder="メモ（任意）">

    <button type="submit">記録</button>
</form>

<?php
require 'db.php';
$logs = $pdo->query(
    "SELECT * FROM logs ORDER BY log_date DESC"
)->fetchAll();
?>

<ul>
    <?php foreach ($logs as $log): ?>
        <li>
            <a href="edit.php?id=<?= $log['id'] ?>">編集</a>
            <?= $log['log_date'] ?> /
            <?= $log['category'] ?> /
            <?= $log['duration'] ?>分
            - <?= htmlspecialchars($log['memo']) ?>
            <a href="delete.php?id=<?= $log['id'] ?>">削除</a>

        </li>
    <?php endforeach; ?>
</ul>