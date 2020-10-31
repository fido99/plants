<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = Page::find(1)->values;
       
        return view('home', ['title' => $title]);
    }
}
