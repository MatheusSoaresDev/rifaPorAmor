<?php

namespace App\Http\Controllers;

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

    public function create(Request $request)
    {
        $validate = $request->validate([
            'nome_rifa' => 'required|min:5',
            'data_fechamento' => 'after:'.date("Y-m-d", strtotime("-1 days")),
            'limite_part' => 'numeric|min:1',
            'objetivo' => 'required',
            'premio' => 'required'
        ]);

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

    public function update(Request $request)
    {
        $validate = $request->validate([
            'nome_rifa' => 'required|min:5',
            'data_fechamento' => 'after:'.date("Y-m-d", strtotime("-1 days")),
            'limite_part' => 'numeric|min:1',
            'objetivo' => 'required',
            'premio' => 'required'
        ]);

        $rifa = Rifa::find($request->id_rifa);

        $rifa->nome = $request->nome_rifa;
        $rifa->dataFechamento = $request->data_fechamento;
        $rifa->limiteParticipantes = $request->limite_part;
        $rifa->objetivo = $request->objetivo;
        $rifa->premio = $request->premio;
        $rifa->user_id = auth()->user()->getAuthIdentifier();

        $rifa->save();

        return response()->json($rifa);
    }

    public function getRifa(Request $request)
    {
        $rifa = DB::table('rifa')->where('id', $request->id)->first();

        return view('rifa', compact('rifa'));
    }
}
