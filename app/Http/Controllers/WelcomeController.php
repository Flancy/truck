<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AutoCategories;
use App\Auto;
use App\User;
use App\City;
use App\Orders;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autocategories = AutoCategories::all();
        $users = User::take(5)->where('isExecutor', 0)->get();
        $cities = City::all();
        $orders = Orders::all();
        $cars = Auto::groupBy('user_id')->distinct()->get();

        $isExecutor = 1;
        $city_id = 1;
        $autocategories_id = 1;
        
        return view('welcome')->with(['cars' => $cars, 'autocategories' => $autocategories, 'users' => $users, 'cities' => $cities, 'orders' => $orders, 'isExecutor' => $isExecutor, 'city_id' => $city_id, 'autocategories_id' => $autocategories_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
