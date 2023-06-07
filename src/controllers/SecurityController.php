<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController{
    public function login(){
         $user = new User('mWazowski@monster.inc', hash("sha256", '****'), 'Mike', 'Wazowski');

         # TODO: doesn't work - login() is called recursively!!!
//         if ($this->isPost()) {
//             return $this->login('login');
//         }

         $email = $_POST["email"];
         $password = hash("sha256", $_POST["password"]);

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