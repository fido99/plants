<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Plants;
 
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
	$filename = Storage::put('/public/', $request->file('file'));

	$title = Page::find(1);
	$title->values = $request->input('title');
	$title->save();

	$email = Page::find(2);
	$email->values = $request->input('email');
	$email->save();

	$logo = Page::find(3);
	$logo->values = basename($filename);
	$logo->save();

	$footer_text = Page::find(4);
	$footer_text->values = $request->input('footer_text');
	$footer_text->save();

    return response()->json($request->all());
});


Route::get('/getPage', function() {
    $data = Page::all();
    return response()->json($data);	
});

Route::post('/phone/send', function(Request $request) {
    Mail::send(['text' => 'mail'], ['phone' => $request->input('phone')], function($message) {
        $message->to('olegf5241@gmail.com')->subject('test');
        $message->from('olegf5241@gmail.com', 'test');
    });
    
    return 'ok';
});

Route::get('/slider/get', function() {
    $data = Slider::all();
    return $data;
});


Route::post('/adminSlider', function() {
    $data = Slider::all();
    return response()->json($data);
});

Route::post('/adminSlider/updata', function(Request $request) {
    $filename = Storage::putFile('/public/', $request->file('file'));
    $slide = Slider::find($request->input('id'));
    $slide->text = $request->input('text');
    $slide->image = basename($filename);
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

Route::post('/adminSlider/add', function(Request $request) {
    $filename = Storage::putFile('/public/', $request->file('file'));
    $slide = new Slider();
    $slide->text = $request->input('text');
    $slide->link = $request->input('link');
    $slide->image = basename($filename);
    $slide->save(); 
});



// ********* plants routes ********* 
Route::post('/admin/plants', function(Request $request) {
    $plants = Plants::where('name', 'LIKE', '%' . $request->input('name') . '%')->get();
    return $plants;     
});

Route::post('/admin/plants/delete/{id}', function($id) {
	$deletePlant = Plants::find($id);
	$deletePlant->delete();
    return 'ok';
});

Route::post('/admin/plants/add', function(Request $request) {
     $newPlant = new Plants();
     $newPlant->name = $request->input('name');
     $newPlant->save();
});