<?php
require 'db.php';

$stmt = $pdo->prepare(
    "INSERT INTO logs (log_date, category, duration, memo)
   VALUES (?, ?, ?, ?)"
);

$stmt->execute([
    $_POST['log_date'],
    $_POST['category'],
    $_POST['duration'],
    $_POST['memo']
]);

header('Location: index.php');
