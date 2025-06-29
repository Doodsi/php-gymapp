<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
require 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $date = $_POST['workout_date'];
    $duration = (int)$_POST['duration_minutes'];

    if ($title && $date && $duration > 0) {
        $stmt = $pdo->prepare("INSERT INTO workouts (user_id, title, description, workout_date, duration_minutes) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $title, $desc, $date, $duration]);
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Popuni sva required polja!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodaj novi workout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="dashboard.php">Nazad</a>
<h2>Dodaj novi workout</h2>
<?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post">
    <label>Naslov:<br><input type="text" name="title" required></label><br><br>
    <label>Opis:<br><textarea name="description"></textarea></label><br><br>
    <label>Datum:<br><input type="date" name="workout_date" required></label><br><br>
    <label>Trajanje (min):<br><input type="number" name="duration_minutes" min="1" required></label><br><br>
    <button type="submit">Dodaj!</button>
</form>
</body>
</html>