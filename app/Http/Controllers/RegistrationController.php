<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        return view('user.signup');
    }

    public function store(): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        session(['user' => ['id' => $user['id'], 'name' => $user['name'], 'email' => $user['email']]]);

        return redirect()->route('product.index');
    }
}
