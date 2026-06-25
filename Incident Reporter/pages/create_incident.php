<?php

session_start();

if (isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit;
}

require_once '../config/database.php';
require_once '../models/Incident.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $incidentModel = new Incident($pdo);
    $incidentModel->create($_POST['title'], $_POST['description'], $_SESSION['user_id']);
    header('Location: dashboard.php');
    exit;
}
?>

<h1>Create Incident</h1>

<form method="POST">
    <input type="text" name="title" placeholder="Incident title" required>

    <br><br>

    <textarea name="description" placeholder="Description" required></textarea>

    <br><br>

    <button type="submit">Create</button>
</form>