<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'title' => "Daftar Akun",
            'users' => User::filter(request(['search']))->orderBy('role')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => "Tambah Akun",
            'roles' => User::user_role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'bail|required|unique:users,username|alpha_dash',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'role' => 'required',
            'password' => [
                'required',
                Password::min(6)->letters()->mixedCase()->numbers()->symbols(),
            ],
            'password_confirmation' => 'same:password',
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        User::create($validatedData);
        return redirect('/dashboard/users')->with('success', 'Akun Baru Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user,
            'title' => 'Detail Info Akun',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => "Edit Akun",
            'user' => $user,
            'roles' => User::user_role(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
