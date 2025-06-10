<?php

namespace App\Models; // <-- PASTIKAN NAMESPACE INI BENAR DAN SESUAI DIREKTORI

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model // <-- INI ADALAH DEFINISI KELAS MODEL YANG BENAR
{
    use HasFactory;

    // Nama tabel di database (Laravel akan secara otomatis mencari 'history_items')
    // Jika nama tabel Anda berbeda, uncomment dan sesuaikan:
    // protected $table = 'history_items';

    // Kolom-kolom yang dapat diisi secara massal (sesuai dengan migrasi Anda)
    protected $fillable = [
        'lost_item_id',
        'found_item_id',
        'resolved_date',
        'notes',
    ];

    // Relasi ke model LostItem
    // Ini memungkinkan Anda mengakses detail LostItem dari HistoryItem (misal: $historyItem->lostItem->item_name)
    public function lostItem()
    {
        return $this->belongsTo(LostItem::class);
    }

    // Relasi ke model FoundItem
    // Ini memungkinkan Anda mengakses detail FoundItem dari HistoryItem (misal: $historyItem->foundItem->item_name)
    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class);
    }
}