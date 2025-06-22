<?php

namespace Services;

use Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function verifyAndGetUser($email, $password)
    {
        return $this->userRepository->login($email, $password);
    }

    public function registerUser($name, $email, $type, $hashedPassword)
    {
        return $this->userRepository->registerUser($name, $email, $type, $hashedPassword);
    }

    public function me($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function addUser($user)
    {
        return $this->userRepository->addUser($user);
    }

    public function editUser($user)
    {
        return $this->userRepository->editUser($user);
    }

    public function deleteUser($userId)
    {
        return $this->userRepository->deleteUser($userId);
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getLatestUser()
    {
        return $this->userRepository->getLatestUser();
    }
}