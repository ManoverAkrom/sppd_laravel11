<?php

namespace App\Http\Controllers;

use App\Models\FinanceComponent;
use Illuminate\Http\Request;

class FinanceComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('finance.components.index', [
            'title' => 'Finance Components',
            'components' => FinanceComponent::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('finance.components.create', [
            'title' => 'Create Finance Component',
        ]);
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
    public function show(FinanceComponent $financeComponent)
    {
        // dd($financeComponent);
        return view('finance.components.show', [
            'title' => 'Finance Component',
            'component' => $financeComponent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinanceComponent $financeComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinanceComponent $financeComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinanceComponent $financeComponent)
    {
        FinanceComponent::destroy($financeComponent->id);
        return redirect('/finance/components')->with('success', 'Komponen Berhasil dihapus!');
    }
}
