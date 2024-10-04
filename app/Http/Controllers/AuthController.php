<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('user.login');
    }

    public function auth(): RedirectResponse
    {
        $data = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();

        if (isset($user) && Hash::check($data['password'], $user->password)) {
            Auth::login($user);

            return redirect()->route('product.index');
        }

        return redirect()->back();
    }

    public function signup(): View
    {
        return view('user.signup');
    }

    public function register(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('product.index');
    }

    public function logout(): RedirectResponse
    {
        Auth::forgetUser();

        return redirect()->route('login');
    }
}
