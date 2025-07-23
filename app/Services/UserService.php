<?php

namespace App\Services;

use App\Dtos\CreateUserDto;
use App\Dtos\UpdateUserDto;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UserService implements UserServiceInterface
{

    public function __construct(private readonly UserRepositoryInterface $userRepository){}
    public function createUser(CreateUserDto $userDto): Builder|User
    {
        return $this->userRepository->createUser($userDto);
    }

    public function editUser(UpdateUserDto $userDto,UploadedFile|null $imageFile): Builder|User
    {
        $user = $this->getUserById($userDto->getId());
        $user->name = $userDto->getName();
        $user->email = $userDto->getEmail();
        $user->bio = $userDto->getBio();
        if(!is_null($imageFile)){
            if(!is_null($user->image)){
                Storage::delete($user->image);
            }
            $imagePath = $imageFile->store('images', 'public');
            $user->image=$imagePath;
        }
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
