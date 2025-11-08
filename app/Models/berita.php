<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'ringkasan',
        'isi',
        'gambar', # sekadar menambahan field gambar untuk membuat tampilan menarik
        'wartawan_id',
    ];

    public function wartawan()
    {
        return $this->belongsTo(wartawan::class, 'wartawan_id');
    }

    // TAMBAHIN LATEST UNTUK TAMPILIN KOMENTAR TERBARU DI ATAS
    public function komentar()
    {
        return $this->hasMany(komentar::class, 'berita_id')->latest();
    }
}
