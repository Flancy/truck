<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\AutoCategories;
use App\Auto;
use App\City;

class SearchController extends Controller
{
    public function index()
    {
    	$city_id = Input::get('city_id');
        $autocategories_id = Input::get('autocategories_id');
        $autocategories = AutoCategories::all();
        $cities = City::all();

        if($autocategories_id == 0) {
        	$autocategories_id = 1;
        }
        if($city_id == 0) {
            $auto = Auto::where([['autocategories_id','=', $autocategories_id]])->get();
        } else {
            $auto = Auto::where([['city_id','=',$city_id],['autocategories_id','=', $autocategories_id]])->get();
        }

        return view('pages.search')->with(['autocategories' => $autocategories, 'auto' => $auto, 'cities' => $cities]);
    }
}
