<?php
require_once __DIR__ . '/../../config/config.php';

// Check if the logging file exists, then include it
$loggingFile = realpath(__DIR__ . '/src/functions/logging.php');
if ($loggingFile) {
    require_once $loggingFile;
} else {
    die("Error: Cannot locate logging.php. Please check the path.");
}

session_start();

global $pdo;  // Declare $pdo as global to access it

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];

    // Use a default username if none is provided
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
    log_sql_injection_attempt($username, $query);

    // Vulnerable SQL query for honeypot purposes
    $stmt = $pdo->query("SELECT * FROM users WHERE username LIKE '%$query%'");
    $results = $stmt->fetchAll();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Injection Challenge</title>
</head>
<body>
<h2>SQL Injection Challenge</h2>
<form method="POST">
    <label for="query">Search Users:</label>
    <input type="text" id="query" name="query" required>
    <button type="submit">Search</button>
</form>

<?php if (isset($results)): ?>
    <h3>Results:</h3>
    <ul>
        <?php foreach ($results as $result): ?>
            <li><?php echo htmlspecialchars($result['username']); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</body>
</html>
