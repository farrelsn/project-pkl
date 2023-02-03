<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        // Login success
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        else{
            return view('login.index', ['title' => 'Login']);
        }
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            //return redirect('/login');
            return redirect()->route('dashboard');
        }
        else{
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
