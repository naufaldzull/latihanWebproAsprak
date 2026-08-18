<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            [
                'judul' => 'Pengabdi Setan 2: Communion',
                'durasi' => 119,
                'deskripsi' => 'Rini dan keluarganya pindah ke rumah susun, berharap lepas dari teror masa lalu. Namun badai besar mengurung seluruh penghuni dan meneror mereka satu per satu.',
            ],
            [
                'judul' => 'Laskar Pelangi',
                'durasi' => 124,
                'deskripsi' => 'Sepuluh anak dari keluarga miskin di Belitung berjuang mempertahankan sekolah mereka yang terancam ditutup, ditemani dua guru yang pantang menyerah.',
            ],
            [
                'judul' => 'Interstellar',
                'durasi' => 169,
                'deskripsi' => 'Sekelompok penjelajah menembus lubang cacing di dekat Saturnus demi mencari planet baru yang layak huni bagi umat manusia yang bumi-nya sekarat.',
            ],
            [
                'judul' => 'Ada Apa dengan Cinta? 2',
                'durasi' => 124,
                'deskripsi' => 'Empat belas tahun setelah perpisahan, Cinta dan Rangga tidak sengaja bertemu kembali di Yogyakarta dan harus menuntaskan apa yang dulu tertinggal.',
            ],
            [
                'judul' => 'Spider-Man: Into the Spider-Verse',
                'durasi' => 117,
                'deskripsi' => 'Miles Morales menemukan bahwa dirinya bukan satu-satunya Spider-Man ketika beberapa dimensi bertabrakan dan mempertemukannya dengan para Spider-People lain.',
            ],
            [
                'judul' => 'Sewu Dino',
                'durasi' => 103,
                'deskripsi' => 'Sri menerima pekerjaan bergaji besar untuk merawat seorang gadis yang terkena santet Sewu Dino, tanpa tahu bahaya yang menantinya selama seribu hari.',
            ],
            [
                'judul' => 'The Grand Budapest Hotel',
                'durasi' => 99,
                'deskripsi' => 'Petualangan seorang concierge legendaris dan bellboy kepercayaannya dalam mengurus pencurian lukisan renaisans dan perebutan harta warisan keluarga kaya.',
            ],
        ];

        foreach ($films as $film) {
            Film::updateOrCreate(['judul' => $film['judul']], $film);
        }
    }
}
