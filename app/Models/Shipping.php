<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'address', 'country', 'state', 'city', 'zip', 'client_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
