<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use \App\Models\Page;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/updata', function(Request $request) {
	Storage::put('/images', $request->file('file'));

	$title = Page::find(1);
	$title->values = $request->input('title');
	$title->save();

	$logo = Page::find(2);
	$logo->values = $request->file('file')->getClientOriginalName();
	$logo->save();


    return response()->json($request->all());
});

Route::post('/getData', function() {
    $data = Page::all();
    return response()->json($data);	
});