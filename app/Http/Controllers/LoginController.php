<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function show()
    {
        return view("login.show");
    }

    public function login(Request $request)
    {
        $login = $request->login;
        $password = $request->password;
        $remember = $request->has('remember');
        // dd($remember);       

        $info = ['email' => $login, 'password' => $password];

        if (Auth::attempt($info, $remember)) {
            // Regenerate session on successful login
            $request->session()->regenerate();
            return to_route('homepage')->with('success_login', __('login_successful'));
        } else {
            return back()->withErrors([
                'login' => __('invalid_credentials'),
            ])->onlyInput('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        
        return Redirect::route('login')->with('success_logout', __('logout_successful'));
    }
}
