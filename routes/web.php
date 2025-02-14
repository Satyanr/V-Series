<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/product', 'product')->name('product');
    Route::get('/project', 'project')->name('project');
});

Route::prefix('/admin')->group(function () {
    Route::controller(Controller::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::get('/project', 'project')->name('admin.project');
        Route::get('/product', 'product')->name('admin.product');
        Route::get('/category', 'category')->name('admin.category');
    });
});
