<?php

namespace App\Http\Controllers;

use App\Dtos\CreateUserDto;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\WelcomeEmail;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService){}
    public function register(){
        return view('auth.register');
    }

    public function store(CreateUserRequest $request){
        $userDto = CreateUserDto::fromFormRequest($request);
        $user=$this->userService->createUser($userDto);
        Mail::to($user->email)->send(new WelcomeEmail($user));
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
