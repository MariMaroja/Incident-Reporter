<?php

session_start();

require_once '../config/database.php';
require_once '../models/Incident.php';

$id = (int) $_GET['id'];
$incidentModel = new Incident($pdo);
$incidentModel->delete($id);

header('Location: dashboard.php');

exit;