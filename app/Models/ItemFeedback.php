<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'item_id',
    ];


    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
