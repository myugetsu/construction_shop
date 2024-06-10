<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'item_category_id',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::of($value)->slug('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function itemCategory(): BelongsTo
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function itemFeedbacks(): HasMany
    {
        return $this->hasMany(ItemFeedback::class);
    }
}
