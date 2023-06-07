<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Review.php';


class ReviewController extends AppController{

    const MAX_FILE_SIZE = 5*1024*1024;
    const SUPPORTED_TYPES = ["image/png", "image/jpg"];
    const UPLOAD_DIRECTORY = "/../public/uploads/";

    private $messages = [];

    public function add_review() {
        if($this->isPost() && is_uploaded_file($_FILES["file"]["tmp_name"]) && $this->validate_file($_FILES["file"])) {
            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES["file"]["name"]
            );

            $review = new Review($_POST["title"], $_POST["description"], $_FILES["file"]["name"]);

            $this->render("reviews", ["messages" => $this->messages, "review" => $review]);
        }
        $this->render("add_review", ["messages" => $this->messages]);
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