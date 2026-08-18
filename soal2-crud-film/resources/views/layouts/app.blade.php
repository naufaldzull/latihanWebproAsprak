<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Jadwal Tayang') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="wrap">
            <a href="{{ route('films.index') }}" class="brand">
                <span class="logo">&#127916;</span>
                <span>
                    {{ config('app.name') }}
                    <small>Sedang Tayang</small>
                </span>
            </a>
            <a href="{{ route('films.create') }}" class="btn btn-primary">&#43; Tambah Film</a>
        </div>
    </header>

    <main class="wrap">
        @if (session('success'))
            <div class="alert" style="margin-top:24px">&#10003; {{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class="site">
        <div class="wrap">
            {{ config('app.name') }} &middot; Laravel {{ Illuminate\Foundation\Application::VERSION }} &middot; MySQL &middot; Eloquent ORM
        </div>
    </footer>
</body>
</html>
