<?php

namespace App\Http\Controllers;

use App\Http\Requests\RifaCreateRequest;
use App\Http\Requests\RifaUpdateRequest;
use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RifaController extends Controller
{
    public function index()
    {
        $rifas = DB::table('rifa')->get();

        return view('home', compact('rifas'));
    }

    public function create(RifaCreateRequest $request)
    {
        $rifa = new Rifa();

        $rifa->id = uniqid("rifa_");
        $rifa->nome = $request->nome_rifa;
        $rifa->dataFechamento = $request->data_fechamento;
        $rifa->limiteParticipantes = $request->limite_part;
        $rifa->objetivo = $request->objetivo;
        $rifa->premio = $request->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        $rifa->save();

        return response()->json($request);
    }

    public function update(RifaUpdateRequest $request)
    {
        $rifa = Rifa::find($request->id_rifa);

        $rifa->nome = $request->nome_rifa;
        $rifa->dataFechamento = $request->data_fechamento;
        $rifa->objetivo = $request->objetivo;
        $rifa->premio = $request->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        $rifa->save();

        return response()->json($rifa);
    }

    public function getRifa(Request $request)
    {
        $filtro_session = $this->verificaSessao($request);

        $rifa = DB::table('rifa')
            ->where('id', $request->id)
            ->first();

        $participantes = DB::table('participante')
            ->where("id_rifa",  $rifa->id)
            ->orderBy($filtro_session)
            ->get();

        return view('rifa', compact('rifa', 'participantes', 'filtro_session'));
    }

    private function verificaSessao(Request $request) : string
    {
        $filtro = $request->filtro;

        if($filtro){
            $request->session()->put('filter', $request->filtro);
        }

        return $request->session()->get('filter') ?? '';
    }

    public function setSession(Request $request)
    {
        $request->session()->put('tab', $request->name);
        return response()->json("ok");
    }
}

