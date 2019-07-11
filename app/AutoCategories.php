<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoCategories extends Model
{
    protected $table = 'autocategories';

    protected $fillable = [
        'name', 'image',
    ];

    public function auto()
    {
        return $this->hasMany('App\Auto');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Orders');
    }
}
