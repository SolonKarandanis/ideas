<?php

namespace App\Http\Controllers;

use App\Services\UserServiceInterface;

class FollowerController extends Controller
{

    public function __construct(private readonly UserServiceInterface $userService){}
    public function follow(int $id)
    {
        $user = $this->userService->getUserById($id);
        $follower = auth()->user();
        $follower->followings()->attach($user);
        return redirect()->route('users.show', $user->id)
            ->with('success', 'Followed successfully');
    }

    public function unfollow(int $id){
        $user = $this->userService->getUserById($id);
        $follower = auth()->user();
        $follower->followings()->detach($user);
        return redirect()->route('users.show', $user->id)
            ->with('success', 'Unfollowed successfully');
    }
}
