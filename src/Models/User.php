<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Connection;
use PDO;

class User extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(array $data)
    {

        $user = $this->check_if_email_exists($data['email']);

        if ($user) {
            return false;
        }

        // checar se as duas senhas são iguais e hasshear a senha
        if ($data['password'] !== $data['password_confirmation']) {
            return null;
        }

        $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(nome, email, password, ddd, telefone)
        VALUES (:nome, :email, :password, :ddd, :telefone)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":nome", $data['nome']);
        $stmt->bindValue(":email", $data['email']);
        $stmt->bindValue(":password", $password_hash);
        $stmt->bindValue(":ddd", $data['ddd']);
        $stmt->bindValue(":telefone", $data['telefone']);
        $stmt->execute();

        return true;
    }

    public function login(array $data){

        $user = $this->check_if_email_exists($data['email']);

        if(!$user){
           return false;
        }

        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $data['email']);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res ? $res : false;
    }

    public function check_if_email_exists(string $email): bool
    {

        $checkIsUser = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $checkStmt = $this->pdo->prepare($checkIsUser);
        $checkStmt->bindValue(":email", $email);
        $checkStmt->execute();
        $checkStmt->fetch(PDO::FETCH_ASSOC);

        if ($checkStmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
