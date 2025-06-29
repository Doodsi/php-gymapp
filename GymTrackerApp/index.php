<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Gym Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>
<?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" action="login.php">
    <label>Email: <input type="email" name="email" required></label><br><br>
    <label>Password: <input type="password" name="password" required></label><br><br>
    <button type="submit">Login</button>
</form>
<!-- <a href="register.php">Registracija</a> -->
</body>
</html>