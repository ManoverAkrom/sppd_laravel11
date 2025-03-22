<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\KomponenBiaya;
use App\Models\KategoriBiaya;

class KomponenBiayaController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Komponen Biaya';
        $komponenBiayas = KomponenBiaya::with('kategori')->latest()->paginate(10);

        return view('bendahara.komponen_biaya.index', compact('komponenBiayas', 'title'));
    }

    public function create()
    {
        $kategoriBiayas = KategoriBiaya::all();
        return view('bendahara.komponen_biaya.create', compact('kategoriBiayas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori_biayas,id',
            'nama_komponen' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:komponen_biayas',
            'biaya' => 'required|numeric',
        ]);

        KomponenBiaya::create($request->all());

        return redirect()->route('komponen_biaya.index')->with('success', 'Komponen Biaya berhasil ditambahkan.');
    }

    public function show($kode)
    {
        $komponenBiaya = KomponenBiaya::with('kategori')->where('kode', $kode)->firstOrFail();

        return view('bendahara.komponen_biaya.show', compact('komponenBiaya'));
    }

    public function edit($kode)
    {
        $komponenBiaya = KomponenBiaya::where('kode', $kode)->firstOrFail();
        $kategoriBiayas = KategoriBiaya::all();
        return view('bendahara.komponen_biaya.edit', compact('komponenBiaya', 'kategoriBiayas'));
    }

    public function update(Request $request, $kode)
    {
        // Log::info('Incoming request data for kode:', $kode); // Debugging statement


        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori_biayas,id',
            'nama_komponen' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:komponen_biayas,kode,' . $kode . ',kode',
            'biaya' => 'required|numeric',
        ]);

        $komponenBiaya = KomponenBiaya::where('kode', $kode)->firstOrFail();
        $komponenBiaya->update($validatedData);


        return redirect()->route('komponen_biaya.index')->with('success', 'Komponen Biaya berhasil diperbarui.');
    }

    public function destroy($kode)
    {
        $komponenBiaya = KomponenBiaya::where('kode', $kode)->firstOrFail();
        $komponenBiaya->delete();

        return redirect()->route('komponen_biaya.index')->with('success', 'Komponen Biaya berhasil dihapus.');
    }
}
