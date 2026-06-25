<?php

class AuthService{
    private User $userModel;

    public function __construct(User $userModel){
        $this->userModel = $userModel;
    }

    public function login(string $username, string $password): bool{
        $user = $this->userModel->findByUsername($username);
        if (!$user){
            return false;
        }
        if (password_verify($password, $user[password])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            return true;
        }
        return false;
    }
}