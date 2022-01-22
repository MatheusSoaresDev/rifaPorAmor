<?php

use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::middleware(["auth"])->group(function(){
    Route::get('/home', [RifaController::class, 'all'])->name('home');
    Route::get('/rifa/{id}', [RifaController::class, 'find'])->name('rifa');
    
    Route::post('/criar-rifa', [RifaController::class, 'create']);

    Route::patch('/alterar-rifa', [RifaController::class, 'update']);
    Route::patch('/fechar-rifa', [RifaController::class, 'close']);
    Route::patch('/reabrir-rifa', [RifaController::class, 'reopen']);
    Route::patch('/sortear-vencedor', [ParticipanteController::class, 'sortearVencedor']);

    Route::post('/set-session', [RifaController::class, 'setSession']);
});

