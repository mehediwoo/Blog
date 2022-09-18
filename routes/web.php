<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
// UI Routes
use App\Http\Controllers\UI\HomeController;

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

//Admin routes
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('/categoris', CategoryController::class);
Route::resource('/tag', TagController::class);
Route::resource('/post', PostController::class);

//UI Routes 

Route::get('/', [HomeController::class,'index']);
Route::get('/readmore/{id}', [HomeController::class,'readMorePost']);


