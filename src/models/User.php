<?php

class User
{
    private $email;
    private $password;
    private $salt;
    private $roleID;
    private $name;
    private $surname;

    public function __construct(string $email, string $password, string $salt, int $roleID, string $name, string $surname)
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->roleID = $roleID;
        $this->name = $name;
        $this->surname = $surname;
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
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }



}