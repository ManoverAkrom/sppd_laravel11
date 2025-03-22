<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Post;
use App\Models\User;
use App\Models\Outcome;
use App\Models\Category;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'master' || auth()->user()->role == 'admin') {
            return view('dashboard.posts.index', [
                'title' => 'Daftar Surat Tugas Anda',
                'posts' => Post::filter(request(['search', 'category', 'author', 'name']))->latest()->paginate(10)->withQueryString(),
            ]);
        }

        return view('dashboard.posts.index', [
            'title' => 'Daftar Surat Tugas Anda',
            'posts' => Post::filter(request(['search', 'category', 'author', 'name']))->latest()->where('name_id', auth()->user()->id)->orwhere('author_id', auth()->user()->id)->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Pengajuan SPPD',
            'categories' => Category::all(),
            'users' => User::all(),
            'ways' => Post::jalur(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'maksud' => 'required|max:255',
            'file' => 'mimes:pdf|file|max:1024',

            'sumber' => 'nullable',
            'instansi' => 'nullable',
            'no_surat_sumber' => 'nullable',
            'tgl_surat_sumber' => 'nullable|date',
            'hal_surat_sumber' => 'nullable',
            'name_id' => 'required',
            'follower_id' => 'nullable',
            'tempat_berjalan' => 'nullable',
            'tempat_tujuan' => 'nullable',
            'tgl_berangkat' => 'nullable|date',
            'tgl_kembali' => 'nullable|date',
            'lama' => 'nullable|string',
            'jam_berangkat' => 'nullable',
            'keterangan' => 'nullable',

            'no_spt' => 'nullable'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('post-file');
        }

        $validatedData['author_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Perjalanan Dinas sedang diajukan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
            'title' => 'Surat Perintah Tugas Milik ' . $post->name->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit SPPD',
            'categories' => Category::all(),
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
        $rules = [
            'category_id' => 'required',
            'maksud' => 'required|max:255',
            'file' => 'mimes:pdf|file|max:1024',

            'sumber' => 'nullable',
            'instansi' => 'nullable',
            'no_surat_sumber' => 'nullable',
            'tgl_surat_sumber' => 'nullable|date',
            'hal_surat_sumber' => 'nullable',
            'nama' => 'nullable',
            'nip' => 'nullable',
            'pengikut' => 'nullable',
            'tempat_berjalan' => 'nullable',
            'tempat_tujuan' => 'nullable',
            'tgl_berangkat' => 'nullable|date',
            'tgl_kembali' => 'nullable|date',
            'lama' => 'nullable|string',
            'jam_berangkat' => 'nullable',
            'keterangan' => 'nullable',

            'no_spt' => 'nullable'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['file'] = $request->file('file')->store('post-file');
        }

        $validatedData['author_id'] = auth()->user()->id;

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Edit Surat Tugas ' . $post->name->name  . ' (' . $post->maksud .  ') Sudah Tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->file) {
            Storage::delete($post->file);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Data SPPD ' . $post->name->name  . ' perihal ' . $post->maksud .  ', Berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
