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
  $title = 'Edit Outcome';
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
  // $outcome->update($request->only('kategori_id', 'komponen', 'biaya'));
  foreach ($request->inputs as $key => $value) {
   Outcome::create($value);
  }


  // Ubah status SPPD menjadi 'done' jika diperlukan
  $sppd = Post::findOrFail($outcome->sppd_id);
  $sppd->status = 'done'; // Atau logika lain sesuai kebutuhan
  $sppd->save();

  return redirect('/dashboard/outcomes')->with('success', 'Pembiayaan berhasil diperbarui.');
 }
}
