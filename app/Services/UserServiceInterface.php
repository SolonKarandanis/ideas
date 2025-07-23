<?php

namespace App\Services;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\UploadedFile;

interface UserServiceInterface
{
    public function  createUser(CreateUserDto $userDto): Builder |User;
    public function  editUser(UpdateUserDto $userDto, UploadedFile|null $imageFile): Builder |User;
    public function  getUserById(int $userId): Builder|User;
}
