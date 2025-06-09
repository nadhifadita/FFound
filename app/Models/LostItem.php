<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari konvensi Laravel (tidak perlu jika namanya 'lost_items')
    // protected $table = 'lost_items';

    protected $fillable = [
        'user_id',
        'lost_by',
        'item_name',
        'phone',
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