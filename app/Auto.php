<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auto extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
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
