<?php
require 'db_connect.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total value
$totalValue = 0;
foreach ($products as $p) {
  $totalValue += $p['price'] * $p['stock'];
}
?>
<h2>Product Inventory</h2>
<table border="1">
  <tr><th>ID</th><th>Product</th><th>Price (¥)</th><th>Stock</th><th>Value</th></tr>
  <?php foreach ($products as $p): ?>
  <tr>
    <td><?= $p['id'] ?></td>
    <td><?= htmlspecialchars($p['product_name']) ?></td>
    <td><?= number_format($p['price']) ?></td>
    <td><?= $p['stock'] ?></td>
    <td><?= number_format($p['price'] * $p['stock']) ?></td>
    <td><a href="delete_product.php?id=<?= $p['id'] ?>">Delete</a></td>
  </tr>
  <?php endforeach; ?>
</table>

<p><strong>Total Stock Value:</strong> ¥<?= number_format($totalValue) ?></p>
