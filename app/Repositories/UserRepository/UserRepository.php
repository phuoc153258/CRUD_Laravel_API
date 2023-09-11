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

    public function createUser(array $userDetails)
    {
        return User::firstOrCreate(
            ['email' => $userDetails['email']],
            ['name' => $userDetails['name'], 'password' => $userDetails['password']]
        );
    }

    public function updateUser($orderId, array $newDetails)
    {
        return User::whereId($orderId)->update($newDetails);
    }
}
