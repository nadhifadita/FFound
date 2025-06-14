<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryItem extends Model 
{
    use HasFactory;

    protected $fillable = [
        'lost_item_id',
        'found_item_id',
        'resolved_date',
        'notes',
    ];

    public function lostItem()
    {
        return $this->belongsTo(LostItem::class);
    }

    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class);
    }
}