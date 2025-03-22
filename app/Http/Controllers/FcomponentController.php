<?php

namespace App\Http\Controllers;

use App\Models\Fcomponent;
use Illuminate\Http\Request;

class FcomponentController extends Controller
{
    public function index()
    {
        $components = Fcomponent::all();
        $title = 'Komponen Perjalanan';
        return view('bendahara.components.index', compact('components', 'title'));
    }

    public function create()
    {
        return view('bendahara.components.create', [
            'title' => 'Tambah Komponen Perjalanan',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:fcomponents',
            'amount' => 'required|string|max:255',
        ]);

        Fcomponent::create($request->all());
        return redirect()->route('bendahara.components.index')->with('success', 'Component created successfully.');
    }

    public function show(Fcomponent $fcomponent)
    {
        dd($fcomponent);
        $title = 'Komponen Perjalanan';
        return view('bendahara.components.show', compact('fcomponent', 'title'));
    }

    public function edit(Fcomponent $fcomponent)
    {
        return view('bendahara.components.edit', compact('fcomponent'));
    }

    public function update(Request $request, Fcomponent $fcomponent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:fcomponents,slug,' . $fcomponent->id,
            'amount' => 'required|string|max:255',
        ]);

        $fcomponent->update($request->all());
        return redirect()->route('bendahara.components.index')->with('success', 'Component updated successfully.');
    }

    public function destroy(Fcomponent $fcomponent)
    {
        $fcomponent->delete();
        return redirect()->route('bendahara.components.index')->with('success', 'Component deleted successfully.');
    }
}
