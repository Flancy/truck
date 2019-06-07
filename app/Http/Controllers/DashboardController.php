<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settingShow()
    {
    	$id = Auth::id();
        $user = User::findOrFail($id);

        return view('dashboard.setting')->with('user', $user);
    }
}
