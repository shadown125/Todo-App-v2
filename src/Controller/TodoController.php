<?php

declare(strict_types=1);

namespace App\Controller;

class TodoController extends AbstractController
{
    public function renderSiteAction(): void
    {
        $actualLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(isset($_SESSION['user_id'])) {
            $this->view->render('todos', [
            'todo' => $this->todoModel->getTodos()
            ]);
            var_dump('lol');
        }

        if (strpos((string) $actualLink, 'register') !== false || strpos((string) $actualLink, 'register/')) {
            $this->view->render('register', [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'first_name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ]);
        } else {
            $this->view->render('login', [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ]);
        }
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

    private function getTodo(): array
    {
        $todoId = (int) $this->request->getParam('id');
        if(!$todoId) {
            $this->redirect('./');
        }
        return $this->todoModel->get($todoId);
    }

    public function registerAction(): void
    {
        if($this->request->isPost()) {
            $data = [
                'first_name' => trim($this->request->postParam('first_name')),
                'last_name' => trim($this->request->postParam('last_name')),
                'email' => trim($this->request->postParam('email')),
                'password' => trim($this->request->postParam('password')),
                'confirm_password' => trim($this->request->postParam('confirm_password')),
                'first_name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            if(empty($data['first_name'])) {
                $data['first_name_err'] = 'Please enter First Name';
            }

            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter Email';
            }

            if($this->userModel->findUserByEmail($data['email']))
            {
                $data['email_err'] = 'Email is already taken';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter Password';
            }

            if(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm Password';
            }

            if($data['password'] !== $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match. Please try again';
            }

            if(empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $this->userModel->registerUser($data);
                $this->redirect('./');
            } else {
                $this->view->render('register', $data);
            }
        }
    }

    public function loginAction(): void
    {
        if($this->request->isPost()) {
            $data = [
                'email' => $this->request->postParam('email'),
                'password' => $this->request->postParam('password'),
                'email_err' => '',
                'password_err' => '',
            ];

            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter Email';
            }

            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter Password';
            }

            if($this->userModel->findUserByEmail($data['email']))
            {

            } else {
                $data['email_err'] = 'E-Mail or password are wrong. Please check it and try again';
            }

            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view->render('login', $data);
                }
            } else {
                $this->view->render('login', $data);
            }
        }
    }

    public function createUserSession(array $user)
    {
        $user = $user[0];

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_last_name'] = $user['last_name'];
        $_SESSION['user_email'] = $user['email'];

        $this->view->render('todos', [
            'todo' => $this->todoModel->getTodos(),
            'user' => $user
        ]);
    }
}
