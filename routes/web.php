<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Rotas sem view */

Route::middleware(["auth"])->group(function(){
    Route::post('/criar-rifa', [\App\Http\Controllers\HomeController::class, 'create']);
    Route::get('/listar-rifas', [\App\Http\Controllers\HomeController::class, 'getAll']);
});

