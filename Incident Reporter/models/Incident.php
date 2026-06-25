<?php

class Incident{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function create(string $title, string $description, int $userId): bool{
        $sql = "
            INSERT INTO incidents
            (
                title,
                description,
                status,
                user_id
            )
            VALUES
            (
                :title,
                :description,
                'Open',
                :user_id
            )
            ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['title'=> $title, 'description'=> $description, 'user_id' => $userId]);
    }
    public function getAllById(int $userId): array{
        $sql = "
            SELECT *
            FROM incidents
            WHERE user_id = :user_id
            ORDER BY created_at DESC
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id'=> $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findbyId(int $id): ?array{
        $sql = "
            SELECT *
            FROM incidents
            WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id'=> $id]);
        $incident = $stmt->fetch(PDO::FETCH_ASSOC);
        return $incident ?: null;
    }
    public function update(int $id, string $title, string $description): bool{
        $sql = "
            UPDATE incidents
            SET
                title = :title,
                description = :description
            WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id,'title' => $title, 'description' => $description]);
    }
    public function updateStatus(int $id, string $status): bool{
        $sql = "
            UPDATE incidents
            SET status = :status
            WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id,'status'=> $status]);
    }
    public function delete(int $id): bool{
        $sql = "
            DELETE FROM incidents
            WHERE id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id'=> $id]);
    }
}