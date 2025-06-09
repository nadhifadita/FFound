<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundItem extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi Laravel (tidak perlu jika namanya 'found_items')
    // protected $table = 'found_items';

    protected $fillable = [
        'user_id',
        'item_name',
        'location',
        'date',
        'description',
        'photo_path',
    ];

    // Relasi dengan model User (opsional, tapi disarankan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}