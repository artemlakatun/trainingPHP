<?php

$host = 'localhost';
$db_name = 'trainingPHP';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
