<?php
require 'db_connect.php';

$query = "
  SELECT u.id, u.name, u.age, d.gender, d.blood_type
  FROM users u
  INNER JOIN user_details d ON u.id = d.user_id
";
$stmt = $pdo->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>User Details (Joined Data)</h2>
<table border="1">
  <tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Blood Type</th></tr>
  <?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= $row['age'] ?></td>
    <td><?= htmlspecialchars($row['blood_type']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
