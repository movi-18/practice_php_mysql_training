<?php
require 'db_connect.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>User List</h2>
<table border="1">
  <tr><th>ID</th><th>Name</th><th>Age</th><th>Blood Type</th></tr>
  <?php foreach ($users as $user): ?>
  <tr>
    <td><?= htmlspecialchars($user['id']) ?></td>
    <td><?= htmlspecialchars($user['name']) ?></td>
    <td><?= htmlspecialchars($user['age']) ?></td>
    <td><?= htmlspecialchars($user['blood_type']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
