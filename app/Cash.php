<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cash extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'cash';

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
