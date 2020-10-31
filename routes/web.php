<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Auth::routes(["register" => false, "forgot" => false, "reset" => false]);
Route::get('/', 'App\Http\Controllers\HomeController@index');


Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/adminSlider', 'App\Http\Controllers\AdminController@slider');
Route::get('/adminPlants', 'App\Http\Controllers\AdminController@plants');



 


