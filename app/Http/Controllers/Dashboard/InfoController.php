<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use App\Passport;

class InfoController extends Controller
{
    public function index()
    {
    	$passport = Passport::where('user_id', Auth::id())->first();

		return view('dashboard.info')->with([
            'passport' => $passport, 
        ]);
    }

    public function create(Request $request)
    {
        $passport = Passport::where('user_id', Auth::id())->first();

    	if($passport->count() != 0) {
    		$passport = $passport;
    	} else {
    		$passport = new Passport;
    	}

    	Input::merge(array_map('trim', Input::all()));

    	$passport->user_id = Auth::id();
    	$passport->name = Input::get('name');
    	$passport->surname = Input::get('name');
    	$passport->patronymic = Input::get('patronymic');
    	$passport->number = Input::get('number');
    	$passport->city = Input::get('city');
    	$passport->date = Input::get('date');
    	$passport->save();

    	return back()->with([
            'passport' => $passport, 
            'success' => 'Спасибо за предоставленные данные! Проверка займет от 1 до 2-ух дней!'
        ]); 
    }
}
