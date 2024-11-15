<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'status',
        'price',
        'thumbnail',
        'created_at',
        'updated_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
