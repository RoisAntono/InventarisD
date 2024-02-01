<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // if(Auth::attampt($request->only('username','password'))) {
        //     return view('/dashboard');
        // }

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        
        request()->session()->regenerateToken();

        return redirect('/login');

    }
}
