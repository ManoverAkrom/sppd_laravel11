<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\TravelComponent;
use App\Models\TravelCategory;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Rencana Anggaran';
        $travel_categories = TravelCategory::all();
        $travel_components = TravelComponent::filter(request(['search', 'travel_category' ]))->orderBy('name', 'asc')->paginate(20)->withQueryString();
        $budgets = Budget::filter(request(['search', ]))->latest()->paginate(10)->withQueryString();
        $active = Budget::first();

        return view('dashboard.budgets.index', compact('title', 'travel_categories', 'travel_components' ,'budgets', 'active', ));

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
    public function store(StoreBudgetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        Budget::destroy($budget->id);
        return redirect('/dashboard/budgets')->with('success', 'Tahun Anggaran Berhasil dihapus!');
    }

    public function spend()
    {
        $title = 'Pengeluaran';
        $budgets = Budget::all(); 

        return view('dashboard.budgets.spend', compact('title', 'budgets'));

    }
}
