<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvTemplate extends Model
{
    protected $fillable = [
        'year', 'category', 'standard'
    ];

    protected $hidden = [
        'id'
    ];
}
