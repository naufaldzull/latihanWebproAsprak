<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FilmController extends Controller
{
    /**
     * READ - Menampilkan daftar film yang sedang tayang.
     */
    public function index(Request $request): View
    {
        $cari = $request->query('cari');

        $films = Film::query()
            ->when($cari, fn ($query) => $query->where('judul', 'like', "%{$cari}%"))
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('films.index', compact('films', 'cari'));
    }

    /**
     * CREATE - Form tambah film baru.
     */
    public function create(): View
    {
        return view('films.create');
    }

    /**
     * CREATE - Menyimpan film baru ke database.
     */
    public function store(StoreFilmRequest $request): RedirectResponse
    {
        $film = Film::create($request->validated());

        return redirect()
            ->route('films.index')
            ->with('success', "Film \"{$film->judul}\" berhasil ditambahkan.");
    }

    /**
     * READ - Detail satu film.
     */
    public function show(Film $film): View
    {
        return view('films.show', compact('film'));
    }

    /**
     * UPDATE - Form ubah data film.
     */
    public function edit(Film $film): View
    {
        return view('films.edit', compact('film'));
    }

    /**
     * UPDATE - Menyimpan perubahan data film.
     */
    public function update(StoreFilmRequest $request, Film $film): RedirectResponse
    {
        $film->update($request->validated());

        return redirect()
            ->route('films.index')
            ->with('success', "Film \"{$film->judul}\" berhasil diperbarui.");
    }

    /**
     * DELETE - Menghapus film dari daftar.
     */
    public function destroy(Film $film): RedirectResponse
    {
        $judul = $film->judul;
        $film->delete();

        return redirect()
            ->route('films.index')
            ->with('success', "Film \"{$judul}\" berhasil dihapus.");
    }
}
