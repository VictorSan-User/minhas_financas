<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'title',
        'description',
        'data_inicio',
        'data_fim',
        'valor',
        'user_id'
    ];
}
