<?php

namespace App\Http\Controllers;

use App\Models\KategoriBiaya;
use Illuminate\Http\Request;

class KategoriBiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $categories = KategoriBiaya::search($search)->paginate(10);

        return view('bendahara.kategori_biaya.index', [
            'categories' => $categories,
            'title' => 'Kategori Biaya',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bendahara.kategori_biaya.create', [
            'title' => 'Tambah Kategori Biaya',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:kategori_biayas,code|max:255',
            'color' => 'required|max:255',
        ]);

        KategoriBiaya::create($validatedData);

        return redirect()->route('kategori_biaya.index')->with('success', 'Kategori Biaya berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $category = KategoriBiaya::where('code', $code)->firstOrFail();

        return view('bendahara.kategori_biaya.show', [
            'category' => $category,
            'title' => 'Detail Kategori Biaya',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {
        $category = KategoriBiaya::where('code', $code)->firstOrFail();

        return view('bendahara.kategori_biaya.edit', [
            'category' => $category,
            'title' => 'Edit Kategori Biaya',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:kategori_biayas,code,' . $code . ',code',
            'color' => 'required|max:255',
        ]);

        $category = KategoriBiaya::where('code', $code)->firstOrFail();
        $category->update($validatedData);

        return redirect()->route('kategori_biaya.index')->with('success', 'Kategori Biaya berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code)
    {
        $category = KategoriBiaya::where('code', $code)->firstOrFail();
        $category->delete();

        return redirect()->route('kategori_biaya.index')->with('success', 'Kategori Biaya berhasil dihapus');
    }
}
