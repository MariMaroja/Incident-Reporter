<?php

class User{
    private PDO $pdo;

    public function create(string $username, string $pass): bool{
        $sql = "
            INSERT INTO users
            (username, password)
            VALUES
            (:username, :password)
            ";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute(['username' => $username,'password'=> $pass]);
    }

    public function findByUsername(string $username): ?array{
        $sql = "
            SELECT *
            FROM users
            WHERE username = :username
            ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username'=> $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}