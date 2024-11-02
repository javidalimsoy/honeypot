<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/css/form_style.css">
</head>
<body>
<div class="container">
    <h2>Admin Dashboard</h2>
    <table class="admin-table">
        <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Placeholder rows -->
        <tr>
            <td>1</td>
            <td>test_user</td>
            <td>Active</td>
            <td class="admin-actions">
                <a href="#" class="button">Disable</a>
                <a href="#" class="button">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>guest_user</td>
            <td>Disabled</td>
            <td class="admin-actions">
                <a href="#" class="button">Enable</a>
                <a href="#" class="button">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
