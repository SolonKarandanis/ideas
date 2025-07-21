<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService){}
    public function register(){
        return view('auth.register');
    }

    public function store(CreateUserRequest $request){
        $userDto = UserDto::fromAPiFormRequest($request);
        $validatedData =$request->only(['name','email','password']);
        User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
        ]);
        return redirect()->route('dashboard')
            ->with('success', 'User registered successfully!');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request){
        $validatedData =$request->only('email', 'password');
        if(auth()->attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'User logged in successfully!');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'User logged out successfully!');
    }
}
