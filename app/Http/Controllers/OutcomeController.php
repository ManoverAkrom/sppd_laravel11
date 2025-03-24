<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Outcome;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\KategoriBiaya;
use App\Models\KomponenBiaya;

class OutcomeController extends Controller
{
  public function getComponentsByCategory($categoryId)
  {
    $components = KomponenBiaya::where('kategori_id', $categoryId)->get();
    return response()->json($components);
  }

  public function getBiaya($componentId)
  {
    $component = KomponenBiaya::find($componentId);

    if ($component) {
      return response()->json(['biaya' => $component->biaya]); // Assuming 'biaya' is the field in the component
    }

    return response()->json(['error' => 'Component not found'], 404);
  }

  public function index()
  {
    // $sppdEntries = Post::where('status', 'disetujui')->latest()->paginate(10);
    $sppdEntries = Outcome::with('sppd') // Jika Anda ingin mengambil data SPPD terkait
      ->whereHas('sppd', function ($query) {
        $query->where('status', 'disetujui');
      })
      ->paginate(10);

    return view('bendahara.outcomes.index', compact('sppdEntries'));
  }

  public function create($sppd_id)
  {
    $title = 'Buat Outcome';
    $kategoriBiayas = KategoriBiaya::all();
    $komponenBiayas = KomponenBiaya::all();
    return view('bendahara.outcomes.create', compact('title', 'sppd_id', 'kategoriBiayas', 'komponenBiayas'));
  }

  public function store(Request $request)
  {
    $request->validate([
      // 'sppd_id' => 'required|exists:posts,id',
      'kategori_id' => 'required|exists:kategori_biayas,id',
      'komponen_id' => 'required|exists:kategori_biayas,id',
      'biaya' => 'required|numeric|min:0',
    ]);
    // Simpan data pembayaran ke tabel outcomes
    $outcome = Outcome::create($request->only('sppd_id', 'kategori_id', 'komponen', 'biaya'));

    // Ubah status SPPD menjadi 'done' setelah pembayaran
    $sppd = Post::findOrFail($outcome->sppd_id);
    $sppd->status = 'done';
    $sppd->save();

    return redirect('/dashboard/outcomes')->with('success', 'Pembayaran SPPD ' . $sppd->name->name  . ' perihal ' . $sppd->maksud .  ', Berhasil disimpan');
  }

  public function edit($id)
  {
    $title = 'Pembiayaan';
    $outcome = Outcome::findOrFail($id);
    $categories = KategoriBiaya::all();
    $components = KomponenBiaya::all();
    return view('bendahara.outcomes.edit', compact('title', 'outcome', 'categories', 'components'));
  }

  // Memperbarui data pembiayaan
  public function update(Request $request, $id)
  {
    // Validasi input
    $request->validate([
      'kategori_id' => 'required|exists:kategori_biayas,id',
      'inputs.*.komponen' => 'required',
      'inputs.*.biaya' => 'required|numeric|min:0',
    ]);

    // Temukan outcome berdasarkan ID
    $outcome = Outcome::findOrFail($id);

    // Ambil nama komponen berdasarkan ID untuk inputan pertama
    $component = KomponenBiaya::find($request->inputs[0]['komponen']);
    $componentName = $component ? $component->name : null; // Mendapatkan nama komponen

    // Update data yang ada
    $outcome->update([
      'kategori_id' => $request->kategori_id,
      'komponen' => $componentName, // Simpan nama komponen
      'biaya' => $request->inputs[0]['biaya'], // Update biaya dari inputan pertama
    ]);

    // Simpan setiap inputan tambahan
    foreach ($request->inputs as $key => $value) {
      if ($key > 0) { // Hanya simpan inputan tambahan
        // Ambil nama komponen berdasarkan ID
        $component = KomponenBiaya::find($value['komponen']);
        $componentName = $component ? $component->name : null;

        // Simpan data baru dengan nama komponen
        Outcome::create(array_merge($value, [
          'sppd_id' => $outcome->sppd_id,
          'kategori_id' => $request->kategori_id,
          'komponen' => $componentName // Simpan nama komponen untuk inputan tambahan
        ]));
      }
    }

    // Ubah status SPPD menjadi 'done' jika diperlukan
    $sppd = Post::findOrFail($outcome->sppd_id);
    $sppd->status = 'done'; // Atau logika lain sesuai kebutuhan
    $sppd->save();

    return redirect('/dashboard/outcomes')->with('success', 'Pembiayaan berhasil diperbarui.');
  }
}
