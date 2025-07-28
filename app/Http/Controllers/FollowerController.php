<?php

namespace App\Http\Controllers;

use App\Services\UserServiceInterface;

class FollowerController extends Controller
{

    public function __construct(private readonly UserServiceInterface $userService){}
    public function follow(int $id)
    {
        $user = $this->userService->getUserById($id);
    }

    public function unfollow(int $id){
        $user = $this->userService->getUserById($id);
    }
}
