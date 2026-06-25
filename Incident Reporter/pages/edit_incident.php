<?php

session_start();

require_once '../config/database.php';
require_once '../models/Incident.php';

$incidentModel = new Incident($pdo);

$id = (int) $_GET['id'];

$incident = $incidentModel->findById($id);

if (!$incident) {
    die('Incident not found');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $incidentModel->update($id, $_POST['title'], $_POST['description']);
    header('Location: dashboard.php');
    exit;
}
?>

<h1>Edit Incident</h1>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($incident['title']) ?>" required>

    <br><br>

    <textarea name="description" required><?= htmlspecialchars($incident['description']) ?></textarea>

    <br><br>

    <button type="submit">Save</button>
</form>