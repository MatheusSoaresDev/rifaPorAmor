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
Route::get('/rifa/{id}', [RifaController::class, 'dadosRifaParticipante']);

Route::middleware(["auth"])->group(function(){
    Route::get('/home', [RifaController::class, 'all']);

    Route::post('/rifa', [RifaController::class, 'create']);
    Route::get('/rifa/admin/{id}', [RifaController::class, 'rifaAdm']);
    Route::patch('/rifa', [RifaController::class, 'update']);
    Route::patch('/rifa/close/{id}', [RifaController::class, 'close']);
    Route::patch('/rifa/reopen/{id}', [RifaController::class, 'reopen']);
    Route::patch('/rifa/reset/{id}', [RifaController::class, 'resetaSorteio']);
    Route::patch('/rifa/sortear/{id}', [RifaController::class, 'sortearVencedor']);

    Route::post('/participante', [ParticipanteController::class, 'create']);
    Route::delete('/participante', [ParticipanteController::class, 'removerParticipante']);

    Route::get('/busca/numeros', [ParticipanteController::class, 'buscaParticipantesPorRifa']);
    Route::patch('/atualiza/status', [ParticipanteController::class, 'atualizaStatusParticipantes']);

    Route::post('/set-session', [RifaController::class, 'setSession']);
});


