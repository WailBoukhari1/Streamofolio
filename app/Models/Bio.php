<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;
    protected $table = 'bio';
    protected $fillable = ['bio_image', 'title', 'content'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
