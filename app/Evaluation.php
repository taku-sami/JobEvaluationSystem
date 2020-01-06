<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category','year','year');

    }
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
