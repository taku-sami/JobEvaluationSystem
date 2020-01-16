<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryYear extends Model
{
    public function evaluation()
    {
        return $this->hasMany('App\UserEvaluation','year','year');
    }
    public function category()
    {
        return $this->hasMany('App\Category','year','year');
    }
}
