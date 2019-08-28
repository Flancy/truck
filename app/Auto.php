<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $table = 'auto';

    protected $fillable = [
        'name', 'weight', 'price', 'user_id', 'city_id', 'autocategories_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function autoCategory()
    {
        return $this->hasOne('App\AutoCategories', 'id', 'autocategories_id');
    }
}
