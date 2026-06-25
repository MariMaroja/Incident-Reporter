<?php

session_start();

require_once '../config/database.php';
require_once '../models/Incident.php';

$id = (int) $_GET['id'];
$status = $_GET['status'];
$incidentModel = new Incident($pdo);
$incidentModel->updateStatus($id, $status);

header('Location: dashboard.php');

exit;