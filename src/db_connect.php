<?php
$host = 'mysql'; //docker service is mysql
$db = 'practice_db';  // must match MYSQL_DATABASE in docker-compose.yml
$user = 'root';
$pass = 'root';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "✅ Database connected successfully!";
} catch (PDOException $e) {
  echo "❌ Connection failed: " . $e->getMessage();
}
?>
