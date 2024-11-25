<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_id',
        'name',
        'short_description',
        'description',
        'price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trend',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function subcategory() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

}
