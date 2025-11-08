<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'isi' => 'required|string',
            'berita_id' => 'required|exists:beritas,id',
        ]);

        // Simpan komentar ke database
        Komentar::create($validated);
        
       return redirect()->route('berita.show', $validated['berita_id'])
            ->with('success', 'Komentar berhasil ditambahkan.');
    }

}
