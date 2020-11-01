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
    if ($request->hasFile('file')) {
        $filename = Storage::put('/public/', $request->file('file'));
        $logo = Page::where('attributes', 'logo')->first();
        $logo->values = basename($filename);
        $logo->save();
    }
 

	$title = Page::where('attributes', 'title')->first();
	$title->values = $request->input('title');
	$title->save();

	$email = Page::where('attributes', 'email')->first();
	$email->values = $request->input('email');
	$email->save();


	$footer_text = Page::where('attributes', 'footer_text')->first();
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
        $mail = Page::where('id', '2')->first()->values;
        $message->to($mail)->subject('test');
        $message->from('olegf5241@gmail.com', 'test');
    });
    
     
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
    $slide = Slider::find($request->input('id'));
    if ($request->hasFile('file')) {
        $filename = Storage::putFile('/public/', $request->file('file'));
        $slide->image = basename($filename);
    }
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

Route::post('/adminSlider/add', function(Request $request) {
    $filename = Storage::putFile('/public/', $request->file('file'));
    $slide = new Slider();
    $slide->text = $request->input('text');
    $slide->link = $request->input('link');
    $slide->image = basename($filename);
    $slide->save(); 

    return Slider::all();
});



// ********* plants routes ********* 
Route::post('/admin/plants', function(Request $request) {
    $plants = Plants::where('name', 'LIKE', '%' . $request->input('name') . '%')->get();
    return $plants;     
});

Route::post('/admin/plants/delete/{id}', function($id) {
	$deletePlant = Plants::find($id);
	$deletePlant->delete();
    return Plants::all();
});

Route::post('/admin/plants/add', function(Request $request) {
     $newPlant = new Plants();
     $newPlant->name = $request->input('name');
     $newPlant->save();
     return Plants::all();
});