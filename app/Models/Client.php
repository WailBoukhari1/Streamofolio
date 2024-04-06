<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name',  'user_id'];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
