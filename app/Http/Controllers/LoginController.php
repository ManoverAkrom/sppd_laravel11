<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login | Register'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Berhasil Mendaftar! Silahkan Login!.');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
            ]);

            if(Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard')->with('success', 'Selamat Datang, Mari bersenang-senang!');
            }

            return back()->with('error', 'username atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success', 'Sampai jumpa lagi, semoga harimu menyenangkan!');
    }
}
