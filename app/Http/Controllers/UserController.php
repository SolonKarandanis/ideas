<?php

namespace App\Http\Controllers;

use App\Dtos\UpdateUserDto;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Services\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService){}
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = $this->userService->getUserById($id);
        $editing = true;
        return view('users.show', compact('user', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        $userDto = UpdateUserDto::fromFormRequest($request);
        $userDto->setId($id);
        $image =$request->has('image')?$request->file('image'):null;
        $user=$this->userService->editUser($userDto, $image);
        return view('users.show', compact('user'))
            ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function profile()
    {
        $user = $this->userService->getUserById(auth()->id());
        return view('users.show', compact('user'));
    }
}
