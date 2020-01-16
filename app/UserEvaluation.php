<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvaluation extends Model
{
    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
