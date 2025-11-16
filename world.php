<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");



if (isset($_GET['country'])) {
  $country = trim($_GET['country']);
  $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');

  $stmt = $conn->prepare('SELECT * FROM countries WHERE name LIKE :country');
  $stmt->execute(['country' => "%$country%"]);
} else {
  $stmt = $conn->query("SELECT * FROM countries");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['ajax'])) {
  echo '<table border="1" cellpadding="5" cellspacing="0">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Country Name</th>';
  echo '<th>Continent</th>';
  echo '<th>Independence Year</th>';
  echo '<th>Head of State</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($results as $row) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['name'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($row['continent'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($row['independence_year'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($row['head_of_state'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
  exit();
}

echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<thead>';
echo '<tr>';
echo '<th>Country Name</th>';
echo '<th>Continent</th>';
echo '<th>Independence Year</th>';
echo '<th>Head of State</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($results as $row) {
  echo '<tr>';
  echo '<td>' . htmlspecialchars($row['name'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
  echo '<td>' . htmlspecialchars($row['continent'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
  echo '<td>' . htmlspecialchars($row['independence_year'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
  echo '<td>' . htmlspecialchars($row['head_of_state'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>';
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';
