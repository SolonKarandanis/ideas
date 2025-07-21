<?php

namespace App\Services;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

interface UserServiceInterface
{
    public function  createUser(UserDto  $userDto): Builder |User;
    public function  editUser(UserDto $userDto): Builder |User;
    public function  getUserById(int $userId): Builder|User;
}
