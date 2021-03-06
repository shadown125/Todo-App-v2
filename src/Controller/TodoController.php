<?php

declare(strict_types=1);

namespace App\Controller;

class TodoController extends AbstractController
{
    public function renderSiteAction(): void
    {
        session_start();

        $actualLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(!isset($_SESSION['user_id']) && strpos($actualLink, 'login') === false && strpos($actualLink, 'register') === false) {
            $this->redirect('./login');
        }

        if(isset($_SESSION['user_id'])) {
            if(strpos((string) $actualLink, 'done-todo') !== false) {
                $this->view->render('done-todo', [
                    'doneTodos' => $this->getDoneTodo()
                ]);
            }

            $this->view->render('todos', [
                'todo' => $this->todos(),
                'doneTodos' => $this->getDoneTodo()
            ]);
        }

        if (!isset($_SESSION['user_id']) && strpos((string) $actualLink, 'login') !== false) {
            $this->view->render('login', [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ]);
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
        }
    }

    public function createAction(): void
    {
        session_start();
        if($this->request->hasPost()) {
            $todoData = [
             'title' => $this->request->postParam('title'),
             'description' => $this->request->postParam('description'),
             'user_id' => $_SESSION['user_id'],
             'title_err' => ''
            ];

            if(empty($todoData['title'])){
                $todoData['title_err'] = 'U need to filled up the Title';
            }

            if(empty($todoData['title_err'])) {
                $this->todoModel->create($todoData);
                $this->redirect('./');
                $this->view->render('todos', ['todo' => $this->todos()]);
            } else {
                $this->view->render('todos',  [
                    'todo' => $this->todos()
                ]);
            }
        }
    }

