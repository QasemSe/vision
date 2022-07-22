<?php

use App\Http\Controllers\FormsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;

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

Route::get('site1', [Site1Controller::class, 'index'])->name('site1');


Route::prefix('site2')->name('site2.')->group(function() {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about', [Site2Controller::class, 'about'])->name('about');
    Route::get('/contact', [Site2Controller::class, 'contact'])->name('contact');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
});


/**
 * Lec 8
 */

Route::prefix('site3')->name('site3.')->group(function () {
    Route::get('/', [Site3Controller::class, 'about'])->name('about');
    Route::get('/experience', [Site3Controller::class, 'experience'])->name('experience');
    Route::get('/education', [Site3Controller::class, 'education'])->name('education');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');
});

Route::get('form1', [FormsController::class, 'form1'])->name('form1');
Route::post('form1', [FormsController::class, 'form1_data']);


/**
 * Lec 9
 */

Route::get('form2', [FormsController::class, 'form2'])->name('form2');
Route::post('form2', [FormsController::class, 'form2_data']);

Route::get('form3', [FormsController::class, 'form3'])->name('form3');
Route::post('form3', [FormsController::class, 'form3_data']);


/**
 *  Lec 10
 */

Route::get('form4', [FormsController::class, 'form4'])->name('form4');
Route::post('form4', [FormsController::class, 'form4_data']);


Route::get('form5', [FormsController::class, 'form5'])->name('form5');
Route::post('form5', [FormsController::class, 'form5_data']);
