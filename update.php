<?php
require 'db.php';

$stmt = $pdo->prepare(
  "UPDATE logs
   SET log_date = ?, duration = ?, memo = ?
   WHERE id = ?"
);

$stmt->execute([
  $_POST['log_date'],
  $_POST['duration'],
  $_POST['memo'],
  $_POST['id']
]);

header('Location: index.php');
