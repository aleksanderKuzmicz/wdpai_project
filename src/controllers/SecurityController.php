<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    public function login(){
        if (!$this->isPost()) {
            $this->render('login');
        }

        $email = $_POST["email"];
        //$password = hash("sha256", $_POST["password"]);
        $password = $_POST["password"];

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if (!$user) {
            $this->render("login", ["messages" => ["User does not exist!"]]);
        }

        if ($user->getEmail() !== $email) {
         $this->render('login', ['messages' => ['User with this email does not exist.']]);
        }

        if ($user->getPassword() !== $password){
         $this->render('login', ['messages' => ['Wrong password.']]);
        }

        //        return $this->render('reviews');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/reviews");

    }
}