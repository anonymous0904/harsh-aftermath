<?php
$host = 'db';
$user = 'user';
$pass = 'userpassword';
$db   = 'my_database';

$conn = new mysqli($host, $user, $pass, $db);

echo "<h2>Container Info</h2>";
echo "My Container IP is: " . $_SERVER['SERVER_ADDR'];

echo "<h2>Database Status</h2>";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully to MySQL!";

// Simple Logic to Create a table if it doesn't exist (The 'C' in CRUD)
$conn->query("CREATE TABLE IF NOT EXISTS hits (id INT AUTO_INCREMENT PRIMARY KEY, time DATETIME)");
$conn->query("INSERT INTO hits (time) VALUES (NOW())");

$result = $conn->query("SELECT COUNT(*) as total FROM hits");
$data = $result->fetch_assoc();
echo "<p>Total entries in 'hits' table: " . $data['total'] . "</p>";
?>