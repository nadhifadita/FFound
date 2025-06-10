<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Dapatkan aturan validasi yang berlaku untuk request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            // --- Kustomisasi: Aturan Validasi untuk nim_nip dan phone ---
            'nim_nip' => ['nullable', 'string', 'max:50'], // Izinkan null jika tidak diisi, atau sesuaikan validasinya
            'phone' => ['nullable', 'string', 'max:20'],   // Izinkan null jika tidak diisi, atau sesuaikan validasinya
            // --- AKHIR Kustomisasi ---
        ];
    }
}