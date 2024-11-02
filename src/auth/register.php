<?php

session_start();
$registration_successful = false;
$error_message = "";

// This array will act as a placeholder for registered users.
// In a real application, replace this with database calls.
$users = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple validation
    if (empty($username) || empty($password)) {
        $error_message = "Both fields are required.";
    } elseif (isset($users[$username])) {
        $error_message = "Username already exists.";
    } else {
        // Register the user by storing it in the session (temporary solution)
        $users[$username] = password_hash($password, PASSWORD_DEFAULT);
        $_SESSION['users'] = $users;
        $registration_successful = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../../public/css/form_style.css">
</head>
<body>
<div class="container">
    <?php if ($registration_successful): ?>
        <h2>Registration Successful!</h2>
        <p>Welcome, <?php echo htmlspecialchars($username); ?>! You can now <a href="login.php" class="button">Log In</a>.</p>
    <?php else: ?>
        <h2>Register</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
