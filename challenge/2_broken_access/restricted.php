<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once FUNCTIONS_PATH . 'logging.php';

if (!isset($_SESSION['username']) && (!isset($_GET['access']) || $_GET['access'] !== 'guest')) {
    // If the user is not logged in and access=guest is not provided, restrict access
    die("Access denied. You must be logged in to view this page.");
}

// Log access attempt
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
log_access_attempt($username, 'Restricted Page Accessed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restricted Page</title>
</head>
<body>
<h2>Welcome to the Restricted Page</h2>
<p>This page should only be visible to logged-in users, but there's a way to bypass the restriction!</p>
</body>
</html>
