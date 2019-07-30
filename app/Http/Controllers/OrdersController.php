<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Orders;
use App\OrdersComplete;
use App\Cash;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order = new Orders;

        $order->status = 0;
        $order->price = $request->price;
        $order->description = $request->description;
        $order->city_id = $request->city_id;
        $order->autocategories_id = $request->autocategories_id;
        $order->user_id = Auth::id();

        $order->save();

        return redirect()->action('DashboardController@settingShow');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder($id)
    {
        $order = Orders::findOrFail($id);

        return view('orders.show', ['order' => $order]);
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

    public function changeStatus(Request $request)
    {
        $userId = Auth::id();
        $userCash = Cash::where('user_id', $userId)->first();
        $balance = $userCash->balance;

        if($balance >= 100) {
            $userCash->balance = $balance-100;
            $userCash->save();
        }

        $order = new OrdersComplete;

        $order->user_id = $userId;
        $order->order_id = $request->order_id;

        $order->save();

        $order = Orders::findOrFail($request->order_id);
        $order->status = 1;
        $order->save();

        return redirect()->action('DashboardController@settingShow');
    }

    public function changeStatusComplete($id, $status)
    {
        $order = Orders::findOrFail($id);

        $order->status = $status;
        $order->save();

        return redirect()->action('DashboardController@settingShow');
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
        Orders::destroy($id);

        return redirect()->action('DashboardController@settingShow');
    }


    public function destroyOrder(Request $request)
    {
        Orders::destroy($request->id);

        return redirect()->action('DashboardController@settingShow');
    }
}
