<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersComplete extends Model
{
    protected $table = 'orders_complete';

    protected $fillable = [
        'user_id', 'order_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function orders()
    {
        return $this->hasOne('App\Orders', 'id', 'order_id');
    }
}
