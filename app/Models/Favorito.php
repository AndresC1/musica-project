<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favoritable_id',
        'favoritable_type',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function favoritable()
    {
        return $this->morphTo();
    }
}
