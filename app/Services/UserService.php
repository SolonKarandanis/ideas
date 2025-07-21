<?php

namespace App\Services;

use App\Dtos\UserDto;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService implements UserServiceInterface
{

    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }
    public function createUser(UserDto $userDto): Builder|User
    {
        return $this->userRepository->createUser($userDto);
    }

    public function editUser(UserDto $userDto): Builder|User
    {
        $user = $this->getUserById($userDto->getId());
        return $this->userRepository->editUser($user);
    }

    public function getUserById(int $userId): Builder|User
    {
        $user = $this->userRepository->getUserById($userId);
        if (!$user) {
            throw new ModelNotFoundException("User not found");
        }
        return $user;
    }
}
