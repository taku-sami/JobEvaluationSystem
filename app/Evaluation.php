<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Evaluation extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'year', 'user_id','user_name','department','evaluation','point',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'goal_1','goal_2','goal_3','self_eva1','self_eva2','self_eva3',
        'boss1_eva1','boss1_eva2','boss1_eva3','boss2_eva1','boss2_eva2',
        'boss2_eva3','progress',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function category()
    {
        return $this->belongsTo('App\Category','year','year');

    }
    public function user()
    {
        return $this->belongsTo('App\User');

    }
}
