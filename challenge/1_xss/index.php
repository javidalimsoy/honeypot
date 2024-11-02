<?php
global $pdo;
require_once '../../config/config.php'; // Load config directly to define DB connection
require_once '../../src/functions/logging.php'; // Load logging functions directly

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];

    // Log SQL injection attempt with fallback for username
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest';
    log_sql_injection_attempt($username, $query);

    // Vulnerable SQL query
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
