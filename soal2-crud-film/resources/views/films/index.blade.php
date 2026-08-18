@extends('layouts.app')

@section('title', 'Jadwal Tayang')

@section('content')
    <section class="hero">
        <h1>Film yang <span>sedang tayang</span> hari ini</h1>
        <p>Kelola daftar film bioskop: tambah judul baru, perbarui durasi dan sinopsis, atau hapus film yang sudah turun layar.</p>
    </section>

    <div class="toolbar">
        <form method="GET" action="{{ route('films.index') }}" class="search">
            <input type="search" name="cari" value="{{ $cari }}" placeholder="Cari judul film...">
            <button type="submit" class="btn">Cari</button>
            @if ($cari)
                <a href="{{ route('films.index') }}" class="btn btn-ghost">Reset</a>
            @endif
        </form>
        <span class="badge badge-muted">{{ $films->total() }} film terdaftar</span>
    </div>

    @if ($films->isEmpty())
        <div class="empty">
            <span class="icon">&#127909;</span>
            <h3>{{ $cari ? 'Film tidak ditemukan' : 'Belum ada film' }}</h3>
            <p>
                {{ $cari
                    ? 'Tidak ada judul yang cocok dengan "'.$cari.'". Coba kata kunci lain.'
                    : 'Daftar tayang masih kosong. Tambahkan film pertama untuk memulai.' }}
            </p>
        </div>
    @else
        <div class="grid">
            @foreach ($films as $film)
                <article class="card">
                    <span class="badge">&#9201; {{ $film->durasi_format }}</span>
                    <h3><a href="{{ route('films.show', $film) }}">{{ $film->judul }}</a></h3>
                    <p>{{ Str::limit($film->deskripsi, 120) }}</p>
                    <div class="actions">
                        <a href="{{ route('films.edit', $film) }}" class="btn btn-sm">Ubah</a>
                        <form method="POST" action="{{ route('films.destroy', $film) }}"
                              onsubmit="return confirm('Hapus film &quot;{{ $film->judul }}&quot; dari daftar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $films->links() }}
    @endif
@endsection
