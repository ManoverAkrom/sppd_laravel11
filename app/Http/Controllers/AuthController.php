<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ],[
            // 'name.required' =>  'Nama wajib diisi',
            // 'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            // 'uername.required' => 'Username Wajib diisi',
            // 'email.required' =>  'Email wajib diisi',
            // 'email.email' =>  'Email harus valid',
            // 'email.unique' => 'Email sudah terdaftar',
            // 'password.required' =>  'Password wajib diisi',
            // 'password.min' => 'Password minimal 5 karakter'

        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            // SMTP
            Notification::send($user, new VerifyEmail());

            return redirect()->route('auth')->with('success', 'Berhasil Mendaftar! Silahkan cek email untuk verifikasi akun.');
        } catch (\Exception $e) {
            return redirect()->route('auth')->with('error', 'Gagal Mendaftar! ' . $e);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
            ],[
                // 'username.required' => 'Username wajib diisi',
                // 'password.required' => 'Password wajib diisi',
                // 'password.min' =>  'Password minimal 5 karakter',
            ]);

            if (Auth::attempt($request->only('username', 'password'))) {
                if(Auth::user()->email_verified_at){
                    $request->session()->regenerate();
                    if(Auth::user()->role === 'master'){
                        return redirect()->route('master')->with('success', 'Selamat Datang Master!');
                    } else if(Auth::user()->role === 'admin'){
                        return redirect()->route('admin')->with('success', 'Selamat Datang Admin!');
                    } else if(Auth::user()->role === 'treasurer'){
                        return redirect()->route('treasurer')->with('success', 'Selamat Datang, Semoga harimu menyenangkan!');
                    }else {
                        return redirect()->route('user')->with('success', 'Anda berhasil masuk');                        
                    }
                } else {
                    Auth::logout();
                    return back()->with('error', 'Harap verifikasi akun!');
                }
            }

            return redirect()->route('auth')->with('error', 'username atau password salah!');
    }

    public function verify($id, $hash) {
        $user = User::findOrFail($id);

        if(sha1($user->getEmailForVerification()) !== $hash) {
            return redirect()->route('auth')->with('error', 'Link Verifikasi Tidak Valid!');
        }
        
        if($user->hasVerifiedEmail()) {
            return redirect()->route('auth')->with('success', 'Akun sudah terverifikasi.');
        }
        if($user->markEmailAsVerified()) {
            return redirect()->route('auth')->with('success', 'Akun berhasil diverifikasi');
        }

        return redirect()->route('auth')->with('error', 'Gagal Verifikasi Email!');

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
