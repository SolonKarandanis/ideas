<?php

namespace App\Services;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

interface UserServiceInterface
{
    public function  createUser(CreateUserDto $userDto): Builder |User;
    public function  editUser(UpdateUserDto $userDto): Builder |User;
    public function  getUserById(int $userId): Builder|User;
}
