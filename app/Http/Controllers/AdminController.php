<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function getData()
    {
        $data = Page::all();
        return response()->json($data);
    }

    public function slider() {
    	return view('sliderAdmin');
    }

}
