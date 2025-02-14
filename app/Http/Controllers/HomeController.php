<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('main.index');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function product()
    {
        return view('main.product');
    }

    public function project()
    {
        return view('main.project');
    }

    public function software()
    {
        return view('main.software');
    }
}
