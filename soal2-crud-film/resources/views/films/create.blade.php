@extends('layouts.app')

@section('title', 'Tambah Film')

@section('content')
    <div class="page-head">
        <h1>Tambah Film Baru</h1>
        <p>Masukkan detail film yang akan ditayangkan di bioskop.</p>
    </div>

    <div class="panel">
        <form method="POST" action="{{ route('films.store') }}">
            @include('films._form', ['film' => new App\Models\Film, 'submitLabel' => 'Simpan Film'])
        </form>
    </div>
@endsection
