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
    Route::post('/criar-rifa', [RifaController::class, 'create']);

    Route::get('/home', [RifaController::class, 'all'])->name('home');
    Route::get('/rifa/{id}', [RifaController::class, 'find'])->name('rifa');

    Route::get('/busca-numeros/', [ParticipanteController::class, 'buscaParticipantesPorRifa']);

    Route::patch('/alterar-rifa', [RifaController::class, 'update']);
    Route::patch('/fechar-rifa', [RifaController::class, 'close']);
    Route::patch('/reabrir-rifa', [RifaController::class, 'reopen']);
    Route::patch('/resetar-sorteio', [RifaController::class, 'resetaSorteio']);
    Route::patch('/sortear-vencedor', [RifaController::class, 'sortearVencedor']);

    Route::patch('/atualiza-status-participantes', [ParticipanteController::class, 'atualizaStatusParticipantes']);

    Route::post('/set-session', [RifaController::class, 'setSession']);
});

