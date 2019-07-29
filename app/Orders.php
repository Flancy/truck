<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'orders';

    protected $fillable = [
        'status', 'price', 'description', 'user_id', 'city_id', 'autocategories_id',
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

    public function getOrderComplete()
    {
        return $this->hasOne('App\OrdersComplete', 'order_id', 'id');
    }
}
