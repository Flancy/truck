<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Auto;
use App\Reviews;
use App\Orders;
use App\OrdersComplete;
use App\Passport;

class UserController extends Controller
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
        $user = User::findOrFail($id);
        $passport = Passport::where('user_id', $id)->first();
        $countOrders = 0;

        $cars = Auto::all();
        $reviews = Reviews::where('user_id', $id)->get();

        if($user->isExecutor == 0) {
            $orders = OrdersComplete::where('user_id', $id)->get();
            if($orders->count() != 0) {
                $ordersComplete = [];

                foreach ($orders as $order) {
                    array_push($ordersComplete, $order->order_id);
                }

                $countOrders = Orders::where('id', $ordersComplete)->where('status', '3')->get()->count();
            }
        } else if($user->isExecutor == 1) {
            $countOrders = Orders::where('user_id', $id)->where('status', '3')->get()->count();
        }

        $carsAuthUser = array();
        $reviewsAuthUser = array();

        foreach ($cars as $car) {
            if($car->user->id == $id) {
                array_push($carsAuthUser, $car);
            }
        }

        foreach ($reviews as $review) {
            if($review->user_id == $id) {
                array_push($reviewsAuthUser, $review);
            }
        }

        return view('user.show')->with(['user' => $user, 'cars' => $carsAuthUser, 'reviews' => $reviews, 'ordersComplete' => $countOrders, 'verify' => $passport->verify, 'passport' => $passport]);
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
