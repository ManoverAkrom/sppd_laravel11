<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use Illuminate\Http\Request;
use App\Models\KategoriBiaya;
use App\Models\KomponenBiaya;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\DB;

class BendaharaReportController extends Controller
{
  public function printReport()
  {
    $title = "Laporan Keuangan SPPD";
    $reports = Outcome::with('kategori', 'sppd')
      ->select('id', 'sppd_id', 'kategori_id', 'komponen', 'biaya', DB::raw('SUM(biaya) as total_expenditure'))
      ->groupBy('sppd_id') // Group by necessary fields
      ->havingRaw('SUM(biaya) > 0') // Ensure we only get entries with total expenditure greater than 0
      ->get();

    // Initialize Mpdf
    $mpdf = new Mpdf();
    $html = view('bendahara.outcomes.print-report', compact('title', 'reports'))->render();
    $mpdf->WriteHTML($html); // Write the HTML content to the PDF
    // Render the PDF content to the browser
    $mpdf->Output('laporan_keuangan_sppd.pdf', 'I'); // Output the PDF to the browser
  }

  public function downloadReport()
  {
    $title = "Laporan Keuangan SPPD";
    $reports = Outcome::with('kategori', 'sppd')
      ->select('id', 'sppd_id', 'kategori_id', 'komponen', 'biaya', DB::raw('SUM(biaya) as total_expenditure'))
      ->groupBy('sppd_id') // Group by necessary fields
      ->havingRaw('SUM(biaya) > 0') // Ensure we only get entries with total expenditure greater than 0
      ->get();

    // Initialize Mpdf
    $mpdf = new Mpdf();
    $html = view('bendahara.outcomes.print-report', compact('title', 'reports'))->render();
    $mpdf->WriteHTML($html); // Write the HTML content to the PDF
    return $mpdf->Output('laporan_keuangan_sppd.pdf', 'D'); // Force download the PDF
  }

  public function index()
  {
    $title = "Laporan Keuangan";
    $reports = Outcome::with('kategori', 'sppd')->select('id', 'sppd_id', 'kategori_id', 'komponen', 'biaya', DB::raw('SUM(biaya) as total_expenditure'))
      ->groupBy('sppd_id')
      ->paginate(10);

    return view('bendahara.outcomes.report', compact('title', 'reports'));
  }

  public function getOutcomesBySppdId($sppdId)
  {
    $components = Outcome::where('sppd_id', $sppdId)
      ->select('komponen', 'biaya')
      ->get();

    $totalExpenditure = $components->sum('biaya');

    return response()->json([
      'components' => $components,
      'total_expenditure' => $totalExpenditure,
    ]);
  }

  public function get_components($categoryId)
  {
    // Ambil komponen berdasarkan kategori_id
    $components = KomponenBiaya::where('kategori_id', $categoryId)->get();

    // Mengembalikan data sebagai JSON
    return response()->json($components);
  }

  public function get_biaya($componentId)
  {
    $component = KomponenBiaya::find($componentId);

    if ($component) {
      return response()->json(['biaya' => $component->biaya]); // Assuming 'biaya' is the field in the component
    }

    return response()->json(['error' => 'Component not found'], 404);
  }

  public function edit($id)
  {
    $title = "Edit Pembiayaan";
    $outcome = Outcome::findOrFail($id); // Fetch the specific outcome
    $categories = KategoriBiaya::all();
    $components = KomponenBiaya::all();

    // Fetch all outcomes with the same sppd_id and kategori_id
    $relatedOutcomes = Outcome::with('kategori', 'sppd')
      ->where('sppd_id', $outcome->sppd_id)
      ->get();

    return view('bendahara.outcomes.edit-report', compact('title', 'outcome', 'categories', 'components', 'relatedOutcomes'));
  }

  public function update(Request $request, $id)
  {
    // Validasi data yang diterima
    $validatedData = $request->validate([
      'sppd_id' => 'required|integer',
      'kategori_id' => 'required|integer',
      'inputs.*.komponen' => 'required|string|max:255',
      'inputs.*.biaya' => 'required|numeric',
      'inputs.*.kategori_id' => 'required|integer',
      'inputs.*.id' => 'nullable|integer', // Tambahkan validasi untuk ID
    ]);

    // Temukan laporan berdasarkan ID
    $outcome = Outcome::findOrFail($id);
    $outcome->sppd_id = $validatedData['sppd_id'];
    $outcome->kategori_id = $validatedData['kategori_id'];
    $outcome->save(); // Simpan perubahan pada laporan utama

    $updatedCount = 0; // Untuk menghitung jumlah komponen yang diperbarui
    $createdCount = 0; // Untuk menghitung jumlah komponen yang baru ditambahkan

    // Proses setiap input komponen
    foreach ($validatedData['inputs'] as $input) {
      // Cek apakah komponen baru atau yang sudah ada
      if (isset($input['komponen']) && !empty($input['komponen'])) {
        if (isset($input['id']) && !empty($input['id'])) {
          // Jika ID ada, berarti ini adalah entri yang sudah ada
          $existingComponent = Outcome::find($input['id']);
          if ($existingComponent) {
            $existingComponent->komponen = $input['komponen'];
            $existingComponent->biaya = $input['biaya'];
            $existingComponent->kategori_id = $input['kategori_id'];
            $existingComponent->save();
            $updatedCount++; // Increment jumlah yang diperbarui
          }
        } else {
          // Jika komponen baru, buat entri baru
          Outcome::create([
            'komponen' => $input['komponen'],
            'biaya' => $input['biaya'],
            'kategori_id' => $input['kategori_id'],
            'sppd_id' => $validatedData['sppd_id'], // Menyimpan sppd_id di entri baru
          ]);
          $createdCount++; // Increment jumlah yang baru ditambahkan
        }
      }
    }

    return redirect('/bendahara/report')->with('success', "Laporan berhasil diperbarui. $updatedCount komponen diperbarui dan $createdCount komponen baru ditambahkan.");
  }
}
