<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'price', 'description', 'user_id', 'city_id', 'autocategories_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function autoCategory()
    {
        return $this->belongsTo('App\AutoCategories');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
