<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{ 
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'surname', 'patronymic', 'number', 'city', 'date', 'verify'
    ];
}
