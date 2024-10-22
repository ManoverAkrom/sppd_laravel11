<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\Pemberitahuan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){

        $email = Auth::user()->email;

        $thisSurat = Surat::where('email', $email)->get();

        $surat = $thisSurat->pluck('surat')->implode(', ');

        $totalDisetujui = $thisSurat->where('status', 'disetujui')->count();

        $pemberitahuan = Pemberitahuan::where('email', $email)->get();

        $totalPemberitahuan = $pemberitahuan->count();

        return view('user.index', [
            'surat' => $surat,
            'totalDisetujui' => $totalDisetujui,
            'pemberitahuan' => $pemberitahuan,
            'totalPemberitahuan' => $totalPemberitahuan,
        ]);
    }

    public function spt()
    {
        $email = Auth::user()->email;
        $isRegistered = Surat::where('email', $email)->where('surat', 'spt')->exists();

        $pemberitahuan = Pemberitahuan::where('email', $email)->get();

        $totalPemberitahuan = $pemberitahuan->count();

        return view('user.spt', [
            'isRegistered' => $isRegistered, 
            'pemberitahuan' => $pemberitahuan, 
            'totalPemberitahuan' =>  $totalPemberitahuan
        ]);
    }

    public function laporan()
    {
        $suratList = Surat::where('email', Auth::user()->email)->get();

        $isJadwal = collect();
        $approvedSuratList = collect();

        if ($suratList->isNotEmpty()) {
            foreach ($suratList as $surat) {
                if ($surat->status === 'disetujui') {
                    // $isJadwal = $isJadwal->merge(Jadwal::where('surat', $surat->surat)->get());
                    $approvedSuratList->push($surat);
                }
            }
        }

        $laporan = $approvedSuratList->map(function ($surat) {
            return (object)[
                'name' => $surat->name,
                'email' => $surat->email,
                'surat' => $surat->surat,
                'start' => $surat->created_at->format('Y/m/d')
            ];
        });

        $notification = Pemberitahuan::where('email',Auth::user()->email)->get();
        $countNotifications = $notification->count();

        return view('user.laporan', [
            'isJadwal' => $isJadwal,
            'laporan' => $laporan,
            'notification' => $notification,
            'countNotifications' => $countNotifications
        ]);
    }
    function generateLaporanPdf() {
        $user = Auth::user();
        $suratList = Surat::where('email', Auth::user()->email)->get();
        $isJadwal = collect();
    
        if ($suratList->isNotEmpty()) {
            foreach ($suratList as $surat) {
                if ($surat->status === 'disetujui') {
                    // $isJadwal = $isJadwal->merge(Jadwal::where('surat', $surat->surat)->get());
                }
            }
        }
    
        $laporan = $suratList->map(function ($surat) {
            return [
                'name' => $surat->name,
                'email' => $surat->email,
                'surat' => $surat->surat,
                'start' => $surat->created_at,
            ];
        });

        $idSurat = 'KRS-' . strtoupper(substr($user->name, 0, 3)) . '-' . $user->id;
        $noPelajar = 'NP-' . strtoupper(substr($user->name, 0, 3)) . '-' . date('Ymd', strtotime($user->created_at));

        $timestamp = now()->format('Ymd_His');
        $filename = 'laporan_surat_' . $user->id . '_' . $timestamp . '.pdf';
    
        $pdf = PDF::loadView('user.laporan_pdf', [
            'idSurat' => $idSurat,
            'noPelajar' => $noPelajar,
            'isJadwal' => $isJadwal,
            'laporan' => $laporan,
            'user' => $user
        ]);
    
        return $pdf->download($filename);
    }

    // Surat
    function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'alamat' => 'required|string',
            'alasan' => 'required|string',
            'kursus' => 'required'
        ],[
            'name.required' => 'name wajib diisi!',
            'email.required' => 'email wajib diisi!',
            'alamat.required' => 'alamat wajib diisi!',
            'alasan.required' => 'alasan wajib diisi!',
            'surat.required' => 'kursus wajib diisi!'
        ]);

        Surat::create([
            'category_id' => 'required',
            'slug' => 'required|unique:surats',
            'maksud' => 'required|max:255',
            'file' => 'mimes:pdf,jpg,jpeg,png,jfif|file|max:2048',

            'sumber' => 'nullable',
            'instansi' => 'nullable',
            'no_surat_sumber' => 'nullable',
            'tgl_surat_sumber' => 'nullable|date',
            'hal_surat_sumber' => 'nullable',
            'nama' => 'nullable',
            'nip' => 'nullable',
            'pengikut' => 'nullable',
            'tempat_berjalan' => 'nullable',
            'tempat_tujuan' => 'nullable',
            'tgl_berangkat' => 'nullable|date',
            'tgl_kembali' => 'nullable|date',
            'lama' => 'nullable|string',
            'jam_berangkat' => 'nullable',
            'keterangan' => 'nullable',

            'no_spt' => 'nullable'
        ]);

        $currentWaktu = Carbon::now()->format('F j, Y');

        Pemberitahuan::create([
            'email' => $request->email,
            'waktu' => $currentWaktu,
            'pesan' => "Berhasil Mendaftar Kursus $request->kursus! Mohon tunggu persentujuan dari Admin. Terimakasih",
        ]);

        return redirect()->route('user')->with('success', 'Berhasil mendaftar. Silakan cek pusat peringatan secara berkala!.');
    }
}
