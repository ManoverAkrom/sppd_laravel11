<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'title' => "Klasifikasi Surat",
            'categories' => Category::filter(request(['search']))->orderBy('code')->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => "Tambah Klasifikasi Surat",
            'names' => Category::name_class(),
            'colors' => Category::color(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required|max:255',
            'sub_name' => 'required',
            'activity' => 'required',
            'transaction' => 'required',
            'color' => 'required',
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Kategori/Klasifikasi Surat Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category,
            'title' => 'Detail info klasifikasi surat : ' . $category->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => "Edit Klasifikasi Surat",
            'category' => $category,
            'names' => Category::name_class(),
            'colors' => Category::color(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required|max:255',
            'sub_name' => 'required',
            'activity' => 'required',
            'transaction' => 'required',
            'color' => 'required',
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        Category::where('id', $category->id)
        ->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Kategori/Klasifikasi Surat (' . $category->code . ' - ' . $category->transaction . ') Sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        
        return redirect('/dashboard/categories')->with('success', 'Kategori/Klasifikasi Surat (' . $category->code . ' - ' . $category->transaction . ') berhasil dihapus');
    }
}
