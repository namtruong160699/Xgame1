<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin::auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email','password');
        if (Auth::guard('admins')->attempt($data))
        {
            return redirect()->route('admin.home');
        }
        \Session::flash('danger',[
            'type' => 'error',
            'message' => 'Đăng nhập thất bại!'
        ]);
        return redirect()->back();
    }

    public function logoutAdmin()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
