<?php

namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\UserRepository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers()
    {
        return User::all();
    }

    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public function getUserByCondition($field, $value)
    {
        return User::where($field, $value)->first();
    }

    public function deleteUser($userId)
    {
        User::destroy($userId);
    }

    public function createUser(array $orderDetails)
    {
        return User::create($orderDetails);
    }

    public function updateUser($orderId, array $newDetails)
    {
        return User::whereId($orderId)->update($newDetails);
    }
}
