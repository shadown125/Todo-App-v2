<?php

declare(strict_types=1);

namespace App\Model;

interface ModelInterface
{
    public function create(array $data): void;

    public function delete(int $id): void;
}