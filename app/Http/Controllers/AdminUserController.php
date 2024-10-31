<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'ranks' => User::rank(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required',
            'nip' => 'string|max:18',
            'pangkat' => 'nullable',
            'jabatan' => 'nullable',
            'foto' => 'mimes:svg, jpg,jpeg,png|file|max:512',
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'bail|required|unique:users|alpha_dash';
        }
        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users,email';
        }

        $validatedData = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('user-foto');
        }

        $validatedData['id'] = $user->id;

        User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', 'Akun ' . $user->name . ' Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->file){
            Storage::delete($user->foto);
        }
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'Data user : ' . $user->name  . ', Berhasil dihapus');
    }
}
