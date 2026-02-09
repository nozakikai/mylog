<?php
require 'db.php';

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM logs WHERE id = ?");
$stmt->execute([$id]);
$log = $stmt->fetch();
?>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $log['id'] ?>">

    <input type="date" name="log_date" value="<?= $log['log_date'] ?>">
    <input type="number" name="duration" value="<?= $log['duration'] ?>">
    <input type="text" name="memo" value="<?= htmlspecialchars($log['memo']) ?>">

    <button>更新</button>
</form>