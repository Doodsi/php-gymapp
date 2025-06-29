<?php
$host = "localhost";
$db   = "gymtracker";
$user = "root";
$pass = "";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}
?>