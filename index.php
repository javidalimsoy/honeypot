<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Pentesting Challenges</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="container">
    <!-- Title and Description -->

    <header>
        <h1>Welcome to Web Pentesting Challenges!</h1>
        <p>Explore various security challenges and honeypot scenarios and have fun while solving them.</p>
    </header>

    <!-- Register and Login Buttons -->
    <div class="nav-buttons">
        <a href="src/auth/register.php" class="button">Register</a>
        <a href="src/auth/login.php" class="button">Login</a>
    </div>

    <!-- Challenges Section -->
    <section class="challenges">
        <div class="challenge">
            <img src="public/uploads/sql_injection.png" alt="SQL Injection Challenge">
            <h3>SQL Injection Challenge</h3>
            <p>Test your skills in identifying and exploiting SQL injection vulnerabilities.</p>
            <a href="challenge/0_sql_injection/index.php" class="button">Start Challenge</a>
        </div>

        <div class="challenge">
            <img src="public/uploads/xss.png" alt="XSS Challenge">
            <h3>XSS Challenge</h3>
            <p>Find and exploit cross-site scripting vulnerabilities in this simulated environment.</p>
            <a href="challenge/1_xss/index.php" class="button">Start Challenge</a>
        </div>

        <div class="challenge">
            <img src="public/uploads/access_control.jpg" alt="Broken Access Control Challenge">
            <h3>Broken Access Control Challenge</h3>
            <p>Access restricted content by bypassing access controls.</p>
            <a href="challenge/2_broken_access/index.php" class="button">Start Challenge</a>
        </div>
    </section>

    <!-- Admin Panel Button -->
    <div class="admin-panel">
        <a href="admin/index.php" class="button">Admin Dashboard</a>
    </div>
</div>
</body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const baseUrl = "<?php echo BASE_URL; ?>";

        // Handle back button
        const backButton = document.getElementById("back-button");
        if (backButton) {
            backButton.addEventListener("click", function () {
                window.history.back();
            });
        }

        // Handle home button
        const homeButton = document.getElementById("home-button");
        if (homeButton) {
            homeButton.href = baseUrl + "index.php"; // Set home link dynamically
        }
    });
</script>
