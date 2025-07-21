<?php

namespace App\Repositories;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface
{
    public function modelQuery(): Builder| User;
    public function  createUser(UserDto  $userDto): Builder |User;

    public function  editUser(User $user): Builder |User;
    public function  getUserById(int $userId): Builder|User|null;
}
