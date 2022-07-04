<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site1Controller;

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

//Route::get('welcome/{name}', function (\Illuminate\Http\Request $request) {
//    return $request->name;
//});

//
//Route::get('news', function () {
//    return "News";
//});

//Route::get('news/{id?}', function ($id) {
//    return $id;
//});


/**
 * Lec 6
 */


/** Route Name */
//Route::get('/', function () {
//    $user = "Ali";
//    $post = 2;
//    $comment = 3;
//
//    return route('comments', [$user, $post, $comment]);
//});
//
//Route::get('contact-us', function () {
//    return "Contact";
//})->name('contactpage');
//
//Route::get('users/{user}/posts/{post}/comment/{comment}', function ($user, $post, $comment) {
//    return "$user | $post | $comment";
//})->name('comments');


/**
 * Lec 7
 */

Route::get('site1/i', [Site1Controller::class, 'index'])->name('site1');
