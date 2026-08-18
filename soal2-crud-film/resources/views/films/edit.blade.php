@extends('layouts.app')

@section('title', 'Ubah Film')

@section('content')
    <div class="page-head">
        <h1>Ubah Data Film</h1>
        <p>Perbarui informasi untuk <strong>{{ $film->judul }}</strong>.</p>
    </div>

    <div class="panel">
        <form method="POST" action="{{ route('films.update', $film) }}">
            @method('PUT')
            @include('films._form', ['film' => $film, 'submitLabel' => 'Simpan Perubahan'])
        </form>
    </div>
@endsection
