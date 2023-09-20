<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('fe.login');
    }

    public function register()
    {
        return view('fe.register');
    }

    //post register
    public function postRegister(Request $req)
    {
        $req->merge(['password' => Hash::make($req->password)]);
        try {
            User::create($req->all());
        } catch (\Throwable $th) {
        }

        return redirect()->route('login')->with('success', 'Đăng ký thành công, đăng nhập đi bạn');
    }

    //post login
    public function postLogin(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('error', 'Sai email hoặc pass nè mày');
    }

    //logout
    public function logout(Request $req)
    {
        Auth::logout();

        return redirect()->back();
    }
}
