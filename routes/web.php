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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','HomeController@index');
Route::get('/about','HomeController@about');
Route::get('/doctor','HomeController@doctor');
Route::get('/contact','HomeController@contact');
Route::get('/home','HomeController@redirect')->middleware('auth','verified');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::get('/add_doctor_view','AdminController@addview');
Route::post('/upload_doctor','AdminController@upload');
Route::post('/appointment','HomeController@appointment');
Route::get('/myappointment','HomeController@myappointment');
Route::get('/cancel_appooint/{id}','HomeController@cancel_appooint');
Route::get('/showappointment','AdminController@showappointment');
Route::get('/approved/{id}','AdminController@approved');
Route::get('/cancel/{id}','AdminController@cancel');
Route::get('/showalldoctor','AdminController@showalldoctor');
Route::get('/deletedoctor/{id}','AdminController@deletedoctor');
Route::get('/updatedoctor/{id}','AdminController@updatedoctor');
Route::post('/editdoctor/{id}','AdminController@editdoctor');
Route::get('/emailview/{id}','AdminController@emailview');
Route::post('/sentemail/{id}','AdminController@sentemail');
//Precrib
Route::get('/pescrib/{id}','AdminController@pescrib');

