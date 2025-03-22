<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\User;
use App\Models\Outcome;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.index', [
            'title' => 'Daftar Antrian Surat Tugas',
            'posts' => Post::filter(request(['search', 'category', 'author', 'name']))->latest()->where('status', 'diajukan')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.master.edit', [
            'title' => 'Edit SPPD',
            'users' => User::all(),
            'posts' => Post::all(),
            'post' => $post,
            'ways' => Post::jalur(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function approve($id)
    {
        Log::info("Approve method called for slug: " . $id);

        $sppd = Post::findOrFail($id);

        $sppd->status = 'disetujui';
        $sppd->save();

        // Tambahkan ke tabel outcomes
        Outcome::create([
            'sppd_id' => $sppd->id,
        ]);
        return redirect('/dashboard/master')->with('success', 'Data SPPD ' . $sppd->name->name  . ' perihal ' . $sppd->maksud .  ', Berhasil disetujui');
    }

    public function accept(Post $post)
    {
        Post::where('id', $post->id)->update(['status' => 'disetujui']);

        return redirect('/dashboard/master')->with('success', 'Perjalanan Dinas ' . $post->name->name  . ' (' . $post->maksud .  ') Telah disetujui');
    }

    public function reject(Post $post)
    {
        Post::where('id', $post->id)->update(['status' => 'ditolak']);

        return redirect('/dashboard/master')->with('error', 'Perjalanan Dinas ' . $post->name->name  . ' (' . $post->maksud .  ') Telah ditolak');
    }
}
