<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $table = 'cash';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
