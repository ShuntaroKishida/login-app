<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRegisterRequest;
use App\Http\Requests\UsersLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function showRegistrationForm()
    {
        return view('users.register');
    }

    public function register(UsersRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(UsersLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'email' => 'メールアドレスかパスワードが間違っています。',
            ]);
        }
    }

    public function index()
    {
        return view('users.mypage', ['user' => Auth::user()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
