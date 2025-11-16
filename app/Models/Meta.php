<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'title',
        'description',
        'categoria',
        'data_inicio',
        'data_fim',
        'user_id'
    ];
}
