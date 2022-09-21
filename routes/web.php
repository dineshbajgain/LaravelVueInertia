<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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
    Route::get('/', [HomePageController::class,'index']);
    Route::get('/About', [HomePageController::class,'aboutUs']);
    Route::get('/ContactUs', [HomePageController::class,'contactUs']);
    Route::post('/contactPost',[HomePageController::class,'contactPost']);
    Route::get('/Projects',[HomePageController::class,'project']);
    Route::get('/Login',[LoginController::class,'index'])->name('login');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
