<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoundItem extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'user_id', 'item_name', 'location', 'date', 'description', 'photo_path',
    ];

    public function user() { return $this->belongsTo(User::class); }
}