<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\Slider;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/updata', function(Request $request) {
	Storage::put('/images/', $request->file('file'));

	$title = Page::find(1);
	$title->values = $request->input('title');
	$title->save();

	$email = Page::find(2);
	$email->values = $request->input('email');
	$email->save();

	$logo = Page::find(3);
	$logo->values = $request->file('file')->getClientOriginalName();
	$logo->save();

	$footer_text = Page::find(4);
	$footer_text->values = $request->input('footer_text');
	$footer_text->save();

    return response()->json($request->all());
});

/*
Route::post('/getData', function() {
    $data = Page::all();
    return response()->json($data);	
});
*/

Route::post('/adminSlider', function() {
    $data = Slider::all();
    return response()->json($data);
});

Route::post('/adminSlider/updata', function(Request $request) {
    $slide = Slider::find($request->input('id'));
    $slide->text = $request->input('text');
    $slide->link = $request->input('link');
    $slide->save();

    return $slide->text;
});

Route::post('/adminSlider/delete', function(Request $request) {
	$slide = Slider::find($request->input('id'));
	$slide->delete();

    $data = Slider::all();
	return response()->json($data);
});