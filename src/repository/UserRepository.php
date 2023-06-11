<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

class UserRepository extends Repository{
    public function getUser(string $email){
        $raw_statement = "SELECT * FROM users WHERE email = :email";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->bindParam(":email", $email, PDO::PARAM_STR);
        $statement->execute();

        $user_data = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user_data === false) {
            return null;
        }

        return new User(
            $user_data["email"],
            $user_data["password"],
            $user_data["salt"],
            $user_data["roleID"],
            $user_data["name"],
            $user_data["surname"]
            );
    }

}