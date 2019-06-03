<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function call()
    {
        return view('pages.call');
    }
    
    public function review()
    {
        return view('pages.review');
    }
}
