<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Note: Login and register auth routes in FortifyServiceProvider.php

Route::get('/user/dashboard', function () {
    // return view('welcome');
    dd(\Illuminate\Support\Facades\Auth::user());
});

Route::get('/admin/dashboard', function () {
    // return view('welcome');
    dd(\Illuminate\Support\Facades\Auth::user());
});