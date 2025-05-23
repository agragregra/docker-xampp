<?php
$host = 'localhost';
$port = '3306';
$dbname = 'phpmyadmin';
$user = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->query("SHOW TABLES");
  $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

  echo '<div class="center"><table>';
  echo '<tr><th>EXAMPLE TABLES FROM DB</th></tr>';
  foreach ($tables as $table) {
    echo '<tr><td>' . htmlspecialchars($table) . '</td></tr>';
  }
  echo '</table></div>';

} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

phpinfo();
?>
