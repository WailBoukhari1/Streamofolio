<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'thumbnail',
        'name',
        'description',
        'price',
        'category',
        'rating',
        'stock',
        'sold',
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
