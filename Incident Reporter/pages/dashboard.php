<?php

session_start();

require_once '../config/database.php';
require_once '../models/Incident.php';

$incidentModel = new Incident($pdo);
$incident = $incidentModel->getAllByUser($_SESSION['user_id']);

if (!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit;
}
?>

<h1>Dashboard</h1>

<p>
    Welcome,
    <?= $_SESSION['username'] ?>
</p>

<h2>My Incidents</h2>

<?php foreach ($incidents as $incident): ?>

<div>

    <h3>
        <?= htmlspecialchars(
            $incident['title']
        ) ?>
    </h3>

    <p>
        <?= htmlspecialchars(
            $incident['description']
        ) ?>
    </p>

    <strong>
        Status:
        <?= $incident['status'] ?>
    </strong>

    <hr>

</div>

<br><br>

<a href="edit_incident.php?id=<?= $incident['id'] ?>">Edit</a>

|

<a href="change_status.php?id=<?= $incident['id'] ?>&status=In Progress">Start</a>

|

<a href="change_status.php?id=<?= $incident['id'] ?>&status=Resolved">Resolve</a>

|

<a href="delete_incident.php?id=<?= $incident['id'] ?>" onclick="return confirm('Delete this incident?')">Delete</a>

<?php endforeach; ?>

<a href="../logout.php">Logout</a>

<br><br>

<a href="create_incident.php">Create Incident</a>