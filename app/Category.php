<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function evaluation()
    {
        return $this->hasMany('App\Evaluation','year','year');
    }
}
