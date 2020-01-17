<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvaluation extends Model
{
    protected $fillable = [
        'id', 'year', 'user_id','user_name','department','evaluation','point',
    ];

    protected $hidden = [
        'goal_1','goal_2','goal_3','self_eva1','self_eva2','self_eva3',
        'boss1_eva1','boss1_eva2','boss1_eva3','boss2_eva1','boss2_eva2',
        'boss2_eva3','progress',
    ];

    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
