<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // untuk method controller untuk landing page
    public function index()
    {
        $semua_berita = Berita::with('wartawan', 'komentar')
        ->latest()
        ->get();

        return view('berita.index',[
            'semua_berita' => $semua_berita
        ]);
    }

    // FUNGSI SHOW BUAT KOMENTAR SETELAH DISUMBIT
    public function show($id)
    {
        $berita = Berita::with('wartawan', 'komentar')->findOrFail($id);
        return view('berita.show', compact('berita'));
    }
}
