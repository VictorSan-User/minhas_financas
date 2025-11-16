<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ideia extends Model
{
        protected $fillable = [
        'title',
        'description',
        'categoria',
        'user_id'
    ];

}
