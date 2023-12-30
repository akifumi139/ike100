<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route('projects.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('projects.index');
    }
}
