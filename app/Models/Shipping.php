<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'address', 'country', 'state', 'city', 'zip', 'client_id'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
