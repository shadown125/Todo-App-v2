<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\NotFoundException;
use App\Exception\StorageException;
use Throwable;
use PDO;

class UserModel extends AbstractModel
{
    public function findUserByEmail(string $dataEmail): bool
    {
        $email = $this->conn->quote($dataEmail);

        $query = "SELECT email FROM users WHERE email = $email";
        $result = $this->conn->query($query);
        $email = $result->fetch(PDO::FETCH_ASSOC);

        if(empty($email['email'])) {
            return false;
        }

        return true;
    }

    public function registerUser(array $data): void
    {
        try {
            $first_name = $this->conn->quote($data['first_name']);
            $last_name = $this->conn->quote($data['last_name']);
            $email = $this->conn->quote($data['email']);
            $password = $this->conn->quote($data['password']);

            $query = "INSERT INTO users(first_name, last_name, email, password, level, level_up) VALUES($first_name, $last_name, $email, $password, '1', '30')";

            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('User could not be created', 400, $exception);
        }
    }

    public function login(string $email, string $password): mixed
    {
        $email = $this->conn->quote($email);

        $query = "SELECT password FROM users WHERE email = $email";
        $result = $this->conn->query($query);
        $hashedPassword = $result->fetch(PDO::FETCH_ASSOC);

        $hashedPassword =  $hashedPassword['password'];

        if(password_verify($password, $hashedPassword)) {
            $query = "SELECT * FROM users WHERE email = $email";
            $result = $this->conn->query($query);
            $user = $result->fetchAll(PDO::FETCH_ASSOC);

            return $user;
        } else {
            return false;
        }
    }
}