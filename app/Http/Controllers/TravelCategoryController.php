<?php

namespace App\Http\Controllers;

use App\Models\TravelCategory;
use App\Http\Requests\StoreTravelCategoryRequest;
use App\Http\Requests\UpdateTravelCategoryRequest;

class TravelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.budgets.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.budgets.categories.create', [
                'title' => 'Tambah Kategori Perjalanan',]);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTravelCategoryRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        TravelCategory::create($validatedData);
        return redirect('/dashboard/budgets')->with('success', 'Kategori Baru Berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(TravelCategory $travelCategory)
    {
        return view('dashboard.budgets.categories.show', [
            'category' => $travelCategory,
            'title' => 'Detail Kategori : ' . $travelCategory->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelCategory $travelCategory)
    {
        return view('dashboard.budgets.categories.edit', [
            'title' => "Edit Kategori",
            'category' => $travelCategory,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTravelCategoryRequest $request, TravelCategory $travelCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelCategory $travelCategory)
    {
        TravelCategory::destroy($travelCategory->id);
        // return redirect('/dashboard/budgets')->with('success', 'Kategori Berhasil dihapus!');
    }
}
