@extends('layouts.main')

@section('container')

    <section class="section-berita max-w-3xl mx-auto p-6 rounded shadow-md transition">
        <!-- UNTUK TAMPILKAN GAMBAR -->
        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
        @endif

        <!-- UNTUK JUDUL -->
        <h1 class="text-3xl font-bold mb-2">{{ $berita->judul }}</h1>
        <p class="text-sm text-gray-600 mb-4">
            Oleh: <span class="font-semibold">{{ $berita->wartawan->nama }}</span> |
            Diterbitkan: {{ $berita->created_at->format('d M Y') }}
        </p>

        <!-- UNTUK ISI BERITA YG RAPI -->   
        <div class="isi-berita prose max-w-none text-justify">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <!-- FORM ISI KOMENTAR -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Tinggalkan Komentar</h2>

            <form action="{{ route('form.komentar') }}" method="POST" class="space-y-4">
                @csrf

                <input type="hidden" name="berita_id" value="{{ $berita->id }}">

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama:</label>
                    <input type="text" name="nama" id="nama" required class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label for="isi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Komentar:</label>
                    <textarea name="isi" id="isi" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Kirim Komentar</button>
                </div>
            </form>

        <!-- PESAN SINGKAT TANDA KOMENTAR TERKIRIM -->
        @if (session('success'))
            <div class="alert alert-success mt-4 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <!-- BAGIAN KOMENTAR YG LEBIH KOTAK -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Komentar</h2>
            @foreach ($berita->komentar as $komen)
                <div class="d-flex align-items-start mb-4 p-3 border rounded shadow-md">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($komen->nama) }}&background=random&size=50" alt="Avatar" class="rounded-circle me-3">
                    <div class="card-body">
                        <h4 class="card-title mb-1"> {{ $komen->nama }} </h4>
                        <small class="text-muted">{{ $komen->created_at->format('d M Y H:i') }}</small>
                        <p class="card-text">{{ $komen->isi }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

@endsection

