<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM workouts WHERE user_id = ? ORDER BY workout_date DESC");
$stmt->execute([$_SESSION['user_id']]);
$workouts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Moji Workouti</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Bok, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
<a href="logout.php">Logout</a> | <a href="add_workout.php">Dodaj novi workout</a>
<h3>Tvoji Workouti</h3>
<table border="1" cellpadding="8">
    <tr>
        <th>Datum</th>
        <th>Naslov</th>
        <th>Opis</th>
        <th>Trajanje (min)</th>
        <th>Akcije</th>
    </tr>
    <?php foreach ($workouts as $w): ?>
    <tr>
        <td><?= htmlspecialchars($w['workout_date']) ?></td>
        <td><?= htmlspecialchars($w['title']) ?></td>
        <td><?= htmlspecialchars($w['description']) ?></td>
        <td><?= htmlspecialchars($w['duration_minutes']) ?></td>
        <td>
            <a href="edit_workout.php?id=<?= $w['id'] ?>">Uredi</a> |
            <a href="delete_workout.php?id=<?= $w['id'] ?>" onclick="return confirm('Delete this workout?')">Briši</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>