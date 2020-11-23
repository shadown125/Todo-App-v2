<?php

declare(strict_types=1);

namespace App\Controller;

class TodoController extends AbstractController
{
    public function todosAction(): void
    {
        $this->view->render('todos', [
            'todo' => $this->todoModel->getTodos()
        ]);
    }

    final private function getTodo(): array
    {

    }
}
