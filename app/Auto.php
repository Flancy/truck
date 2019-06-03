<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table = 'auto';

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function autoCategory()
    {
        return $this->hasOne('App\AutoCategory');
    }
}
