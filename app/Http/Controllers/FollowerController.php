<?php

namespace App\Http\Controllers;

use App\Services\UserServiceInterface;

class FollowerController extends Controller
{

    public function __construct(private readonly UserServiceInterface $userService){}
    public function follow(int $id)
    {

        $follower = auth()->user();
        $this->userService->followUser($id,$follower);
        return redirect()->route('users.show', $id)
            ->with('success', 'Followed successfully');
    }

    public function unfollow(int $id){
        $follower = auth()->user();
        $this->userService->unfollowUser($id,$follower);
        return redirect()->route('users.show', $id)
            ->with('success', 'Unfollowed successfully');
    }
}
