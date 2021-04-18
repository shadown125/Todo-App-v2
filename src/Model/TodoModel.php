<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\NotFoundException;
use App\Exception\StorageException;
use Throwable;
use PDO;

class TodoModel extends AbstractModel implements ModelInterface
{
    public function getTodos(string $userId): array
    {
        try {
            $userId = $this->conn->quote($userId);
            $query = "SELECT * FROM todo WHERE user_id = $userId";
            $result = $this->conn->query($query);
            $note = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $exception) {
            throw new StorageException('The todo could not be downloaded. Please try again', 400, $exception);
        }

        return $note;
    }

    public function get(int $id): array
    {
        try {
            $query = "SELECT * FROM todo WHERE id = $id";
            $result = $this->conn->query($query);
            $todo = $result->fetch(PDO::FETCH_ASSOC);
        } catch(Throwable $exception) {
            throw new StorageException('Todo could not be downloaded', 400, $exception);
        }
        if(!$todo) {
            throw new NotFoundException("Todo with id: $id doesn't exist");
        }
        return $todo;
    }

    public function create(array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);
            (int) $userId = $this->conn->quote($data['user_id']);

            $query = "INSERT INTO todo(user_id, title, description) VALUES($userId, $title, $description)";

            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Todo could not be created', 400, $exception);
        }
    }

    public function update(array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);
            (int) $id = $this->conn->quote($data['id']);

            $query = "UPDATE todo SET title = $title, description = $description WHERE id = $id";

            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Todo could not be Updated', 400, $exception);
        }
    }

    public function delete(int $id): void
    {
        try {
            $query = "DELETE FROM todo WHERE id = $id LIMIT 1";
            $this->conn->exec($query);
        } catch(Throwable $exception) {
            throw new StorageException('Todo could not be deleted', 400, $exception);
        }
    }
}