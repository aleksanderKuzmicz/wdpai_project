<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

class UserRepository extends Repository{
    public function getUser(string $email){
        $raw_statement = "SELECT * FROM \"users\" join \"usersDetails\" on users.\"userDetailsID\" = \"usersDetails\".id WHERE email = :email ";
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
            $user_data["surname"],
            $user_data["bike"],
            $user_data["interest1"],
            $user_data["interest2"],
            $user_data["interest3"],
            $user_data["avatar"],
            $user_data["userID"]
            );
    }

    public function getUsers(): array{
        $result = [];
        $raw_statement = "SELECT * FROM \"users\" join \"usersDetails\" on users.\"userDetailsID\" = \"usersDetails\".id ORDER BY \"userID\" DESC";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user_data) {
            $result[] = new User(
                $user_data["email"],
                $user_data["password"],
                $user_data["salt"],
                $user_data["roleID"],
                $user_data["name"],
                $user_data["surname"],
                $user_data["bike"],
                $user_data["interest1"],
                $user_data["interest2"],
                $user_data["interest3"],
                $user_data["avatar"],
                $user_data["userID"]
            );
        }
        return $result;
    }

    public function addUser(User $user){
        $raw_statemet = "INSERT INTO \"usersDetails\" (name, surname, bike, interest1, interest2, interest3, avatar) VALUES (?, ?, ?, ?, ?, ?, ?) RETURNING id";
        $statement = $this->database->connect()->prepare($raw_statemet);
        $statement->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getBike(),
            $user->getInterest1(),
            $user->getInterest2(),
            $user->getInterest3(),
            $user->getAvatar()
        ]);
        $userDetailsID = $statement->fetch(PDO::FETCH_ASSOC)["id"];

        $raw_statemet = "INSERT into \"users\" (email, password, salt, \"roleID\", \"userDetailsID\") values (?, ?, ?, ?, ?)";
        $statement = $this->database->connect()->prepare($raw_statemet);
        $statement->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getSalt(),
            $user->getRoleID(),
            $userDetailsID
        ]);

    }

    public function getUsersByName(string $name) {
        $searchString = '%'.strtolower($name).'%';
        $raw_statement = "SELECT * FROM \"users\" join \"usersDetails\" on users.\"userDetailsID\" = \"usersDetails\".id WHERE LOWER(name) LIKE :param OR LOWER(surname) like :param";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->bindParam(":param", $searchString, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUserToSession(int $userID) {
        $raw_statement = "INSERT INTO \"session\" (\"userID\") values (?)";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->execute([$userID]);
    }

    public function deleteUserFromSession(int $userID) {
        $raw_statement = "DELETE FROM \"session\" WHERE \"userID\"=:param";
        $statement = $this->database->connect()->prepare($raw_statement);
        $statement->bindParam(":param", $userID, PDO::PARAM_STR);
        $statement->execute();
    }

}