    public function changeImageAction(): void
    {
        session_start();

        if($this->request->isPost()) {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'imageData' => $this->request->postFile('profile-image'),
                'imageName' => $this->request->postFile('profile-image'),
            ];
            $profileImageName = time() . '_' . $data['imageName']['name'];

            $data['imageName'] = $profileImageName;

            $target = dirname(__DIR__, 1) . '/pics/' . $profileImageName;

            if(move_uploaded_file($data['imageData']['tmp_name'], $target)) {
                $_SESSION['user_profile_image'] = $profileImageName;

                $this->todoModel->uploadImage($data);
                $this->redirect('./');
                $this->view->render('todos', ['todo' => $this->todos()]);
            } else {
                $this->redirect('./');
            }
        }
    }

    public function updatePasswordAction(): void
    {
        session_start();

        if($this->request->isPost()) {
            $dataName = [
                'user_id' => $_SESSION['user_id'],
                'password' => $this->request->postParam('current-password'),
                'new_password' => $this->request->postParam('new-password'),
                'new_repeated_password' => $this->request->postParam('repeat-new-password'),
                'new_repeated_password_err' => '',
            ];

            if($dataName['new_password'] !== $dataName['new_repeated_password']) {
                $dataName['new_repeated_password_err'] = 'The password is not the same';
            }

            $passwordCheck = $this->todoModel->checkPassword($dataName);

            if($passwordCheck) {
                if(empty($dataName['new_repeated_password_err'])) {

                    $dataName['new_password'] = password_hash($dataName['new_password'], PASSWORD_DEFAULT);

                    $this->todoModel->updatePassword($dataName);
                    $this->redirect('./');
                    $this->view->render('todos', [
                        'todo' => $this->todos(),
                        'doneTodos' => $this->getDoneTodo()
                    ]);
                } else {
                    $this->redirect('./');
                }
            } else {
                $this->redirect('./');
            }
        }
    }

    public function updateNameAction(): void
    {
        session_start();

        if($this->request->isPost()) {
            $dataName = [
                'user_id' => $_SESSION['user_id'],
                'first_name' => $this->request->postParam('new-name'),
                'last_name' => $this->request->postParam('new-last-name'),
                'first_name_err' => '',
                'last_name_err' => '',
            ];

            if($_SESSION['user_first_name'] === $dataName['first_name']) {
                $dataName['first_name_err'] = 'Your new name is the same name that you already have. Please change it';
            }

            if($_SESSION['user_last_name'] === $dataName['last_name']) {
                $dataName['last_name_err'] = 'Your new last name is the same name that you already have. Please change it';
            }

            if(empty($dataName['first_name'])) {
                $dataName['first_name'] = $_SESSION['user_first_name'];
            }

            if(empty($dataName['last_name'])) {
                $dataName['last_name'] = $_SESSION['user_last_name'];
            }


            if(empty($dataName['last_name_err']) && empty($dataName['first_name_err'])) {
                $this->todoModel->updateName($dataName);
                $_SESSION['user_first_name'] = $dataName['first_name'];
                $_SESSION['user_last_name'] = $dataName['last_name'];
                $this->redirect('./');
                $this->view->render('todos', [
                    'todo' => $this->todos(),
                    'doneTodos' => $this->getDoneTodo()
                ]);
            } else {
                $this->redirect('./');
            }
        }
    }

    public function getEditTodoAction(): void
    {
        session_start();
        if($this->request->isPost()) {
            $todo = $this->getTodo();

            $this->view->render('edit',  $todo);
        }
    }

    public function editSelectedTodoAction(): void
    {
        session_start();
        if($this->request->hasPost()) {
            $todoData = [
                'title' => $this->request->postParam('title'),
                'description' => $this->request->postParam('description'),
                'user_id' => $_SESSION['user_id'],
                'id' => $this->request->postParam('id'),
                'title_err' => ''
            ];

            if(empty($todoData['title'])){
                $todoData['title_err'] = 'U need to filled up the Title';
            }

            if(empty($todoData['title_err'])) {
                $this->todoModel->update($todoData);
                $this->redirect('./');
                $this->view->render('todos', ['todo' => $this->todos()]);
            } else {
                $this->view->render('todos',  [
                    'todo' => $this->todos()
                ]);
            }
        }
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

    public function deleteDoneTodosAction(): void
    {
        if($this->request->isPost()) {
            $id = (int) $this->request->postParam('id');
            $this->todoModel->deleteDoneTodo($id);
            $this->redirect('./done-todo');
        }
    }

    public function deleteUserAction(): void
    {
        session_start();
        if($this->request->isPost()) {
            $userId = $_SESSION['user_id'];
            $this->todoModel->deleteUser($userId);

            unset($_SESSION['user_id']);
            unset($_SESSION['user_first_name']);
            unset($_SESSION['user_last_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_profile_image']);
            unset($_SESSION['user_level']);
            unset($_SESSION['user_exp']);
            unset($_SESSION['user_lvl_up']);

            session_destroy();
            $this->redirect('./');
        }
    }

    private function getDoneTodo(): array
    {
        $activeUser = $_SESSION['user_id'];
        return $this->todoModel->getDoneTodo($activeUser);
    }

    public function doneTodoAction(): void
    {
        session_start();

        if($this->request->isPost()) {
            $todoId = (int) $this->request->postParam('id');
            if(!$todoId) {
                $this->redirect('./');
            }

            $dataLevel = [
                'userId' => $_SESSION['user_id'],
                'userCurrentLevel' => $_SESSION['user_level'],
                'userGainedExp' => $_SESSION['user_exp'],
                'userExpToLvlUp' => $_SESSION['user_lvl_up']
            ];

            $multiplayer = 2.7;

            if($_SESSION['user_level'] >= 2) {
                $multiplayer = 1.5;
            }

            $dataLevel['userGainedExp'] = $dataLevel['userGainedExp'] + 15 * 1.2;

            if($dataLevel['userGainedExp'] >= $dataLevel['userExpToLvlUp']) {
                $dataLevel['userCurrentLevel'] = $dataLevel['userCurrentLevel'] + 1;
                $dataLevel['userExpToLvlUp'] = $dataLevel['userExpToLvlUp'] * $multiplayer;

                $_SESSION['user_level'] = round($dataLevel['userCurrentLevel']);
                $_SESSION['user_lvl_up'] = round($dataLevel['userExpToLvlUp']);
            }

            $_SESSION['user_exp'] = round($dataLevel['userGainedExp']);

            $this->todoModel->updateLevel($dataLevel);
            $this->todoModel->saveDoneTodo($todoId);
        }
        $this->redirect('./');
    }

    private function todos(): array
    {
        $activeUser = $_SESSION['user_id'];
        return $this->todoModel->getTodos($activeUser);
    }

    private function getTodo(): array
    {
        if($this->request->isPost()) {
            $todoId = (int) $this->request->postParam('id');
            if(!$todoId) {
                $this->redirect('./');
            }
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
                    $data['email_err'] = 'E-Mail or password are wrong. Please check it and try again';

                    $this->view->render('login', $data);
                }
            } else {
                $this->view->render('login', $data);
            }
        }
    }

    public function createUserSession(array $user): void
    {
        $user = $user[0];

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_first_name'] = $user['first_name'];
        $_SESSION['user_last_name'] = $user['last_name'];
        $_SESSION['user_password'] = $user['password'];
        $_SESSION['user_profile_image'] = $user['profile_image'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_level'] = $user['level'];
        $_SESSION['user_exp'] = $user['exp'];
        $_SESSION['user_lvl_up'] = $user['level_up'];

        $this->redirect('./');
    }

    public function logoutAction(): void
    {
        session_start();

        unset($_SESSION['user_id']);
        unset($_SESSION['user_first_name']);
        unset($_SESSION['user_last_name']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_profile_image']);
        unset($_SESSION['user_level']);
        unset($_SESSION['user_exp']);
        unset($_SESSION['user_lvl_up']);

        session_destroy();

        $this->redirect('./');
    }
}
