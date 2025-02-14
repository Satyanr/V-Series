<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view('admin.index');
    }

    public function project()
    {
        return view('admin.project');
    }

    public function product()
    {
        return view('admin.product');
    }

    public function category()
    {
        return view('admin.category');
    }
}
