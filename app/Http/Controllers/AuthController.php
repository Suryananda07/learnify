<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt($credentials)){
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'Email atau password anda salah'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));

    }

    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|max:100',
            'username' => 'required|unique:users,username|max:50',
            'password' => 'required|min:8|confirmed'
        ],[
            'name.required' => 'nama harus diisi'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        FacadesAuth::login($user);

        return redirect(route('home'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
