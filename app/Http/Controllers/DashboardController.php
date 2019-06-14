<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AutoCategories;
use App\Auto;
use App\City;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getCarsInfo()
    {
        $carsInfo = [
            'autocategories' => AutoCategories::all(),
            'cities' => City::all(),
        ];

        return $carsInfo;
    }

    public function settingShow()
    {
        $carsInfo = $this->getCarsInfo();

    	$id = Auth::id();
        $user = User::findOrFail($id);

        $cars = Auto::all();

        $carsAuthUser = array();

        foreach ($cars as $car) {
            if($car->user->id == $id) {
                array_push($carsAuthUser, $car);
            }
        }

        return view('dashboard.setting')->with(['user' => $user, 'autocategories' => $carsInfo['autocategories'], 'cities' => $carsInfo['cities'], 'cars' => $carsAuthUser]);
    }

    public function settingSaveAuto(Request $request)
    {
        if ($request->hasFile('image')) {
            $userId = Auth::id();

            $path = 'car-'.$request->image->getSize().rand(200, 3000).'.jpg';

            $file = $request->image->storeAs('public/auto', $path);
            $path = 'storage/auto/'.$path;
 
            $car = new Auto;

            $car->name = $request->name;
            $car->weight = $request->weight;
            $car->user_id = $userId;
            $car->city_id = $request->city_id;
            $car->autocategories_id = $request->autocategories_id;
            $car->image = $path;

            $car->save();
        }

        return redirect()->action('DashboardController@settingShow');
    }
}
