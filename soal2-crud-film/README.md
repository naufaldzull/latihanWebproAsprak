# Soal 2 — Website CRUD Film Bioskop

Website CRUD untuk mengelola daftar film yang sedang tayang di bioskop.

| Komponen  | Pilihan                       |
| --------- | ----------------------------- |
| Framework | **Laravel 12** (butuh PHP 8.2+) |
| Database  | **MySQL / MariaDB**           |
| ORM       | **Eloquent** (`App\Models\Film`) |
| Tampilan  | Blade + CSS custom (tema gelap sinema, tanpa CDN) |

## Struktur data film

| Nama Properti | Tipe Data | Keterangan                    |
| ------------- | --------- | ----------------------------- |
| `id`          | integer   | Primary key, auto increment   |
| `judul`       | string    | Judul film                    |
| `durasi`      | integer   | Durasi film dalam menit       |
| `deskripsi`   | text      | Sinopsis singkat film         |

## Fungsionalitas CRUD

| Operasi    | Route                       | Method   | Keterangan                       |
| ---------- | --------------------------- | -------- | -------------------------------- |
| **Create** | `/films/create` → `/films`  | GET/POST | Form tambah film baru            |
| **Read**   | `/films`                    | GET      | Daftar film + pencarian judul    |
| **Read**   | `/films/{id}`               | GET      | Detail satu film                 |
| **Update** | `/films/{id}/edit` → `/films/{id}` | GET/PUT | Form ubah data film       |
| **Delete** | `/films/{id}`               | DELETE   | Hapus film dari daftar           |

Tambahan: validasi input (pesan error berbahasa Indonesia), flash message setelah
aksi berhasil, pencarian judul, pagination 6 film per halaman, dan accessor
`durasi_format` yang mengubah `169` menjadi `2j 49m`.

## Prasyarat

- PHP **8.2 atau lebih baru** (cek dengan `php -v`)
- Composer
- MySQL / MariaDB (mis. bawaan Laragon atau XAMPP)

## Cara menjalankan

```bash
# 1. Install dependency (wajib duluan — folder vendor/ tidak ikut di git)
composer install

# 2. Siapkan environment
cp .env.example .env
php artisan key:generate

# 3. Buat database di MySQL
mysql -u root -e "CREATE DATABASE bioskop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
#    lalu sesuaikan DB_USERNAME dan DB_PASSWORD di .env

# 4. Migrasi tabel + data contoh
php artisan migrate --seed

# 5. Jalankan server
php artisan serve
```

Buka <http://localhost:8000> — otomatis diarahkan ke `/films`.

## Menjalankan test

```bash
php artisan test --filter=FilmCrudTest
```

Enam test menutup create, read, update, delete, validasi, dan pencarian.

## Kalau ada error

**`Failed to open stream: vendor/autoload.php`**
Folder `vendor/` belum ada. Jalankan `composer install` dulu di folder yang berisi `artisan`.

**`requires php >= 8.x -> your php version does not satisfy that requirement`**
Versi PHP-mu terlalu lama. Project ini dikunci ke Laravel 12 yang jalan di PHP 8.2+.
Kalau masih gagal, cek `php -v` — pastikan PHP yang dipakai terminal sama dengan yang di Laragon.

**`SQLSTATE[HY000] [1049] Unknown database 'bioskop'`**
Databasenya belum dibuat. Jalankan `mysql -u root -e "CREATE DATABASE bioskop"`.

**`Access denied for user`**
Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` di `.env`. Di Laragon defaultnya user `root` tanpa password.

## File utama

```
app/Models/Film.php                              Model Eloquent
app/Http/Controllers/FilmController.php          Resource controller (CRUD)
app/Http/Requests/StoreFilmRequest.php           Validasi input
database/migrations/*_create_films_table.php     Skema tabel films
database/seeders/FilmSeeder.php                  Data contoh 7 film
routes/web.php                                   Route resource
resources/views/films/                           Halaman index, create, edit, show
resources/views/layouts/app.blade.php            Layout utama
public/css/app.css                               Stylesheet
tests/Feature/FilmCrudTest.php                   Test CRUD
```
