<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserEditController extends Controller
{
    public function edit(User $user){
        return view('dashboard.users.edit', [
            'title' => "Edit Akun",
            'user' => $user,
            'roles' => User::user_role(),
            'ranks' => User::rank(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'username' => 'bail|required|unique:users,username|alpha_dash',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'role' => 'required',
            'foto' => 'mimes:svg, jpg, jpeg, png|file|max:512',
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validatedData['foto'] = $request->file('foto')->store('user-foto');
        }

        $validatedData['author_id'] = auth()->user()->id;

        User::where('id', $user->id)->update($validatedData);
        return redirect('/dashboard/users')->with('success', 'Akun Baru Berhasil diperbarui');
    }
}
