<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($slug)
        {
            $post = Post::where('slug', $slug)->firstOrFail(); // Ambil post berdasarkan slug
            $title = "Surat Perintah Tugas"; // Judul PDF

            // Buat PDF dari view
            $pdf = Pdf::loadView('dashboard.posts.show', compact('post', 'title'));

            // Kembalikan PDF sebagai response
            // return $pdf->download('surat_perintah_tugas.pdf');
            return $pdf->stream('surat_perintah_tugas.pdf', ['Attachment' => false]);
        }

        public function summaryPDF(Post $post)
        {
            return view('dashboard.pdf.pdf-sppd', [
            'title' => 'Edit SPPD',
            'categories' => Category::all(),
            'users' => User::all(),
            'posts' => Post::all(),
            'post' => $post,
            'ways' => Post::jalur(),
            ]);

            $pdf = Pdf::loadView('dashboard.pdf.pdf-summary', compact('post', 'title'));
            return $pdf->stream('surat_perintah_tugas.pdf', ['Attachment' => false]);
        }
}
