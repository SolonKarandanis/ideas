<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function modelQuery(): Builder|User
    {
        return User::query();
    }

    public function createUser(UserDto $userDto): Builder|User
    {
        return $this->modelQuery()->create([
            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'password' => Hash::make($userDto->getPassword()),
        ]);
    }

    public function getUserById(int $userId): Builder|User
    {
        return $this->modelQuery()
            ->withCount(['ideas','comments'])
            ->find($userId);
    }

    public function editUser(User $user): Builder|User
    {
        $user->save();
        return $user;
    }
}
