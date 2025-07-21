<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Services\UserServiceInterface;

class UserController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService){}

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::withCount(['ideas','comments'])->findOrFail($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::withCount(['ideas','comments'])->findOrFail($id);
        $editing=true;
        return view('users.show',compact('user','editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        $userDto = UserDto::fromAPiFormRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
