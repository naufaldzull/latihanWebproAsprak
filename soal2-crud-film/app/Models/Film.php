<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'durasi',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'durasi' => 'integer',
        ];
    }

    /**
     * Durasi dalam format "1j 45m" untuk ditampilkan di halaman.
     */
    public function getDurasiFormatAttribute(): string
    {
        $jam = intdiv($this->durasi, 60);
        $menit = $this->durasi % 60;

        return $jam > 0 ? "{$jam}j {$menit}m" : "{$menit}m";
    }
}
