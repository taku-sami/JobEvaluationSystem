<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category1', 'standard1', 'category2','standard2','category3','standard3',
        'year'
    ];
}
