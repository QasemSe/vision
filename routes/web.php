<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome/{name}', function (\Illuminate\Http\Request $request) {
    return $request->name;
});
//
//Route::get('news', function () {
//    return "News";
//});

Route::get('news/{id?}', function ($id) {
    return $id;
});


//Route::get('welcome/{name}', function ($name) {
//    return $name;
//});
