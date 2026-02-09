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
            <?= $log['log_date'] ?> /
            <?= $log['category'] ?> /
            <?= $log['duration'] ?>分
            - <?= htmlspecialchars($log['memo']) ?>
            
        </li>
    <?php endforeach; ?>
</ul>