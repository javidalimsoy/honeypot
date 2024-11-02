<?php
require_once __DIR__ . '/../../config/config.php';
require_once FUNCTIONS_PATH . 'logging.php';


session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];

    // Log the comment for monitoring XSS attempts
    log_xss_attempt(isset($_SESSION['username']) ? $_SESSION['username'] : 'guest', $comment);

    // Vulnerable display of the comment (no sanitization applied)
    $display_comment = $comment;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Challenge</title>
</head>
<body>
<h2>XSS Challenge</h2>
<form method="POST">
    <label for="comment">Leave a Comment:</label>
    <input type="text" id="comment" name="comment" required>
    <button type="submit">Post Comment</button>
</form>

<?php if (isset($display_comment)): ?>
    <h3>Latest Comment:</h3>
    <p><?php echo $display_comment; ?></p> <!-- Intentional XSS vulnerability -->
<?php endif; ?>
</body>
</html>
