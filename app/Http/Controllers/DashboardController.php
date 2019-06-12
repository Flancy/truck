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

    public function settingShow()
    {
        $autocategories = AutoCategories::all();
        $user = User::all();
        $cities = City::all();

    	$id = Auth::id();
        $user = User::findOrFail($id);

        return view('dashboard.setting')->with(['user' => $user, 'autocategories' => $autocategories, 'cities' => $cities]);
    }

    public function settingSaveAuto(Request $request)
    {
        $autocategories = AutoCategories::all();
        $user = User::all();
        $cities = City::all();

        $id = Auth::id();
        $user = User::findOrFail($id);

        return view('dashboard.setting')->with(['user' => $user, 'autocategories' => $autocategories, 'cities' => $cities]);
    }
}
