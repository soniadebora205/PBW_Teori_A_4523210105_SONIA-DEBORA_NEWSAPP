<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Berita;
use App\Models\Wartawan;
use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT WARTAWAN
        $wartawans = Wartawan::factory(2)->create();

        // 2. BUAT 4 berita (MASING-MASING DIMILIKI OLEH WARTAWAN)
        $berita1 = Berita::factory()->create([
            'wartawan_id' => $wartawans->first()->id,
            'gambar' => 'gambar1.jpg',
        ]);

        $berita2 = Berita::factory()->create([
            'wartawan_id' => $wartawans->first()->id,
            'gambar' => 'gambar2.jpg',
        ]);

        $berita3 = Berita::factory()->create([
            'wartawan_id' => $wartawans->last()->id,
            'gambar' => 'gambar3.jpg',
        ]);

        $berita4 = Berita::factory()->create([
            'wartawan_id' => $wartawans->last()->id,
            'gambar' => 'gambar4.jpg',
        ]);

        $all_berita = collect([
            $berita1,
            $berita2,
            $berita3,
            $berita4,
        ]);
        // 3. BUAT 5 KOMENTAR UNTUK MASING-MASING BERITA
        foreach ($all_berita as $berita) {
            Komentar::factory(5)->create([
                'berita_id' => $berita->id,
            ]);
        }
    }
}
