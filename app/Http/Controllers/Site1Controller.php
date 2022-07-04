<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site1Controller extends Controller
{
    function index()
    {
        $title = "Qasem H.Serhi";
        $paragraph = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus cupiditate delectus est magnam minima, nihil nulla, obcaecati provident quam reprehenderit saepe totam velit. Atque laboriosam nulla quidem suscipit tempore.";
        return view('index')->with(['title' => $title, 'paragraph' => $paragraph]);
    }
}
