<?php

namespace App\Http\Controllers;

use App\Models\TravelComponent;
use Illuminate\Http\Request;

class TravelComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.budgets.components.index', [
            'title' => "Komponen Perjalanan Dinas",
            'components' => TravelComponent::all(),
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
    public function show(TravelComponent $travelComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TravelComponent $travelComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TravelComponent $travelComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelComponent $travelComponent)
    {
        // TravelComponent::destroy($travelComponent->id);
        $travelComponent->forceDelete();
        return redirect('/dashboard/budgets')->with('success', 'Komponen Berhasil dihapus!');
    }
}
