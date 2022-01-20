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

Route::middleware(["auth"])->group(function(){
    Route::get('/home', [App\Http\Controllers\RifaController::class, 'index'])->name('home');
    Route::get('/rifa/{id}', [App\Http\Controllers\RifaController::class, 'getRifa'])->name('rifa');

    Route::post('/criar-rifa', [\App\Http\Controllers\RifaController::class, 'create']);
    Route::post('/alterar-rifa', [\App\Http\Controllers\RifaController::class, 'update']);
    Route::post('/set-session', [\App\Http\Controllers\RifaController::class, 'setSession']);
});

