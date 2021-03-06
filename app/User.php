<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'cash_id', 'isExecutor', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cash()
    {
        return $this->belongsTo('App\Cash');
    }

    public function passport()
    {
        return $this->hasOne('App\Passport');
    }

    public function getOnePassport()
    {
        return $this->hasOne('App\Passport')->first();
    }

    public function orders()
    {
        return $this->hasMany('App\OrdersComplete');
    }

    public function auto()
    {
        return $this->hasMany('App\Auto', 'id', 'user_id');
    }
}
