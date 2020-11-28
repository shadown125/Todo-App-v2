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

    public function createAction(): void
    {
     if($this->request->hasPost()) {
         $todoData = [
             'title' => $this->request->postParam('title'),
             'description' => $this->request->postParam('description')
         ];
         $this->todoModel->create($todoData);
         $this->redirect('./');
     }
     $this->view->render('todos');
    }

    public function deleteAction(): void
    {
        if($this->request->isPost()) {
            $id = (int) $this->request->postParam('id');
            $this->todoModel->delete($id);
            $this->redirect('./');
        }
        $this->view->render('todos');
    }

    final private function getTodo(): array
    {
        $todoId = (int) $this->request->getParam('id');
        if(!$todoId) {
            $this->redirect('./');
        }
        return $this->todoModel->get($todoId);
    }
}
