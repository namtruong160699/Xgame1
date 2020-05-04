<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $login = $request->only('email','password');
        if (Auth::attempt($login))
        {
            return redirect()->route('home');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
