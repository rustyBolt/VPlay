<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        session_start();

        $id = $userRepository->getID($email);

        $_SESSION["id"] = $id["id"];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/hub");
    }

    public function createAccount() {
        if (!$this->isPost()) {
            return $this->render('createAccount');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordagain = $_POST['passwordagain'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $userRepository = new UserRepository();

        if($password !== $passwordagain) {
            return $this->render('createAccount', ['messages' => ["Passwords don't match!"]]);
        }

        if(!$password) {
            return $this->render('createAccount', ['messages' => ["Missing password!"]]);
        }

        if(!$passwordagain) {
            return $this->render('createAccount', ['messages' => ["Didn't repeat password!"]]);
        }

        if(!$email) {
            return $this->render('createAccount', ['messages' => ["Missing email!"]]);
        }

        if(!$name) {
            return $this->render('createAccount', ['messages' => ["Missing name!"]]);
        }

        if(!$surname) {
            return $this->render('createAccount', ['messages' => ["Missing surname!"]]);
        }

        $userRepository->addUser($email, password_hash($password, PASSWORD_BCRYPT), $name, $surname);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
}