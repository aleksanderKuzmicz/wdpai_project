<?php

class User
{
    private $email;
    private $password;
    private $salt;
    private $roleID;
    private $name;
    private $surname;
    private $bike;
    private $interest1;
    private $interest2;
    private $interest3;
    private $avatar;
    private $userID;


    public function __construct(string $email, string $password, string $salt, int $roleID, string $name, $surname, string $bike, string $interest1, string $interest2, string $interest3, string $avatar, int $userID)
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->roleID = $roleID;
        $this->name = $name;
        $this->surname = $surname;
        $this->bike = $bike;
        $this->interest1 = $interest1;
        $this->interest2 = $interest2;
        $this->interest3 = $interest3;
        $this->avatar = $avatar;
        $this->userID = $userID;
    }/**
 * @return int
 */
public function getUserID(): int
{
    return $this->userID;
}/**
 * @param int $userID
 */
public function setUserID(int $userID)
{
    $this->userID = $userID;
}

    /**
     * @return mixed
     */
    public function getBike()
    {
        return $this->bike;
    }

    /**
     * @param mixed $bike
     */
    public function setBike($bike)
    {
        $this->bike = $bike;
    }

    /**
     * @return mixed
     */
    public function getInterest1()
    {
        return $this->interest1 ?: "";
    }

    /**
     * @param mixed $interest1
     */
    public function setInterest1($interest1)
    {
        $this->interest1 = $interest1 ?: "";
    }

    /**
     * @return mixed
     */
    public function getInterest2()
    {
        return $this->interest2 ?: "";
    }

    /**
     * @param mixed $interest2
     */
    public function setInterest2($interest2)
    {
        $this->interest2 = $interest2 ?: "";

    }

    /**
     * @return mixed
     */
    public function getInterest3()
    {
        return $this->interest3 ?: "";
    }

    /**
     * @param mixed $interest3
     */
    public function setInterest3($interest3)
    {
        $this->interest3 = $interest3 ?: "";
    }


    public function getAvatar()
    {
        return $this->avatar;
    }


    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt()
    {
        $this->salt = "foo";
    }

    public function getRoleID()
    {
        return $this->roleID;
    }

    public function setRoleID($roleID)
    {
        $this->roleID = $roleID;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname?: "";
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname?: "";
    }



}