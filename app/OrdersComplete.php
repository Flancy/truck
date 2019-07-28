<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersComplete extends Model
{
    protected $table = 'orders_complete';

    protected $fillable = [
        'user_id', 'order_id'
    ];
}
