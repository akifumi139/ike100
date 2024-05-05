<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function index()
    {
        return view("auth.index");
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return to_route('projects.index');
    }

    public function logout()
    {
        Auth::logout();

        if (strstr(url()->previous(), 'blog')) {
            return to_route('blog.index');
        }

        return to_route('projects.index');
    }
}
