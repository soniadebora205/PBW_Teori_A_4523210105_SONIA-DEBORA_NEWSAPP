@extends('layouts.main')

@section('container')

    <!-- MENGUBAH TAMPILAN MENGGUNAKAN BOOTSRAP SUPAYA TERLIHAT LEBIH MENARIK -->
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Berita</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
        @foreach ($semua_berita as $berita)
            <div class="col">
                <div class="card h-100 shado-sm">
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="Gambar Berita">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"> {{ $berita->judul }} </h5>
                        <p class="card-text text-muted">
                            Oleh: {{ $berita->wartawan->nama }} 
                            <br>
                            Dipublikasikan pada: {{ $berita->created_at->format('d M Y') }}
                        </p>
                        <p class="ringkasan-berita card-text">
                            {{ Str::limit($berita->ringaksan, 100) }}
                        </p>
                        <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection