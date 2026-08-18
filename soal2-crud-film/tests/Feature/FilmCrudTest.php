<?php

namespace Tests\Feature;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilmCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_daftar_film_tampil_di_halaman_utama(): void
    {
        Film::create([
            'judul' => 'Laskar Pelangi',
            'durasi' => 124,
            'deskripsi' => 'Sepuluh anak Belitung mempertahankan sekolahnya.',
        ]);

        $this->get(route('films.index'))
            ->assertOk()
            ->assertSee('Laskar Pelangi')
            ->assertSee('2j 4m');
    }

    public function test_film_baru_bisa_ditambahkan(): void
    {
        $response = $this->post(route('films.store'), [
            'judul' => 'Dilan 1990',
            'durasi' => 110,
            'deskripsi' => 'Kisah cinta Dilan dan Milea di Bandung tahun 1990.',
        ]);

        $response->assertRedirect(route('films.index'));
        $this->assertDatabaseHas('films', ['judul' => 'Dilan 1990', 'durasi' => 110]);
    }

    public function test_data_film_bisa_diubah(): void
    {
        $film = Film::create([
            'judul' => 'Judul Lama',
            'durasi' => 90,
            'deskripsi' => 'Deskripsi lama.',
        ]);

        $this->put(route('films.update', $film), [
            'judul' => 'Judul Baru',
            'durasi' => 95,
            'deskripsi' => 'Deskripsi baru.',
        ])->assertRedirect(route('films.index'));

        $this->assertDatabaseHas('films', [
            'id' => $film->id,
            'judul' => 'Judul Baru',
            'durasi' => 95,
        ]);
    }

    public function test_film_bisa_dihapus(): void
    {
        $film = Film::create([
            'judul' => 'Film Turun Layar',
            'durasi' => 100,
            'deskripsi' => 'Sudah tidak tayang.',
        ]);

        $this->delete(route('films.destroy', $film))
            ->assertRedirect(route('films.index'));

        $this->assertDatabaseMissing('films', ['id' => $film->id]);
    }

    public function test_input_tidak_valid_ditolak(): void
    {
        $this->post(route('films.store'), [
            'judul' => '',
            'durasi' => 'bukan angka',
            'deskripsi' => '',
        ])->assertSessionHasErrors(['judul', 'durasi', 'deskripsi']);

        $this->assertDatabaseCount('films', 0);
    }

    public function test_pencarian_judul_film(): void
    {
        Film::create(['judul' => 'Interstellar', 'durasi' => 169, 'deskripsi' => 'Perjalanan antarbintang.']);
        Film::create(['judul' => 'Sewu Dino', 'durasi' => 103, 'deskripsi' => 'Teror seribu hari.']);

        $this->get(route('films.index', ['cari' => 'inter']))
            ->assertOk()
            ->assertSee('Interstellar')
            ->assertDontSee('Sewu Dino');
    }
}
