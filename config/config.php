<?php
// Root path for includes
define('ROOT_PATH', __DIR__ . '/../');

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'honeypot_db');
define('DB_USER', 'root');  // Replace with your MySQL username
define('DB_PASS', 'root');  // Replace with your MySQL password

// Database connection
try {
    $GLOBALS['pdo'] = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
    var_dump($pdo);
}
