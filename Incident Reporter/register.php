<?php

require_once 'config/database.php';
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userModel = new User($pdo);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userModel->create($username, $hashedPassword);
    echo "User created successfully!";
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>

    <br><br>

    <input type="password" name="password" placeholder="Password" required>

    <br><br>

    <button type="submit">Register</button>
</form>