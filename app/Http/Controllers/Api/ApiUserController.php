<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Auto;
use App\Cash;
use App\Passport;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::withTrashed()->with('passport')->get();
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
        $user = User::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
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
        $user = User::findOrFail($id);
        $user->update($request->all());
 
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->forceDelete();
        Auto::where('user_id', $id)->forceDelete();
        Cash::where('user_id', $id)->forceDelete();
        return 'Пользователь удален';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banUser($id)
    {
        $user = User::findOrFail($id);
        $user = $user->delete();
        $user = User::withTrashed()->where('id', $id)->get();

        $auto = Auto::where('user_id', $id)->delete();

        $cash = Cash::where('user_id', $id)->delete();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unBanUser($id)
    {
        $user = User::withTrashed()->find($id)->restore();

        $user = Auto::withTrashed()->where('user_id', $id)->restore();

        $user = Cash::withTrashed()->where('user_id', $id)->restore();

        $user = User::withTrashed()->find($id)->restore();

        return 'Пользователь разбанен';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyUser($id)
    {
        $passport = Passport::where('user_id', $id)->first();
        $passport->verify = 1;
        $passport->save();

        return 'Верифицирован';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unVerifyUser($id)
    {
        $user = Passport::where('user_id', $id)->first();
        $user->verify = 0;
        $passport->save();

        return 'Верифицирован';
    }
}
