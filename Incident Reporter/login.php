<?php

session_start();

require_once 'config/database.php';
require_once 'models/User.php';
require_once 'services/AuthService.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $userModel = new User($pdo);
    $authService = new AuthService($userModel);
    $success = $authService->login($_POST['username'], $_POST['password']);
    if ($success){
        header('Location: pages/dashboard.php');
        exit;
    } else{
        $message = "Invalid credentials!";
    }
}
?>

<h2>Login</h2>

<p><?= $message ?></p>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>

    <br><br>

    <input type="password" name="password" placeholder="Password" required>

    <br><br>

    <button type="submit">Login</button>
</form>