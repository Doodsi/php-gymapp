<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) { header("Location: dashboard.php"); exit; }

// Edit samo svoj workout:
$stmt = $pdo->prepare("SELECT * FROM workouts WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);
$workout = $stmt->fetch();

if (!$workout) { header("Location: dashboard.php"); exit; }

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $date = $_POST['workout_date'];
    $duration = (int)$_POST['duration_minutes'];

    if ($title && $date && $duration > 0) {
        $stmt = $pdo->prepare("UPDATE workouts SET title=?, description=?, workout_date=?, duration_minutes=? WHERE id=? AND user_id=?");
        $stmt->execute([$title, $desc, $date, $duration, $id, $_SESSION['user_id']]);
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Molimo popuni sva required polja!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Uredi workout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<a href="dashboard.php">Nazad</a>
<h2>Uredi workout</h2>
<?php if ($error): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post">
    <label>Naslov:<br><input type="text" name="title" value="<?= htmlspecialchars($workout['title']) ?>" required></label><br><br>
    <label>Opis:<br><textarea name="description"><?= htmlspecialchars($workout['description']) ?></textarea></label><br><br>
    <label>Datum:<br><input type="date" name="workout_date" value="<?= $workout['workout_date'] ?>" required></label><br><br>
    <label>Trajanje (min):<br><input type="number" name="duration_minutes" min="1" value="<?= $workout['duration_minutes'] ?>" required></label><br><br>
    <button type="submit">Spremi promjene</button>
</form>
</body>
</html>