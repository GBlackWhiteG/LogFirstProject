<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        if (session()->has('user')) {
            session()->forget('user');
        }

        return redirect()->route('user.auth');
    }
}
