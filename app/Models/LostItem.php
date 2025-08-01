<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LostItem extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'user_id', 'lost_by', 'item_name', 'phone', 'location', 'date', 'description', 'photo_path',
    ];

    public function user() { return $this->belongsTo(User::class); }
}