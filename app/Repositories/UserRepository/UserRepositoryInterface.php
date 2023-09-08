<?php

namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function getUsers();
    public function getUserById($userId);
    public function getUserByCondition($field, $value);
    public function deleteUser($userId);
    public function createUser(array $userDetails);
    public function updateUser($userId, array $userDetails);
}
