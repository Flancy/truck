<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutoCategories extends Model
{
    protected $table = 'autocategories';

    public function auto()
    {
        return $this->hasMany('App\Auto');
    }
}
