<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
