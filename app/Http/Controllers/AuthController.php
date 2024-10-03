<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
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
            session(['user' => ['id' => $user['id'], 'name' => $user['name'], 'email' => $user['email']]]);

            return redirect()->route('product.index');
        }

        return redirect()->back();
    }
}
