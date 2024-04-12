<?php

namespace App\Models;

use App\Models\Bio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'twitch_username', 'aliase', 'schedule'];

    public function user (){

        return $this->belongsTo(User::class);

    }
    public function bio()
    {

        return $this->HasOne(Bio::class);

    }
}
