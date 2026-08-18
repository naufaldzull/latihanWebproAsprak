<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255'],
            'durasi' => ['required', 'integer', 'min:1', 'max:600'],
            'deskripsi' => ['required', 'string', 'max:2000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul film wajib diisi.',
            'durasi.required' => 'Durasi film wajib diisi.',
            'durasi.integer' => 'Durasi harus berupa angka (dalam menit).',
            'durasi.min' => 'Durasi minimal 1 menit.',
            'durasi.max' => 'Durasi maksimal 600 menit.',
            'deskripsi.required' => 'Deskripsi film wajib diisi.',
        ];
    }
}
