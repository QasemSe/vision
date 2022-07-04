<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    function index()
    {
        return view('site2.index');
    }

    function about()
    {
        return view('site2.about');
    }

    function contact()
    {
        return view('site2.contact');
    }

    function post()
    {
        return view('site2.post');
    }
}
