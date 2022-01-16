<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        Rifa::create([
            'nome' => "Teste",
            "dataFechamento" => date("Y-m-d"),
            "limiteParticipantes" => 50,
            "premio" => "Cupom Outback",
            "objetivo" => "almoço solidário",
            "user_id" => auth()->user()->getAuthIdentifier(),
        ]);

        return response()->json($request);
    }
}
