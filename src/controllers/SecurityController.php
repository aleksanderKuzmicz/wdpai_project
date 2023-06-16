<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{
    const MAX_FILE_SIZE = 5*1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpg"];
    const UPLOAD_DIRECTORY = "/../public/uploads/avatars/";

    private $userRepository;

    public function __construct(){
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

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

    public function register()
    {
        if (!$this->isPost()) {
            $this->render('register');
        }
        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $roleID = 1;
            $confirmedPassword = $_POST['confirmedPassword'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $bike = $_POST['bike'];
            $interest1 = $_POST['interest1'];
            $interest2 = $_POST['interest2'];
            $interest3 = $_POST['interest3'];

            if (is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate_file($_FILES["file"])) {
                move_uploaded_file(
                    $_FILES["file"]["tmp_name"],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES["file"]["name"]
                );
                $avatar = $_FILES["file"]["name"];
            } else {
                $avatar = "default.png";
            }

            if ($password !== $confirmedPassword) {
                $this->render('register', ['messages' => ['Please provide proper password']]);
            }

            //TODO try to use better hash function
            $user = new User($email, $password, $password, $roleID, $name, $surname, $bike, $interest1, $interest2, $interest3, $avatar);

            $this->userRepository->addUser($user);

            $this->render('login', ['messages' => ['You\'ve been successfully registered!']]);
        }
    }

    public function community() {
        $users = $this->userRepository->getUsers();
        $this->render("community", ["users" => $users]);
    }
    
    public function search_people() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "";
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded_content = json_decode($content, true);
            
            header("Content-type: application/json");
            http_response_code(200);
            echo json_encode($this->userRepository->getUsersByName($decoded_content["search"]));
        }
    }

    private function validate_file(array $file): bool {
        if($file["size"] > self::MAX_FILE_SIZE){
            $this->messages[] = "Provided file is too large :(";
            return false;
        }
        if(!isset($file["type"]) && !in_array($file["type"], self::SUPPORTED_TYPES)) {
            $this->messages[] = "Provided file type (".$file["type"].") is not supported :(";
            return false;
        }
        return true;
    }
}