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

    public function saveDoneTodo(int $id): void
    {
        try {
            $todo = $this->get($id);
            $todoId = $todo['id'];
            $title = $this->conn->quote($todo['title']);
            $userId = $this->conn->quote($todo['user_id']);
            $description = $this->conn->quote($todo['description']);
            $created = $this->conn->quote($todo['created']);

            $query = "INSERT INTO done_todos(user_id, title, description, created_at) VALUES($userId, $title, $description, $created)";

            $this->conn->exec($query);

            $this->delete((int) $todoId);
        } catch(Throwable $exception) {
            throw new StorageException('Todo could not be set to Done', 400, $exception);
        }
    }

    public function updateName(array $data): void
    {
        try {
            $userId = $this->conn->quote($data['user_id']);
            $firstName = $this->conn->quote((string) $data['first_name']);
            $lastName = $this->conn->quote((string) $data['last_name']);

            $query = "UPDATE users SET first_name = $firstName, last_name = $lastName WHERE id = $userId";

            $this->conn->exec($query);
        } catch(Throwable $exception) {
            throw new StorageException('Name could not be updated', 400, dump($exception));
        }
    }

    public function updateLevel(array $data): void {
        try {
            $userId = $this->conn->quote($data['userId']);
            $userCurrentLevel = $this->conn->quote((string) $data['userCurrentLevel']);
            $userGainedExp = $this->conn->quote((string) $data['userGainedExp']);
            $userExpToLvlUp = $this->conn->quote((string) $data['userExpToLvlUp']);

            $query = "UPDATE users SET level = $userCurrentLevel, exp = $userGainedExp, level_up = $userExpToLvlUp WHERE id = $userId";

            $this->conn->exec($query);
        } catch(Throwable $exception) {
            throw new StorageException('Level could not be Updated', 400, dump($exception));
        }
    }

    public function getDoneTodo(string $userId): array
    {
        try {
            $userId = $this->conn->quote($userId);
            $query = "SELECT * FROM done_todos WHERE user_id = $userId";
            $result = $this->conn->query($query);
            $doneTodos = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $exception) {
            throw new StorageException('Done Todos could not be downloaded. Please try again', 400, $exception);
        }

        return $doneTodos;
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

    public function deleteDoneTodo(int $id): void
    {
        try {
            $query = "DELETE FROM done_todos WHERE id = $id LIMIT 1";
            $this->conn->exec($query);
        } catch(Throwable $exception) {
            throw new StorageException('Todo could not be deleted', 400, $exception);
        }
    }

    public function deleteUser(string $userId): void
    {
        try {
            $userId = $this->conn->quote($userId);
            $query = "DELETE FROM users WHERE id = $userId LIMIT 1";
            $this->conn->exec($query);
        } catch(Throwable $exception) {
            throw new StorageException('User could not be deleted', 400, $exception);
        }
    }

    public function uploadImage(array $data): void
    {
        dump($data);
        try {
            $userId = $this->conn->quote($data['user_id']);
            $imageName = $this->conn->quote($data['imageName']);

            $query = "UPDATE users SET profile_image = $imageName WHERE id = $userId";

            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Image could not be updated', 400, $exception);
        }
    }

    public function updatePassword(array $data): void
    {
        try {
            $userId = $this->conn->quote($data['user_id']);
            $newPassword = $this->conn->quote($data['new_password']);

            $query = "UPDATE users SET password = $newPassword WHERE id = $userId";

            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Password could not be updated', 400, $exception);
        }
    }

    public function checkPassword(array $data): bool
    {
        $userId = $this->conn->quote($data['user_id']);
        $password = $data['password'];

        $query = "SELECT password FROM users WHERE id = $userId";
        $result = $this->conn->query($query);
        $hashedPassword = $result->fetch(PDO::FETCH_ASSOC);

        $hashedPassword =  $hashedPassword['password'];

        if(password_verify($password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }
    }
}