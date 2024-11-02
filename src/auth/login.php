<?php
session_start();

// Database connection setup (adjust with your actual DB credentials)
$host = 'localhost';
$db = 'honeypot_db';
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$login_successful = false;
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user was found and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $login_successful = true;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/form_style.css">
</head>
<body>
<div class="container">
    <?php if ($login_successful): ?>
        <h2>Login Successful!</h2>
        <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
        <a href="../project1/index.php" class="button">Go back to the home page to get started</a>
    <?php else: ?>
        <h2>Login</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
