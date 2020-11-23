<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\StorageException;
use Throwable;
use PDO;

class TodoModel extends AbstractModel implements ModelInterface
{
    public function getTodos(): array
    {
        try {
            $query = "SELECT * FROM todo";
            $result = $this->conn->query($query);
            $note = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $exception) {
            throw new StorageException('The todo could not be downloaded. Please try again', 400, $exception);
        }

        return $note;
    }
}