@extends('layouts.app')

@section('title', $film->judul)

@section('content')
    <div class="page-head">
        <h1>{{ $film->judul }}</h1>
        <div class="detail-meta">
            <span class="badge">&#9201; {{ $film->durasi_format }} ({{ $film->durasi }} menit)</span>
            <span class="badge badge-muted">Ditambahkan {{ $film->created_at->diffForHumans() }}</span>
        </div>
    </div>

    <div class="panel">
        <p class="detail-body">{{ $film->deskripsi }}</p>

        <div class="form-actions">
            <a href="{{ route('films.edit', $film) }}" class="btn btn-primary">Ubah Film</a>
            <a href="{{ route('films.index') }}" class="btn btn-ghost">&larr; Kembali ke daftar</a>
            <form method="POST" action="{{ route('films.destroy', $film) }}"
                  onsubmit="return confirm('Hapus film ini dari daftar?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
@endsection
