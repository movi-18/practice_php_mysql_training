<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name  = $_POST['product_name'] ?? '';
  $price = $_POST['price'] ?? 0;
  $stock = $_POST['stock'] ?? 0;

  if ($name && $price && $stock) {
    $stmt = $pdo->prepare("INSERT INTO products (product_name, price, stock) VALUES (?, ?, ?)");
    $stmt->execute([$name, $price, $stock]);
    echo "✅ Product added successfully!";
  } else {
    echo "⚠️ Please fill in all fields.";
  }
}
?>
<h2>Add New Product</h2>
<form method="POST">
  <label>Product Name:</label><br>
  <input type="text" name="product_name" required><br><br>
  <label>Price (¥):</label><br>
  <input type="number" name="price" required><br><br>
  <label>Stock:</label><br>
  <input type="number" name="stock" required><br><br>
  <input type="submit" value="Add Product">
</form>

<p><a href="products.php">View Product List</a></p>
